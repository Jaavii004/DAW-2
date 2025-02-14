import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class MenuServlet extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Main Menu</title></head><body>");
        out.println("<h1>Welcome to the Data Management System</h1>");
        out.println("<ul>");
        out.println("<li><a href='insert'>Insert Data</a></li>");
        out.println("<li><a href='retrieve'>Retrieve Data</a></li>");
        out.println("</ul>");
        out.println("</body></html>");
    }
}
