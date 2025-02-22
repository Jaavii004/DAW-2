import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class ProductsServlet extends HttpServlet {
    
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        // Verificar que el usuario esté logueado
        HttpSession session = request.getSession(false);
        if (session == null || session.getAttribute("user") == null) {
            response.sendRedirect("login"); // redirige a login si no hay sesión o usuario
            return;
        }
        
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        
        // Parámetros de conexión a la base de datos
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
                // Mostrar la imagen si existe, o un mensaje alternativo
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
                // Campo oculto para indicar la acción "add"
                out.println("<input type='hidden' name='action' value='add'/>");
                // Campos ocultos para pasar la información del producto
                out.println("<input type='hidden' name='productId' value='" + productId + "'/>");
                out.println("<input type='hidden' name='productName' value='" + name + "'/>");
                out.println("<input type='hidden' name='price' value='" + price + "'/>");
                // Dropdown para seleccionar cantidad (de 1 hasta el stock disponible)
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