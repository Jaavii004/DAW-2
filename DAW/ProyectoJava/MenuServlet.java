import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class MenuServlet extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        HttpSession session = request.getSession(false);
        if (session == null || session.getAttribute("user") == null) {
            response.sendRedirect("login");
            return;
        }
        
        // Obtener el rol del usuario desde la sesión
        String role = (String) session.getAttribute("role");
        
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Tienda Online</title>");
        out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
        out.println("</head><body>");

        // Obtener la ruta actual
        String currentPath = request.getRequestURI();

        // Navbar
        out.println("<nav class='navbar navbar-expand-lg navbar-light bg-light'>");
        out.println("<a class='navbar-brand' href='menu'>Tienda Online</a>");
        out.println("<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>");
        out.println("<span class='navbar-toggler-icon'></span>");
        out.println("</button>");
        out.println("<div class='collapse navbar-collapse' id='navbarNav'>");
        out.println("<ul class='navbar-nav mr-auto'>");

        // Función para determinar si un enlace está activo
        out.println("<li class='nav-item " + (currentPath.endsWith("/menu") ? "active" : "") + "'>");
        out.println("<a class='nav-link' href='menu'>Home</a>");
        out.println("</li>");

        out.println("<li class='nav-item " + (currentPath.contains("/products") ? "active" : "") + "'>");
        out.println("<a class='nav-link' href='products'>Productos</a>");
        out.println("</li>");

        out.println("<li class='nav-item " + (currentPath.contains("/cart") ? "active" : "") + "'>");
        out.println("<a class='nav-link' href='cart'>Carrito</a>");
        out.println("</li>");

        out.println("<li class='nav-item " + (currentPath.contains("/compras") ? "active" : "") + "'>");
        out.println("<a class='nav-link' href='compras'>Mis Compras</a>");
        out.println("</li>");


        out.println("</ul>");
        
        // Logout a la derecha
        out.println("<ul class='navbar-nav ml-auto'>");
        out.println("<li class='nav-item'>");
        out.println("<a class='nav-link text-danger' href='logout'>Cerrar Sesión (" + session.getAttribute("user") + ")</a>");
        out.println("</li>");
        out.println("</ul>");

        out.println("</div></nav>");

        out.println("<div class='container mt-5'>");
        out.println("<h1>Bienvenido a la Tienda Online</h1>");
        out.println("<p>Usuario conectado: " + session.getAttribute("user") + "</p>");
        out.println("<ul class='list-group'>");
        out.println("<li class='list-group-item'><a href='products'>Ver Productos</a></li>");
        out.println("<li class='list-group-item'><a href='cart'>Ver Carrito</a></li>");
        out.println("<li class='list-group-item'><a href='compras'>Mis Compras</a></li>");
        
        // Mostrar opción de admin solo si tiene el rol
        if ("admin".equals(role)) {
            out.println("<li class='list-group-item'><a href='admin'>Panel de Administración</a></li>");
        }
        
        out.println("<li class='list-group-item'><a href='logout'>Cerrar Sesión</a></li>");
        out.println("</ul>");
        out.println("</div>");
        out.println("</body></html>");
    }
}