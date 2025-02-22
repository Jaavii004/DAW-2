import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class MenuServlet extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        // Verificar que el usuario esté logueado
        HttpSession session = request.getSession(false);
        if (session == null || session.getAttribute("user") == null) {
            response.sendRedirect("login"); // redirige a login si no hay sesión o usuario
            return;
        }
        // Si tiene sesión, mostrar el menú
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Tienda Online</title>");
        out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
        out.println("</head><body>");
        out.println("<div class='container mt-5'>");
        out.println("<h1>Bienvenido a la Tienda Online</h1>");
        out.println("<p>Usuario conectado: " + session.getAttribute("user") + "</p>");
        out.println("<ul class='list-group'>");
        out.println("<li class='list-group-item'><a href='products'>Ver Productos</a></li>");
        out.println("<li class='list-group-item'><a href='cart'>Ver Carrito</a></li>");
        out.println("<li class='list-group-item'><a href='compras'>Mis Compras</a></li>");
        out.println("<li class='list-group-item'><a href='logout'>Cerrar Sesión</a></li>"); // Asegúrate de implementar este servlet
        out.println("</ul>");
        out.println("</div>");
        out.println("</body></html>");
    }
}