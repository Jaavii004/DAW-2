import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class MenuServlet extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Tienda Online</title>");
        out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
        out.println("</head><body>");
        out.println("<div class='container mt-5'>");
        out.println("<h1>Bienvenido a la Tienda Online</h1>");
        out.println("<ul class='list-group'>");
        out.println("<li class='list-group-item'><a href='login'>Iniciar Sesión</a></li>");
        out.println("<li class='list-group-item'><a href='register'>Registrarse</a></li>");
        out.println("<li class='list-group-item'><a href='products'>Ver Productos</a></li>");
        out.println("<li class='list-group-item'><a href='carrito'>Ver Carrito</a></li>");
        out.println("<li class='list-group-item'><a href='compras'>Mis Compras</a></li>");
        out.println("</ul>");
        out.println("</div>");
        out.println("</body></html>");
    }
}