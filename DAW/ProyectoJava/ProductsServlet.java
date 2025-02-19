import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.sql.*;

public class ProductsServlet extends HttpServlet {
    
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        
        // Database connection parameters
        String dbUrl = "jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false";
        String dbUser = "alumno";
        String dbPass = "mipassword";
        
        try {
            Connection conn = DriverManager.getConnection(dbUrl, dbUser, dbPass);
            Statement stmt = conn.createStatement();
            String query = "SELECT * FROM products";
            ResultSet rs = stmt.executeQuery(query);
            
            out.println("<html><head><title>Products</title></head><body>");
            out.println("<h2>Products List</h2>");
            out.println("<table border='1' cellpadding='5'>");
            out.println("<tr>");
            out.println("<th>Name</th>");
            out.println("<th>Price</th>");
            out.println("<th>Stock</th>");
            out.println("<th>Quantity</th>");
            out.println("<th>Action</th>");
            out.println("</tr>");
            
            while (rs.next()) {
                int productId = rs.getInt("id");
                String name = rs.getString("name");
                double price = rs.getDouble("price");
                int stock = rs.getInt("stock");
                
                out.println("<tr>");
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
                out.println("<select name='quantity'>");
                for (int i = 1; i <= stock; i++) {
                    out.println("<option value='" + i + "'>" + i + "</option>");
                }
                out.println("</select>");
                out.println("<input type='submit' value='Add to Cart'/>");
                out.println("</form>");
                out.println("</td>");
                out.println("</tr>");
            }
            
            out.println("</table>");
            out.println("<br><a href='cart'>View Cart</a>");
            out.println("</body></html>");
            
            rs.close();
            stmt.close();
            conn.close();
            
        } catch (Exception e) {
            out.println("<h3>Error connecting to the database.</h3>");
            e.printStackTrace(out);
        }
    }
}
