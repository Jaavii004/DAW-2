import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class InsertServlet extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Insert Data</title></head><body>");
        out.println("<h1>Insert Data</h1>");
        out.println("<form action='insert' method='post'>");
        out.println("DNI: <input type='text' name='dni' required><br>");
        out.println("Name: <input type='text' name='name' required><br>");
        out.println("Email: <input type='email' name='email' required><br>");
        out.println("<button type='submit'>Insert Data</button>");
        out.println("</form>");
        out.println("<br><a href='menu'>Back to Main Menu</a>");
        out.println("</body></html>");
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        String dni = request.getParameter("dni");
        String name = request.getParameter("name");
        String email = request.getParameter("email");

        try {
            String dbUrl = "jdbc:mysql://localhost/bdprueba?allowPublicKeyRetrieval=true&useSSL=false";
            String dbUser = "alumno";
            String dbPass = "mipassword";

            Connection conn = DriverManager.getConnection(dbUrl, dbUser, dbPass);
            PreparedStatement stmt = conn.prepareStatement("INSERT INTO users (dni, name, email) VALUES (?, ?, ?)");
            stmt.setString(1, dni);
            stmt.setString(2, name);
            stmt.setString(3, email);
            stmt.executeUpdate();
            stmt.close();
            conn.close();

            out.println("<html><head><title>Insertion Result</title></head><body>");
            out.println("<h1>Data Inserted Successfully</h1>");
            out.println("<p>Click <a href='insert'>here</a> to insert more data.</p>");
            out.println("<p><a href='menu'>Back to Main Menu</a></p>");
            out.println("</body></html>");
        } catch (SQLException e) {
            out.println("<p>Error: " + e.getMessage() + "</p>");
        }
    }
}
