import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.util.*;
import java.sql.*;

public class CartServlet extends HttpServlet {

    // Inner class to represent a cart item
    public static class CartItem {
        private int productId;
        private String productName;
        private double price;
        private int quantity;

        public CartItem(int productId, String productName, double price, int quantity) {
            this.productId = productId;
            this.productName = productName;
            this.price = price;
            this.quantity = quantity;
        }
        
        public int getProductId() { return productId; }
        public String getProductName() { return productName; }
        public double getPrice() { return price; }
        public int getQuantity() { return quantity; }
        public void setQuantity(int quantity) { this.quantity = quantity; }
    }

    // Displays the cart, calculates total, shipping, and shows Checkout button
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        HttpSession session = request.getSession();
        List<CartItem> cart = (List<CartItem>) session.getAttribute("cart");
        if (cart == null) {
            cart = new ArrayList<>();
            session.setAttribute("cart", cart);
        }

        out.println("<html><head><title>Shopping Cart</title>");
        out.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
        out.println("</head><body>");

        // Navbar for navigation
        out.println("<nav class='navbar navbar-expand-lg navbar-light bg-light'>");
        out.println("  <a class='navbar-brand' href='menu'>MyStore</a>");
        out.println("  <div class='collapse navbar-collapse'>");
        out.println("    <ul class='navbar-nav'>");
        out.println("      <li class='nav-item'><a class='nav-link' href=''>Home</a></li>");
        out.println("      <li class='nav-item'><a class='nav-link' href='products'>Products</a></li>");
        out.println("      <li class='nav-item'><a class='nav-link active' href='cart'>Cart</a></li>");
        out.println("      <li class='nav-item'><a class='nav-link' href='purchases'>My Purchases</a></li>");
        out.println("    </ul>");
        out.println("  </div>");
        out.println("</nav>");

        out.println("<div class='container mt-5'>");
        out.println("<h2>Your Shopping Cart</h2>");

        if (cart.isEmpty()) {
            out.println("<p>Your cart is empty.</p>");
        } else {
            double subtotal = 0.0;
            int totalQuantity = 0;
            out.println("<form method='post' action='cart'>");
            out.println("<table class='table table-bordered'>");
            out.println("<thead class='thead-light'>");
            out.println("<tr>");
            out.println("<th>Product Name</th>");
            out.println("<th>Price</th>");
            out.println("<th>Quantity</th>");
            out.println("<th>Subtotal</th>");
            out.println("<th>Action</th>");
            out.println("</tr>");
            out.println("</thead>");
            out.println("<tbody>");
            for (CartItem item : cart) {
                double itemSubtotal = item.getPrice() * item.getQuantity();
                subtotal += itemSubtotal;
                totalQuantity += item.getQuantity();
                out.println("<tr>");
                out.println("<td>" + item.getProductName() + "</td>");
                out.println("<td>" + String.format("%.2f", item.getPrice()) + "</td>");
                out.println("<td><input type='number' class='form-control' name='quantity_" + item.getProductId() + "' value='" 
                            + item.getQuantity() + "' min='1'/></td>");
                out.println("<td>" + String.format("%.2f", itemSubtotal) + "</td>");
                out.println("<td><button type='submit' class='btn btn-danger' name='remove' value='" + item.getProductId() + "'>Remove</button></td>");
                out.println("</tr>");
            }
            out.println("</tbody>");
            out.println("<tfoot>");
            double shipping = 2.0 + totalQuantity * 1.0;
            double totalPrice = subtotal + shipping;
            out.println("<tr><td colspan='3'>Subtotal:</td><td colspan='2'>" + String.format("%.2f", subtotal) + "</td></tr>");
            out.println("<tr><td colspan='3'>Shipping:</td><td colspan='2'>" + String.format("%.2f", shipping) + "</td></tr>");
            out.println("<tr><td colspan='3'>Total:</td><td colspan='2'>" + String.format("%.2f", totalPrice) + "</td></tr>");
            out.println("</tfoot>");
            out.println("</table>");
            out.println("<br><button type='submit' class='btn btn-primary' name='update'>Update Cart</button>");
            if (session.getAttribute("user") != null) {
                out.println("<br><br><button type='submit' class='btn btn-success' name='checkout'>Checkout</button>");
            } else {
                out.println("<br><br><a href='login' class='btn btn-info'>Log in to Checkout</a>");
            }
            out.println("</form>");
        }
        out.println("<br><a href='products' class='btn btn-secondary'>Continue Shopping</a>");
        out.println("</div>");
        out.println("</body></html>");
    }

    // Processes cart actions: add, remove, update, and checkout
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        HttpSession session = request.getSession();
        List<CartItem> cart = (List<CartItem>) session.getAttribute("cart");
        if (cart == null) {
            cart = new ArrayList<>();
            session.setAttribute("cart", cart);
        }

        String action = request.getParameter("action");
        if (action != null && action.equals("add")) {
            int productId = Integer.parseInt(request.getParameter("productId"));
            String productName = request.getParameter("productName");
            double price = Double.parseDouble(request.getParameter("price"));
            int quantity = Integer.parseInt(request.getParameter("quantity"));
            
            boolean found = false;
            for (CartItem item : cart) {
                if (item.getProductId() == productId) {
                    item.setQuantity(item.getQuantity() + quantity);
                    found = true;
                    break;
                }
            }
            if (!found) {
                cart.add(new CartItem(productId, productName, price, quantity));
            }
        } 
        else if (request.getParameter("remove") != null) {
            int removeId = Integer.parseInt(request.getParameter("remove"));
            Iterator<CartItem> it = cart.iterator();
            while(it.hasNext()){
                CartItem item = it.next();
                if(item.getProductId() == removeId) {
                    it.remove();
                    break;
                }
            }
        } 
        else if (request.getParameter("update") != null) {
            for (CartItem item : cart) {
                String paramName = "quantity_" + item.getProductId();
                String quantityStr = request.getParameter(paramName);
                if (quantityStr != null) {
                    try {
                        int newQuantity = Integer.parseInt(quantityStr);
                        if (newQuantity > 0) {
                            item.setQuantity(newQuantity);
                        }
                    } catch (NumberFormatException e) {}
                }
            }
        }
        else if (request.getParameter("checkout") != null) {
            // If not logged in, redirect to login
            if (session.getAttribute("user_id") == null) {
                response.sendRedirect("login");
                return;
            }
            
            // Calculate totals
            double subtotal = 0.0;
            int totalQuantity = 0;
            for (CartItem item : cart) {
                subtotal += item.getPrice() * item.getQuantity();
                totalQuantity += item.getQuantity();
            }
            double shipping = 2.0 + totalQuantity * 1.0;
            double totalPrice = subtotal + shipping;
            
            // Database connection details
            String dbUrl = "jdbc:mysql://localhost/java_store?allowPublicKeyRetrieval=true&useSSL=false";
            String dbUser  = "alumno";
            String dbPass = "mipassword";
            
            try {
                // Connection and transaction
                Connection conn = DriverManager.getConnection(dbUrl, dbUser, dbPass);
                conn.setAutoCommit(false);
                
                int userId = (Integer) session.getAttribute("user_id");
                String trackingNumber = "TRK" + System.currentTimeMillis();
                String orderSql = "INSERT INTO orders (user_id, total, tracking_number) VALUES (?, ?, ?)";
                PreparedStatement orderStmt = conn.prepareStatement(orderSql, Statement.RETURN_GENERATED_KEYS);
                orderStmt.setInt(1, userId);
                orderStmt.setDouble(2, totalPrice);
                orderStmt.setString(3, trackingNumber);
                orderStmt.executeUpdate();
                
                ResultSet generatedKeys = orderStmt.getGeneratedKeys();
                int orderId = 0;
                if (generatedKeys.next()) {
                    orderId = generatedKeys.getInt(1);
                }
                generatedKeys.close();
                orderStmt.close();
                
                // Insert order details
                String detailSql = "INSERT INTO order_details (order_id, product_id, quantity, subtotal) VALUES (?, ?, ?, ?)";
                PreparedStatement detailStmt = conn.prepareStatement(detailSql);
                for (CartItem item : cart) {
                    detailStmt.setInt(1, orderId);
                    detailStmt.setInt(2, item.getProductId());
                    detailStmt.setInt(3, item.getQuantity());
                    detailStmt.setDouble(4, item.getPrice() * item.getQuantity());
                    detailStmt.addBatch();
                }
                detailStmt.executeBatch();
                detailStmt.close();
                
                conn.commit();
                conn.close();
                
                // Clear cart after checkout
                cart.clear();
                session.setAttribute("cart", cart);
                
                // Show order confirmation
                response.setContentType("text/html;charset=UTF-8");
                PrintWriter outResp = response.getWriter();
                outResp.println("<html><head><title>Order Confirmation</title>");
                outResp.println("<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>");
                outResp.println("</head><body>");
                outResp.println("<div class='container mt-5'>");
                outResp.println("<h2>Thank you for your purchase!</h2>");
                outResp.println("<p>Your order has been placed with tracking number: " + trackingNumber + "</p>");
                outResp.println("<p>Subtotal: " + String.format("%.2f €", subtotal));
                outResp.println("<br>Shipping: " + String.format("%.2f €", shipping));
                outResp.println("<br>Total: " + String.format("%.2f €", totalPrice) + "</p>");
                outResp.println("<a href='products' class='btn btn-secondary'>Continue Shopping</a>");
                outResp.println("</div>");
                outResp.println("</body></html>");
                return;
                
            } catch (Exception e) {
                e.printStackTrace();
            }
        }
        
        session.setAttribute("cart", cart);
        response.sendRedirect("cart");
    }
}
