import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class LoginServlet extends HttpServlet {

    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        HttpSession session = request.getSession(false);
        if (session == null || session.getAttribute("user") == null) {
            Cookie[] cookies = request.getCookies();
            if (cookies != null) {
                for (Cookie cookie : cookies) {
                    if ("user_id".equals(cookie.getName())) {
                        int userId = Integer.parseInt(cookie.getValue());
                        try {
                            Connection conn = DriverManager.getConnection("jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false", "alumno", "mipassword");
                            PreparedStatement stmt = conn.prepareStatement("SELECT * FROM users WHERE id = ?");
                            stmt.setInt(1, userId);
                            ResultSet rs = stmt.executeQuery();

                            if (rs.next()) {
                                session = request.getSession(true);
                                session.setAttribute("user", rs.getString("name"));
                                session.setAttribute("role", rs.getString("role"));
                                session.setAttribute("user_id", rs.getInt("id"));
                            }

                            rs.close();
                            stmt.close();
                            conn.close();
                        } catch (Exception e) {
                            e.printStackTrace();
                        }
                    }
                }
            }
        }

        if (session != null && session.getAttribute("user") != null) {
            response.sendRedirect("home");
            return;
        }

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

        try {
            Connection conn = DriverManager.getConnection("jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false", "alumno", "mipassword");
            PreparedStatement stmt = conn.prepareStatement("SELECT * FROM users WHERE email = ? AND password = ?");
            stmt.setString(1, email);
            stmt.setString(2, password);
            ResultSet rs = stmt.executeQuery();

            if (rs.next()) {
                String role = rs.getString("role");
                String userName = rs.getString("name");
                int id = rs.getInt("id");

                HttpSession session = request.getSession();
                session.setAttribute("user", userName);
                session.setAttribute("role", role);
                session.setAttribute("user_id", id);

                Cookie userCookie = new Cookie("user_id", String.valueOf(id));
                userCookie.setMaxAge(7 * 24 * 60 * 60);
                response.addCookie(userCookie);

                response.sendRedirect("home");
            } else {
                out.println("<h3 class='text-danger'>Invalid email or password. Try again.</h3>");
                out.println("<p><a href='login' class='btn btn-primary'>Back to Login</a></p>");
            }

            rs.close();
            stmt.close();
            conn.close();
        } catch (Exception e) {
            out.println("<h3 class='text-danger'>Error connecting to the database.</h3>");
            e.printStackTrace(out);
        }
    }
}
