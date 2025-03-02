import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class PurchasesServlet extends HttpServlet {

    // Utility method to obtain a database connection
    private Connection getConnection() throws SQLException {
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
         Integer userId = null;
         String userName = null;
         
         // Check if user is logged in (session or cookies)
         if (session != null && session.getAttribute("user_id") != null) {
             userId = (Integer) session.getAttribute("user_id");
             userName = (String) session.getAttribute("user");
         } else {
             Cookie[] cookies = request.getCookies();
             if (cookies != null) {
                 for (Cookie cookie : cookies) {
                     if ("user_id".equals(cookie.getName())) {
                         try {
                             userId = Integer.parseInt(cookie.getValue());
                         } catch (NumberFormatException e) {
                             // Invalid cookie value; ignore
                         }
                     }
                     if ("user".equals(cookie.getName())) {
                         userName = cookie.getValue();
                     }
                 }
             }
         }
         
         if (userId == null) {
             out.println("<html><head><title>Purchases</title></head><body>");
             out.println("<p>You must be logged in or have a valid cookie to view your purchases.</p>");
             out.println("<a href='login'>Log in</a>");
             out.println("</body></html>");
             return;
         }
         
         // Retrieve the customer's orders from the database
         try (Connection conn = getConnection()) {
             String sql = "SELECT id, order_date, total, tracking_number FROM orders WHERE user_id = ? ORDER BY order_date DESC";
             PreparedStatement ps = conn.prepareStatement(sql);
             ps.setInt(1, userId);
             ResultSet rs = ps.executeQuery();
             
             out.println("<html><head><title>My Purchases</title>");
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
             out.println("      <li class='nav-item'><a class='nav-link text-danger' href='logout'>Logout</a></li>");
             out.println("    </ul>");
             out.println("  </div>");
             out.println("</nav>");
             
             out.println("<div class='container mt-5'>");
             out.println("<h2>My Purchases</h2>");
             
             if (userName != null) {
                 out.println("<p>Welcome, " + userName + "!</p>");
             }

             // Display purchases in a table
             out.println("<table class='table table-bordered'>");
             out.println("<thead class='thead-light'><tr>");
             out.println("<th>Order ID</th>");
             out.println("<th>Order Date</th>");
             out.println("<th>Total</th>");
             out.println("<th>Tracking Number</th>");
             out.println("<th>Actions</th>");
             out.println("</tr></thead>");
             out.println("<tbody>");
             while (rs.next()) {
                 int orderId = rs.getInt("id");
                 Timestamp orderDate = rs.getTimestamp("order_date");
                 double total = rs.getDouble("total");
                 String trackingNumber = rs.getString("tracking_number");
                 
                 out.println("<tr>");
                 out.println("<td>" + orderId + "</td>");
                 out.println("<td>" + orderDate + "</td>");
                 out.println("<td>" + String.format("%.2f", total) + "</td>");
                 out.println("<td>" + trackingNumber + "</td>");
                 out.println("<td><a class='btn btn-info btn-sm' href='orderDetails?orderId=" + orderId + "'>View Details</a></td>");
                 out.println("</tr>");
             }
             
             out.println("</tbody></table>");
             out.println("<a href='products' class='btn btn-secondary'>Continue Shopping</a>");
             out.println("</div>");
             
             rs.close();
             ps.close();
         } catch (SQLException e) {
             out.println("<p>Error: " + e.getMessage() + "</p>");
         }
         
         out.println("</body></html>");
    }
}
