import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class ProductsServlet extends HttpServlet {
    
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        // Verify that the user is logged in
        HttpSession session = request.getSession(false);
        if (session == null || session.getAttribute("user") == null) {
            response.sendRedirect("login"); // redirects to login if no session or user
            return;
        }
        
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        
        // Database connection parameters
        String dbUrl = "jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false";
        String dbUser  = "alumno";
        String dbPass = "mipassword";
        
        try {
            Connection conn = DriverManager.getConnection(dbUrl, dbUser , dbPass);
            Statement stmt = conn.createStatement();
            String query = "SELECT * FROM products";
            ResultSet rs = stmt.executeQuery(query);
            
            out.println("<html><head><title>Products</title>");
            out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
            out.println("</head><body>");


            out.println("<nav class='navbar navbar-expand-lg navbar-light bg-light'>");
            out.println("  <a class='navbar-brand' href='menu'>MyStore</a>");
            out.println("  <div class='collapse navbar-collapse'>");
            out.println("    <ul class='navbar-nav'>");
            out.println("      <li class='nav-item'><a class='nav-link' href=''>Home</a></li>");
            out.println("      <li class='nav-item'><a class='nav-link active' href='products'>Products</a></li>");
            out.println("      <li class='nav-item'><a class='nav-link' href='cart'>Cart</a></li>");
            out.println("      <li class='nav-item'><a class='nav-link' href='purchases'>My Purchases</a></li>");
            out.println("      <li class='nav-item'><a class='nav-link text-danger' href='logout'>Logout</a></li>");
            out.println("    </ul>");
            out.println("  </div>");
            out.println("</nav>");

            out.println("<div class='container mt-5'>");
            out.println("<h2>Products List</h2>");
            out.println("<table class='table table-bordered'>");
            out.println("<thead class='thead-light'>");
            out.println("<tr>");
            out.println("<th>Photo</th>");
            out.println("<th>Name</th>");
            out.println("<th>Price</th>");
            out.println("<th>Stock</th>");
            out.println("<th>Quantity</th>");
            out.println("<th>Action</th>");
            out.println("</tr>");
            out.println("</thead>");
            out.println("<tbody>");
            
            while (rs.next()) {
                int productId = rs.getInt("id");
                String name = rs.getString("name");
                double price = rs.getDouble("price");
                int stock = rs.getInt("stock");
                String photo = rs.getString("photo");
                
                out.println("<tr>");
                // Display the image if it exists, or an alternative message
                if (photo != null && !photo.trim().isEmpty()) {
                    out.println("<td><img src='" + photo + "' alt='" + name + "' class='img-fluid' width='100' height='100'/></td>");
                } else {
                    out.println("<td>No Image</td>");
                }
                out.println("<td>" + name + "</td>");
                out.println("<td>" + price + "</td>");
                out.println("<td>" + stock + "</td>");
                out.println("<td>");
                out.println("<form action='cart' method='post'>");
                // Hidden field to indicate the action "add"
                out.println("<input type='hidden' name='action' value='add'/>");
                // Hidden fields to pass product information
                out.println("<input type='hidden' name='productId' value='" + productId + "'/>");
                out.println("<input type='hidden' name='productName' value='" + name + "'/>");
                out.println("<input type='hidden' name='price' value='" + price + "'/>");
                // Dropdown to select quantity (from 1 to available stock)
                out.println("<select name='quantity' class='form-control'>");
                for (int i = 1; i <= stock; i++) {
                    out.println("<option value='" + i + "'>" + i + "</option>");
                }
                out.println("</select>");
                out.println("</td>");
                out.println("<td>");
                out.println("<input type='submit' class='btn btn-primary mt-2' value='Add to Cart'/>");
                out.println("</form>");
                out.println("</td>");
                out.println("</tr>");
            }
            
            out.println("</tbody>");
            out.println("</table>");
            out.println("<br><a href='cart' class='btn btn-secondary'>View Cart</a>");
            out.println("</div>");
            out.println("</body></html>");
            
            rs.close();
            stmt.close();
            conn.close();
            
        } catch (Exception e) {
            out.println("<h3 class='text-danger'>Error connecting to the database.</h3>");
            e.printStackTrace(out);
        }
    }
}
