import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class AdminOrderDetailsServlet extends HttpServlet {
    
    // Método para obtener la conexión a la BD
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
             
             out.println("<html><head><title>Order Details</title></head><body>");
             out.println("<h2>Order Details for Order #" + orderId + "</h2>");
             out.println("<table border='1' cellpadding='5'>");
             out.println("<tr>");
             out.println("<th>Product</th>");
             out.println("<th>Quantity</th>");
             out.println("<th>Subtotal</th>");
             out.println("</tr>");
             while(rs.next()){
                String productName = rs.getString("product_name");
                int quantity = rs.getInt("quantity");
                double subtotal = rs.getDouble("subtotal");
                out.println("<tr>");
                out.println("<td>" + productName + "</td>");
                out.println("<td>" + quantity + "</td>");
                out.println("<td>" + subtotal + "</td>");
                out.println("</tr>");
             }
             out.println("</table>");
             out.println("<br><a href='adminPurchases'>Back to Purchases</a>");
             out.println("</body></html>");
             rs.close();
             ps.close();
         } catch(Exception e){
             out.println("<p>Error: " + e.getMessage() + "</p>");
         }
    }
}
