import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class AdminOrderDetailsServlet extends HttpServlet {
    
    // Método para obtener la conexión a la BD
    private Connection getConnection() throws Exception {
        String dbUrl = "jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false";
        String dbUser  = "alumno";
        String dbPass = "mipassword";
        return DriverManager.getConnection(dbUrl, dbUser , dbPass);
    }
    
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
         throws ServletException, IOException {
         
         response.setContentType("text/html");
         PrintWriter out = response.getWriter();
         HttpSession session = request.getSession(false);
         if (session == null || !"admin".equals(session.getAttribute("role"))) {
             response.sendRedirect("login");
             return;
         }
         String orderIdStr = request.getParameter("orderId");
         if (orderIdStr == null) {
             out.println("<p>No order ID provided.</p>");
             return;
         }
         int orderId = Integer.parseInt(orderIdStr);
         
         try (Connection conn = getConnection()){
             String sql = "SELECT od.*, p.name AS product_name "
                        + "FROM order_details od "
                        + "JOIN products p ON od.product_id = p.id "
                        + "WHERE od.order_id = ?";
             PreparedStatement ps = conn.prepareStatement(sql);
             ps.setInt(1, orderId);
             ResultSet rs = ps.executeQuery();
             
             out.println("<html><head><title>Order Details</title>");
             out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
             out.println("</head><body>");
             out.println("<div class='container mt-5'>");
             out.println("<h2>Order Details for Order #" + orderId + "</h2>");
             out.println("<table class='table table-bordered'>");
             out.println("<thead class='thead-light'>");
             out.println("<tr>");
             out.println("<th>Product</th>");
             out.println("<th>Quantity</th>");
             out.println("<th>Subtotal</th>");
             out.println("</tr>");
             out.println("</thead>");
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
             out.println("</tbody>");
             out.println("</table>");
             out.println("<br><a href='adminPurchases' class='btn btn-secondary'>Back to Purchases</a>");
             out.println("</div>");
             out.println("</body></html>");
             rs.close();
             ps.close();
         } catch(Exception e){
             out.println("<p>Error: " + e.getMessage() + "</p>");
         }
    }
}