import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class OrderDetailsServlet extends HttpServlet {

    // Utility method to obtain a database connection
    private Connection getConnection() throws Exception {
        String dbUrl = "jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false";
        String dbUser = "alumno";
        String dbPass = "mipassword";
        return DriverManager.getConnection(dbUrl, dbUser, dbPass);
    }
    
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
         throws ServletException, IOException {
         
         response.setContentType("text/html");
         PrintWriter out = response.getWriter();
         HttpSession session = request.getSession(false);
         
         // Optionally check if user is logged in (and/or if they own this order)
         if (session == null || session.getAttribute("user") == null) {
             response.sendRedirect("login");
             return;
         }
         
         String orderIdStr = request.getParameter("orderId");
         if (orderIdStr == null) {
             out.println("<p>Order ID is missing.</p>");
             return;
         }
         int orderId = Integer.parseInt(orderIdStr);
         
         try (Connection conn = getConnection()){
             String sql = "SELECT od.*, p.name AS product_name " +
                          "FROM order_details od " +
                          "JOIN products p ON od.product_id = p.id " +
                          "WHERE od.order_id = ?";
             PreparedStatement ps = conn.prepareStatement(sql);
             ps.setInt(1, orderId);
             ResultSet rs = ps.executeQuery();
             
             out.println("<html><head><title>Order Details</title>");
             out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
             out.println("</head><body>");
             
             // Navbar for navigation
             out.println("<nav class='navbar navbar-expand-lg navbar-light bg-light'>");
             out.println("  <a class='navbar-brand' href='menu'>MyStore</a>");
             out.println("  <div class='collapse navbar-collapse'>");
             out.println("    <ul class='navbar-nav'>");
             out.println("      <li class='nav-item'><a class='nav-link' href=''>Home</a></li>");
             out.println("      <li class='nav-item'><a class='nav-link' href='products'>Products</a></li>");
             out.println("      <li class='nav-item'><a class='nav-link' href='cart'>Cart</a></li>");
             out.println("      <li class='nav-item'><a class='nav-link active' href='purchases'>My Purchases</a></li>");
             out.println("      <li class='nav-item'><a class='nav-link text-danger' href='logout'>Cerrar Sesión</a></li>");
             out.println("    </ul>");
             out.println("  </div>");
             out.println("</nav>");
             
             out.println("<div class='container mt-5'>");
             out.println("<h2>Order Details for Order #" + orderId + "</h2>");
             out.println("<table class='table table-bordered'>");
             out.println("<thead class='thead-light'><tr><th>Product</th><th>Quantity</th><th>Subtotal</th></tr></thead>");
             out.println("<tbody>");
             
             while(rs.next()){
                String productName = rs.getString("product_name");
                int quantity = rs.getInt("quantity");
                double subtotal = rs.getDouble("subtotal");
                out.println("<tr>");
                out.println("<td>" + productName + "</td>");
                out.println("<td>" + quantity + "</td>");
                out.println("<td>" + String.format("%.2f", subtotal) + "</td>");
                out.println("</tr>");
             }
             
             out.println("</tbody></table>");
             out.println("<br><a class='btn btn-secondary' href='purchases'>Back to Purchases</a>");
             out.println("</div>");
             out.println("</body></html>");
             
             rs.close();
             ps.close();
         } catch(Exception e){
             out.println("<p>Error: " + e.getMessage() + "</p>");
         }
    }
}
