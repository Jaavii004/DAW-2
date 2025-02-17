import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class MenuServlet extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Tienda Online</title></head><body>");
        out.println("<h1>Bienvenido a la Tienda Online</h1>");
        out.println("<ul>");
        out.println("<li><a href='login'>Iniciar Sesión</a></li>");
        out.println("<li><a href='register'>Registrarse</a></li>");
        out.println("<li><a href='productos'>Ver Productos</a></li>");
        out.println("<li><a href='carrito'>Ver Carrito</a></li>");
        out.println("<li><a href='compras'>Mis Compras</a></li>");
        out.println("</ul>");
        out.println("</body></html>");
    }
}
