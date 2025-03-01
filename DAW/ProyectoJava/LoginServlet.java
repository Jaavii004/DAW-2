import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class LoginServlet extends HttpServlet {

    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Login</title>");
        out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
        out.println("</head><body>");
        out.println("<div class='container mt-5'>");
        out.println("<h2>Login</h2>");
        out.println("<form action='login' method='post'>");
        out.println("<div class='form-group'>");
        out.println("<label for='email'>Email:</label>");
        out.println("<input type='email' class='form-control' name='email' required>");
        out.println("</div>");
        out.println("<div class='form-group'>");
        out.println("<label for='password'>Password:</label>");
        out.println("<input type='password' class='form-control' name='password' required>");
        out.println("</div>");
        out.println("<button type='submit' class='btn btn-primary'>Login</button>");
        out.println("</form>");
        out.println("<p>Don't have an account? <a href='register'>Register here</a></p>");
        out.println("</div>");
        out.println("</body></html>");
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String email = request.getParameter("email");
        String password = request.getParameter("password");

        String dbUrl = "jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false";
        String dbUser  = "alumno";
        String dbPass = "mipassword";

        try {
            Connection conn = DriverManager.getConnection(dbUrl, dbUser , dbPass);

            PreparedStatement stmt = conn.prepareStatement("SELECT * FROM users WHERE email = ? AND password = ?");
            stmt.setString(1, email);
            stmt.setString(2, password);
            ResultSet rs = stmt.executeQuery();

            out.println("<html><head><title>Login Result</title>");
            out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
            out.println("</head><body>");
            out.println("<div class='container mt-5'>");

            if (rs.next()) {
                String role = rs.getString("role");
                String userName = rs.getString("name");
                int id = rs.getInt("id");
                out.println("<h3>Login successful!</h3>");

                HttpSession session = request.getSession();
                session.setAttribute("user", userName);
                session.setAttribute("role", role);
                session.setAttribute("user_id", id);

                if ("admin".equals(role)) {
                    out.println("<h3>Welcome, Admin " + userName + "!</h3>");
                    out.println("<p><a href='admin' class='btn btn-secondary'>Go to Admin Panel</a></p>");
                } else {
                    out.println("<h3>Welcome, " + userName + "!</h3>");
                    out.println("<p><a href='products' class='btn btn-secondary'>Go to Products</a></p>");
                    out.println("<p><a href='cart' class='btn btn-secondary'>Go to Cart</a></p>");
                    out.println("<p><a href='purchases' class='btn btn-secondary'>Go to Purchases</a></p>");
                    out.println("<p><a href='/' class='btn btn-secondary'>Go to Home</a></p>");
                }
            } else {
                out.println("<h3 class='text-danger'>Invalid email or password. Try again.</h3>");
                out.println("<p><a href='login' class='btn btn-primary'>Back to Login</a></p>");
            }

            out.println("</div>");
            out.println("</body></html>");

            rs.close();
            stmt.close();
            conn.close();

        } catch (Exception e) {
            out.println("<h3 class='text-danger'>Error connecting to the database.</h3>");
            e.printStackTrace(out);
        }
    }
}
