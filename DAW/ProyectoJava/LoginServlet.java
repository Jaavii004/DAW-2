import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class LoginServlet extends HttpServlet {

    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Login</title></head><body>");
        out.println("<h2>Login</h2>");
        out.println("<form action='login' method='post'>");
        out.println("Email: <input type='email' name='email' required><br>");
        out.println("Password: <input type='password' name='password' required><br>");
        out.println("<button type='submit'>Login</button>");
        out.println("</form>");
        out.println("<p>Don't have an account? <a href='register'>Register here</a></p>");
        out.println("</body></html>");
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String email = request.getParameter("email");
        String password = request.getParameter("password");

        String dbUrl = "jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false";
        String dbUser = "alumno";
        String dbPass = "mipassword";

        try {
            Connection conn = DriverManager.getConnection(dbUrl, dbUser, dbPass);

            PreparedStatement stmt = conn.prepareStatement("SELECT * FROM users WHERE email = ? AND password = ?");
            stmt.setString(1, email);
            stmt.setString(2, password);
            ResultSet rs = stmt.executeQuery();

            out.println("<html><head><title>Login Result</title></head><body>");

            if (rs.next()) {
                String role = rs.getString("role");
                String userName = rs.getString("name");

                HttpSession session = request.getSession();
                session.setAttribute("user", userName);
                session.setAttribute("role", role);

                if ("admin".equals(role)) {
                    out.println("<h3>Welcome, Admin " + userName + "!</h3>");
                    out.println("<p><a href='admin'>Go to Admin Panel</a></p>");
                } else {
                    out.println("<h3>Welcome, " + userName + "!</h3>");
                    out.println("<p><a href='products'>Go to products</a></p>");
                }
            } else {
                out.println("<h3>Invalid email or password. Try again.</h3>");
                out.println("<p><a href='login'>Back to Login</a></p>");
            }

            out.println("</body></html>");

            rs.close();
            stmt.close();
            conn.close();

        } catch (Exception e) {
            out.println("<h3>Error connecting to the database.</h3>");
            e.printStackTrace(out);
        }
    }
}
