import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class AdminPurchasesServlet extends HttpServlet {

    // Método para obtener la conexión a la BD
    private Connection getConnection() throws Exception {
        String dbUrl = "jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false";
        String dbUser  = "alumno";
        String dbPass = "mipassword";
        return DriverManager.getConnection(dbUrl, dbUser, dbPass);
    }
    
    // Método auxiliar para imprimir el navbar en todas las páginas
    private void printNavBar(PrintWriter out) {
        out.println("<nav class='navbar navbar-expand-lg navbar-light bg-light'>");
        out.println("  <a class='navbar-brand' href='menu'>MyStore</a>");
        out.println("  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>");
        out.println("    <span class='navbar-toggler-icon'></span>");
        out.println("  </button>");
        out.println("  <div class='collapse navbar-collapse' id='navbarNav'>");
        out.println("    <ul class='navbar-nav'>");
        out.println("      <li class='nav-item'><a class='nav-link' href='/'>Home</a></li>");
        out.println("      <li class='nav-item'><a class='nav-link' href='/admin'>Admin</a></li>");
        out.println("      <li class='nav-item'><a class='nav-link active' href='adminPurchases'>adminPurchases</a></li>");
        out.println("    </ul>");
        out.println("  </div>");
        out.println("</nav>");
    }
    
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
         throws ServletException, IOException {
        
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        HttpSession session = request.getSession(false);
        // Solo admin puede acceder
        if (session == null || !"admin".equals(session.getAttribute("role"))) {
            response.sendRedirect("login");
            return;
        }
        
        try (Connection conn = getConnection()) {
           // Consulta de pedidos con datos del cliente
           String sql = "SELECT o.id AS order_id, o.order_date, o.total, o.tracking_number, "
                      + "u.name AS customer_name, u.email AS customer_email "
                      + "FROM orders o JOIN users u ON o.user_id = u.id "
                      + "ORDER BY o.order_date DESC";
           Statement stmt = conn.createStatement();
           ResultSet rs = stmt.executeQuery(sql);
           
           out.println("<html><head><title>Admin - Purchases</title>");
           out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
           out.println("</head><body>");
           
           // Imprimir el navbar
           printNavBar(out);
           
           out.println("<div class='container mt-5'>");
           out.println("<h2>Purchases List</h2>");
           out.println("<table class='table table-bordered'>");
           out.println("<thead class='thead-light'>");
           out.println("<tr>");
           out.println("<th>Order ID</th>");
           out.println("<th>Customer Name</th>");
           out.println("<th>Customer Email</th>");
           out.println("<th>Order Date</th>");
           out.println("<th>Total</th>");
           out.println("<th>Tracking Number</th>");
           out.println("<th>Actions</th>");
           out.println("</tr>");
           out.println("</thead>");
           out.println("<tbody>");
           
           while(rs.next()){
             int orderId = rs.getInt("order_id");
             String customerName = rs.getString("customer_name");
             String customerEmail = rs.getString("customer_email");
             Timestamp orderDate = rs.getTimestamp("order_date");
             double total = rs.getDouble("total");
             String trackingNumber = rs.getString("tracking_number");
             
             out.println("<tr>");
             out.println("<td>" + orderId + "</td>");
             out.println("<td>" + customerName + "</td>");
             out.println("<td>" + customerEmail + "</td>");
             out.println("<td>" + orderDate + "</td>");
             out.println("<td>" + String.format("%.2f", total) + "</td>");
             out.println("<td>" + trackingNumber + "</td>");
             out.println("<td><a href='adminOrderDetails?orderId=" + orderId + "' class='btn btn-info'>View Details</a></td>");
             out.println("</tr>");
           }
           
           out.println("</tbody>");
           out.println("</table>");
           out.println("<br><a href='admin' class='btn btn-secondary'>Back to Admin Panel</a>");
           out.println("</div>");
           // Add Bootstrap JS and dependencies
           out.println("<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>");
           out.println("<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js'></script>");
           out.println("<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>");
           out.println("</body></html>");
           
           rs.close();
           stmt.close();
        } catch (Exception e) {
           out.println("<p>Error: " + e.getMessage() + "</p>");
        }
    }
}