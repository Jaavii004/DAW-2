import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class RegisterServlet extends HttpServlet {

    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Register</title></head><body>");
        out.println("<h2>Register</h2>");
        out.println("<form action='register' method='post'>");
        out.println("Name: <input type='text' name='name' required><br>");
        out.println("Email: <input type='email' name='email' required><br>");
        out.println("Password: <input type='password' name='password' required><br>");
        out.println("<button type='submit'>Register</button>");
        out.println("</form>");
        out.println("<p>Already have an account? <a href='login'>Login here</a></p>");
        out.println("</body></html>");
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        String name = request.getParameter("name");
        String email = request.getParameter("email");
        String password = request.getParameter("password");

        String dbUrl = "jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false";
        String dbUser = "alumno";
        String dbPass = "mipassword";

        try {
            Connection conn = DriverManager.getConnection(dbUrl, dbUser, dbPass);

            PreparedStatement checkStmt = conn.prepareStatement("SELECT * FROM users WHERE email = ?");
            checkStmt.setString(1, email);
            ResultSet rs = checkStmt.executeQuery();

            out.println("<html><head><title>Registration Result</title></head><body>");

            if (rs.next()) {
                out.println("<h3>Email is already registered.</h3>");
                out.println("<p><a href='register'>Try again</a></p>");
            } else {
                String defaultRole = "customer";  

                PreparedStatement stmt = conn.prepareStatement("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
                stmt.setString(1, name);
                stmt.setString(2, email);
                stmt.setString(3, password);
                stmt.setString(4, defaultRole);
                stmt.executeUpdate();
                stmt.close();

                out.println("<h3>Registration successful! You can now <a href='login'>log in</a>.</h3>");
            }

            out.println("</body></html>");

            rs.close();
            checkStmt.close();
            conn.close();

        } catch (Exception e) {
            out.println("<h3>Error connecting to the database.</h3>");
            e.printStackTrace(out);
        }
    }
}
