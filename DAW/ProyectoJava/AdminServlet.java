import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;
import java.util.*;

public class AdminServlet extends HttpServlet {

    // Método auxiliar para imprimir el navbar en todas las páginas
    private void printNavBar(PrintWriter out) {
        out.println("<nav class='navbar navbar-expand-lg navbar-light bg-light'>");
        out.println("  <a class='navbar-brand' href='menu'>MyStore</a>");
        out.println("  <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>");
        out.println("    <span class='navbar-toggler-icon'></span>");
        out.println("  </button>");
        out.println("  <div class='collapse navbar-collapse' id='navbarNav'>");
        out.println("    <ul class='navbar-nav'>");
        out.println("      <li class='nav-item'><a class='nav-link' href='menu'>Home</a></li>");  // Cambiado
        out.println("      <li class='nav-item'><a class='nav-link active' href='admin'>Admin</a></li>"); // Cambiado
        out.println("      <li class='nav-item'><a class='nav-link' href='adminPurchases'>Compras</a></li>");
        out.println("    </ul>");
        out.println("  </div>");
        out.println("</nav>");
    }

    // Utility method to obtain a database connection
    private Connection getConnection() throws Exception {
        String dbUrl = "jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false";
        String dbUser  = "alumno";
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
         // Si se solicita editar, mostramos el formulario de edición
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
                         
                         out.println("<html><head><title>Edit Product</title>");
                         out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
                         out.println("</head><body>");
                         
                         // Imprimir el navbar
                         printNavBar(out);
                         
                         out.println("<div class='container mt-5'>");
                         out.println("<h2>Edit Product</h2>");
                         out.println("<form method='post' action='admin'>");
                         out.println("<input type='hidden' name='action' value='update'/>");
                         out.println("<input type='hidden' name='productId' value='" + productId + "'/>");
                         out.println("<div class='form-group'>");
                         out.println("<label for='name'>Name:</label>");
                         out.println("<input type='text' class='form-control' name='name' value='" + name + "' required/>");
                         out.println("</div>");
                         out.println("<div class='form-group'>");
                         out.println("<label for='price'>Price:</label>");
                         out.println("<input type='number' step='0.01' class='form-control' name='price' value='" + price + "' required/>");
                         out.println("</div>");
                         out.println("<div class='form-group'>");
                         out.println("<label for='stock'>Stock:</label>");
                         out.println("<input type='number' class='form-control' name='stock' value='" + stock + "' required/>");
                         out.println("</div>");
                         out.println("<div class='form-group'>");
                         out.println("<label for='photo'>Photo URL:</label>");
                         out.println("<input type='text' class='form-control' name='photo' value='" + (photo != null ? photo : "") + "'/>");
                         out.println("</div>");
                         out.println("<button type='submit' class='btn btn-primary'>Update Product</button>");
                         out.println("</form>");
                         out.println("<br><a href='admin' class='btn btn-secondary'>Back to Admin Panel</a>");
                         out.println("</div>");
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
         // Si se solicita eliminar, procesamos la eliminación
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
         
         // Vista por defecto: listado de productos y formulario para añadir nuevos productos.
         try (Connection conn = getConnection()) {
              Statement stmt = conn.createStatement();
              ResultSet rs = stmt.executeQuery("SELECT * FROM products");
              out.println("<html><head><title>Admin Panel</title>");
              out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
              out.println("</head><body>");
              
              // Imprimir el navbar
              printNavBar(out);
              
              out.println("<div class='container mt-5'>");
              out.println("<h2>Admin Panel - Manage Products</h2>");
              out.println("<table class='table table-bordered'>");
              out.println("<thead class='thead-light'><tr><th>ID</th><th>Photo</th><th>Name</th><th>Price</th><th>Stock</th><th>Actions</th></tr></thead>");
              out.println("<tbody>");
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
                  out.println("<td>" + String.format("%.2f", price) + "</td>");
                  out.println("<td>" + stock + "</td>");
                  out.println("<td>");
                  out.println("<a href='admin?action=edit&productId=" + productId + "' class='btn btn-warning btn-sm'>Edit</a> ");
                  out.println("<a href='admin?action=delete&productId=" + productId + "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure?');\">Delete</a>");
                  out.println("</td>");
                  out.println("</tr>");
              }
              out.println("</tbody>");
              out.println("</table>");
              rs.close();
              stmt.close();
              
              // Formulario para añadir un nuevo producto
              out.println("<h3>Add New Product</h3>");
              out.println("<form method='post' action='admin'>");
              out.println("<input type='hidden' name='action' value='add'/>");
              out.println("<div class='form-group'>");
              out.println("<label for='name'>Name:</label>");
              out.println("<input type='text' class='form-control' name='name' required/>");
              out.println("</div>");
              out.println("<div class='form-group'>");
              out.println("<label for='price'>Price:</label>");
              out.println("<input type='number' step='0.01' class='form-control' name='price' required/>");
              out.println("</div>");
              out.println("<div class='form-group'>");
              out.println("<label for='stock'>Stock:</label>");
              out.println("<input type='number' class='form-control' name='stock' required/>");
              out.println("</div>");
              out.println("<div class='form-group'>");
              out.println("<label for='photo'>Photo URL:</label>");
              out.println("<input type='text' class='form-control' name='photo'/>");
              out.println("</div>");
              out.println("<button type='submit' class='btn btn-success'>Add Product</button>");
              out.println("</form>");
              
              out.println("<br><a href='products' class='btn btn-secondary'>Back to Products</a>");
              out.println("</div>");
              // Add Bootstrap JS and dependencies
              out.println("<script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>");
              out.println("<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js'></script>");
              out.println("<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>");
 
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
         // Verificar que el usuario sea admin.
         if (session == null || !"admin".equals(session.getAttribute("role"))) {
             response.sendRedirect("login");
             return;
         }
         String action = request.getParameter("action");
         if ("add".equals(action)) {
             // Añadir un nuevo producto
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
             // Actualizar un producto existente
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
