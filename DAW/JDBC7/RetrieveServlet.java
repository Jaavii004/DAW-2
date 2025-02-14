import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class RetrieveServlet extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Retrieve Data</title></head><body>");
        out.println("<h1>Retrieve Data by DNI</h1>");
        out.println("<form action='retrieve' method='post'>");
        out.println("DNI: <input type='text' name='dni' required><br>");
        out.println("<button type='submit'>Retrieve Data</button>");
        out.println("</form>");
        out.println("<br><a href='menu'>Back to Main Menu</a>");
        out.println("</body></html>");
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        String dni = request.getParameter("dni");

        try {
            String dbUrl = "jdbc:mysql://localhost/bdprueba?allowPublicKeyRetrieval=true&useSSL=false";
            String dbUser = "alumno";
            String dbPass = "mipassword";

            Connection conn = DriverManager.getConnection(dbUrl, dbUser, dbPass);
            PreparedStatement stmt = conn.prepareStatement("SELECT * FROM users WHERE dni = ?");
            stmt.setString(1, dni);
            ResultSet rs = stmt.executeQuery();

            out.println("<html><head><title>Retrieve Result</title></head><body>");
            if (rs.next()) {
                out.println("<h1>Data Found</h1>");
                out.println("<p>DNI: " + rs.getString("dni") + "</p>");
                out.println("<p>Name: " + rs.getString("name") + "</p>");
                out.println("<p>Email: " + rs.getString("email") + "</p>");
            } else {
                out.println("<h1>No Data Found</h1>");
            }
            out.println("<br><a href='menu'>Back to Main Menu</a>");
            out.println("</body></html>");

            rs.close();
            stmt.close();
            conn.close();
        } catch (SQLException e) {
            out.println("<p>Error: " + e.getMessage() + "</p>");
        }
    }
}
