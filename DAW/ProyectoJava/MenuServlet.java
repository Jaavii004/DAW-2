import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class MenuServlet extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        // Check if there is an active session first
        HttpSession session = request.getSession(false);
        
        // If there's no session or the session user is null, check for cookies
        if (session == null || session.getAttribute("user") == null) {
            // Look for cookies (e.g., a login cookie)
            Cookie[] cookies = request.getCookies();
            String userFromCookie = null;
            String roleFromCookie = null;

            if (cookies != null) {
                for (Cookie cookie : cookies) {
                    if ("user".equals(cookie.getName())) {
                        userFromCookie = cookie.getValue();
                    } else if ("role".equals(cookie.getName())) {
                        roleFromCookie = cookie.getValue();
                    }
                }
            }

            // If no cookies, redirect to login
            if (userFromCookie == null || roleFromCookie == null) {
                response.sendRedirect("login");
                return;
            } else {
                // Set session attributes if cookies are found
                session = request.getSession(true);
                session.setAttribute("user", userFromCookie);
                session.setAttribute("role", roleFromCookie);
            }
        }

        // Get user role from session
        String role = (String) session.getAttribute("role");

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("<html><head><title>Online Store</title>");
        out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
        out.println("</head><body>");

        // Navbar for navigation
        out.println("<nav class='navbar navbar-expand-lg navbar-light bg-light'>");
        out.println("  <a class='navbar-brand' href='menu'>MyStore</a>");
        out.println("  <div class='collapse navbar-collapse'>");
        out.println("    <ul class='navbar-nav'>");
        out.println("      <li class='nav-item'><a class='nav-link active' href='menu'>Home</a></li>");
        out.println("      <li class='nav-item'><a class='nav-link' href='products'>Products</a></li>");
        out.println("      <li class='nav-item'><a class='nav-link' href='cart'>Cart</a></li>");
        out.println("      <li class='nav-item'><a class='nav-link' href='purchases'>My Purchases</a></li>");
        out.println("      <li class='nav-item'><a class='nav-link text-danger' href='logout'>Logout</a></li>");
        out.println("    </ul>");
        out.println("  </div>");
        out.println("</nav>");

        out.println("<div class='container mt-5'>");
        out.println("<h1>Welcome to the Online Store</h1>");
        out.println("<p>Logged in as: " + session.getAttribute("user") + "</p>");
        out.println("<ul class='list-group'>");
        out.println("<li class='list-group-item'><a href='products'>View Products</a></li>");
        out.println("<li class='list-group-item'><a href='cart'>View Cart</a></li>");
        out.println("<li class='list-group-item'><a href='purchases'>My Purchases</a></li>");
        
        // Show admin option only if the role is admin
        if ("admin".equals(role)) {
            out.println("<li class='list-group-item'><a href='admin'>Admin Panel</a></li>");
        }
        
        out.println("<li class='list-group-item'><a href='logout'>Logout</a></li>");
        out.println("</ul>");
        out.println("</div>");
        out.println("</body></html>");
    }
}
