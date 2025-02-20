import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;
import java.util.*;

public class AdminServlet extends HttpServlet {

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
         // Check if user is admin
         if (session == null || !"admin".equals(session.getAttribute("role"))) {
             response.sendRedirect("login");
             return;
         }
         
         String action = request.getParameter("action");
         // If action is "edit", show the edit form for a specific product.
         if ("edit".equals(action)) {
             String productIdStr = request.getParameter("productId");
             if (productIdStr != null) {
                 int productId = Integer.parseInt(productIdStr);
                 try (Connection conn = getConnection()) {
                     String sql = "SELECT * FROM products WHERE id = ?";
                     PreparedStatement ps = conn.prepareStatement(sql);
                     ps.setInt(1, productId);
                     ResultSet rs = ps.executeQuery();
                     if (rs.next()) {
                         String name = rs.getString("name");
                         double price = rs.getDouble("price");
                         int stock = rs.getInt("stock");
                         String photo = rs.getString("photo");
                         
                         out.println("<html><head><title>Edit Product</title></head><body>");
                         out.println("<h2>Edit Product</h2>");
                         out.println("<form method='post' action='admin'>");
                         out.println("<input type='hidden' name='action' value='update'/>");
                         out.println("<input type='hidden' name='productId' value='" + productId + "'/>");
                         out.println("Name: <input type='text' name='name' value='" + name + "' required/><br>");
                         out.println("Price: <input type='number' step='0.01' name='price' value='" + price + "' required/><br>");
                         out.println("Stock: <input type='number' name='stock' value='" + stock + "' required/><br>");
                         out.println("Photo URL: <input type='text' name='photo' value='" + (photo != null ? photo : "") + "'/><br>");
                         out.println("<input type='submit' value='Update Product'/>");
                         out.println("</form>");
                         out.println("<br><a href='admin'>Back to Admin Panel</a>");
                         out.println("</body></html>");
                     } else {
                         out.println("<p>Product not found.</p>");
                     }
                     rs.close();
                     ps.close();
                 } catch (Exception e) {
                     out.println("<p>Error: " + e.getMessage() + "</p>");
                 }
                 return;
             }
         }
         // If action is "delete", process deletion and then redirect.
         else if ("delete".equals(action)) {
             String productIdStr = request.getParameter("productId");
             if (productIdStr != null) {
                 int productId = Integer.parseInt(productIdStr);
                 try (Connection conn = getConnection()) {
                     String sql = "DELETE FROM products WHERE id = ?";
                     PreparedStatement ps = conn.prepareStatement(sql);
                     ps.setInt(1, productId);
                     ps.executeUpdate();
                     ps.close();
                     response.sendRedirect("admin");
                     return;
                 } catch (Exception e) {
                     out.println("<p>Error: " + e.getMessage() + "</p>");
                     return;
                 }
             }
         }
         
         // Default view: List products and show the "Add New Product" form.
         try (Connection conn = getConnection()) {
              Statement stmt = conn.createStatement();
              ResultSet rs = stmt.executeQuery("SELECT * FROM products");
              out.println("<html><head><title>Admin Panel</title></head><body>");
              out.println("<h2>Admin Panel - Manage Products</h2>");
              out.println("<table border='1' cellpadding='5'>");
              out.println("<tr><th>ID</th><th>Photo</th><th>Name</th><th>Price</th><th>Stock</th><th>Actions</th></tr>");
              while (rs.next()) {
                  int productId = rs.getInt("id");
                  String name = rs.getString("name");
                  double price = rs.getDouble("price");
                  int stock = rs.getInt("stock");
                  String photo = rs.getString("photo");
                  out.println("<tr>");
                  out.println("<td>" + productId + "</td>");
                  if (photo != null && !photo.trim().isEmpty()) {
                      out.println("<td><img src='" + photo + "' width='50' height='50'/></td>");
                  } else {
                      out.println("<td>No Image</td>");
                  }
                  out.println("<td>" + name + "</td>");
                  out.println("<td>" + price + "</td>");
                  out.println("<td>" + stock + "</td>");
                  out.println("<td>");
                  out.println("<a href='admin?action=edit&productId=" + productId + "'>Edit</a> | ");
                  out.println("<a href='admin?action=delete&productId=" + productId + "' onclick=\"return confirm('Are you sure?');\">Delete</a>");
                  out.println("</td>");
                  out.println("</tr>");
              }
              out.println("</table>");
              rs.close();
              stmt.close();
              
              // Form to add a new product
              out.println("<h3>Add New Product</h3>");
              out.println("<form method='post' action='admin'>");
              out.println("<input type='hidden' name='action' value='add'/>");
              out.println("Name: <input type='text' name='name' required/><br>");
              out.println("Price: <input type='number' step='0.01' name='price' required/><br>");
              out.println("Stock: <input type='number' name='stock' required/><br>");
              out.println("Photo URL: <input type='text' name='photo'/><br>");
              out.println("<input type='submit' value='Add Product'/>");
              out.println("</form>");
              
              out.println("<br><a href='products'>Back to Products</a>");
              out.println("</body></html>");
         } catch(Exception e) {
              out.println("<p>Error connecting to the database: " + e.getMessage() + "</p>");
         }
    }
    
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
         throws ServletException, IOException {
         HttpSession session = request.getSession(false);
         response.setContentType("text/html");
         PrintWriter out = response.getWriter();
         // Verify that the user is admin.
         if (session == null || !"admin".equals(session.getAttribute("role"))) {
             response.sendRedirect("login");
             return;
         }
         String action = request.getParameter("action");
         if ("add".equals(action)) {
             // Add a new product
             String name = request.getParameter("name");
             double price = Double.parseDouble(request.getParameter("price"));
             int stock = Integer.parseInt(request.getParameter("stock"));
             String photo = request.getParameter("photo");
             try (Connection conn = getConnection()){
                  String sql = "INSERT INTO products (name, price, stock, photo) VALUES (?, ?, ?, ?)";
                  PreparedStatement ps = conn.prepareStatement(sql);
                  ps.setString(1, name);
                  ps.setDouble(2, price);
                  ps.setInt(3, stock);
                  ps.setString(4, photo);
                  ps.executeUpdate();
                  ps.close();
             } catch(Exception e) {
                  out.println("<p>Error adding product: " + e.getMessage() + "</p>");
                  return;
             }
         } else if ("update".equals(action)) {
             // Update an existing product
             int productId = Integer.parseInt(request.getParameter("productId"));
             String name = request.getParameter("name");
             double price = Double.parseDouble(request.getParameter("price"));
             int stock = Integer.parseInt(request.getParameter("stock"));
             String photo = request.getParameter("photo");
             try (Connection conn = getConnection()){
                  String sql = "UPDATE products SET name = ?, price = ?, stock = ?, photo = ? WHERE id = ?";
                  PreparedStatement ps = conn.prepareStatement(sql);
                  ps.setString(1, name);
                  ps.setDouble(2, price);
                  ps.setInt(3, stock);
                  ps.setString(4, photo);
                  ps.setInt(5, productId);
                  ps.executeUpdate();
                  ps.close();
             } catch(Exception e) {
                  out.println("<p>Error updating product: " + e.getMessage() + "</p>");
                  return;
             }
         }
         response.sendRedirect("admin");
    }
}
