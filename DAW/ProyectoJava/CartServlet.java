import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;
import java.util.*;

public class CartServlet extends HttpServlet {

    // Clase interna para representar un ítem del carrito
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

    // Muestra el carrito y permite editarlo
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        // Recupera o inicializa el carrito en la sesión
        HttpSession session = request.getSession();
        List<CartItem> cart = (List<CartItem>) session.getAttribute("cart");
        if (cart == null) {
            cart = new ArrayList<>();
            session.setAttribute("cart", cart);
        }

        out.println("<html><head><title>Shopping Cart</title></head><body>");
        out.println("<h2>Your Shopping Cart</h2>");

        if (cart.isEmpty()) {
            out.println("<p>Your cart is empty.</p>");
        } else {
            double total = 0;
            out.println("<form method='post' action='cart'>");
            out.println("<table border='1' cellpadding='5'>");
            out.println("<tr>");
            out.println("<th>Product Name</th>");
            out.println("<th>Price</th>");
            out.println("<th>Quantity</th>");
            out.println("<th>Subtotal</th>");
            out.println("<th>Action</th>");
            out.println("</tr>");
            for (CartItem item : cart) {
                double subtotal = item.getPrice() * item.getQuantity();
                total += subtotal;
                out.println("<tr>");
                out.println("<td>" + item.getProductName() + "</td>");
                out.println("<td>" + item.getPrice() + "</td>");
                out.println("<td><input type='number' name='quantity_" + item.getProductId() + "' value='" 
                            + item.getQuantity() + "' min='1'/></td>");
                out.println("<td>" + subtotal + "</td>");
                out.println("<td><button type='submit' name='remove' value='" + item.getProductId() + "'>Remove</button></td>");
                out.println("</tr>");
            }
            out.println("<tr><td colspan='3'>Total:</td><td colspan='2'>" + total + "</td></tr>");
            out.println("</table>");
            out.println("<br><input type='submit' name='update' value='Update Cart'/>");
            out.println("</form>");
        }
        out.println("<br><a href='products'>Continue Shopping</a>");
        out.println("</body></html>");
    }

    // Procesa las acciones del carrito
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        HttpSession session = request.getSession();
        List<CartItem> cart = (List<CartItem>) session.getAttribute("cart");
        if (cart == null) {
            cart = new ArrayList<>();
            session.setAttribute("cart", cart);
        }

        // Acción "add" proveniente de ProductsServlet
        String action = request.getParameter("action");
        if (action != null && action.equals("add")) {
            int productId = Integer.parseInt(request.getParameter("productId"));
            String productName = request.getParameter("productName");
            double price = Double.parseDouble(request.getParameter("price"));
            int quantity = Integer.parseInt(request.getParameter("quantity"));
            
            // Si el producto ya está en el carrito, actualiza la cantidad
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
        // Otras acciones: remover o actualizar desde la vista del carrito
        else {
            String remove = request.getParameter("remove");
            if (remove != null) {
                int removeId = Integer.parseInt(remove);
                Iterator<CartItem> it = cart.iterator();
                while(it.hasNext()){
                    CartItem item = it.next();
                    if(item.getProductId() == removeId) {
                        it.remove();
                        break;
                    }
                }
            } else if (request.getParameter("update") != null) {
                for (CartItem item : cart) {
                    String paramName = "quantity_" + item.getProductId();
                    String quantityStr = request.getParameter(paramName);
                    if (quantityStr != null) {
                        try {
                            int newQuantity = Integer.parseInt(quantityStr);
                            if (newQuantity > 0) {
                                item.setQuantity(newQuantity);
                            }
                        } catch (NumberFormatException e) {
                            // Se ignoran los valores no numéricos
                        }
                    }
                }
            }
        }
        session.setAttribute("cart", cart);
        response.sendRedirect("cart");
    }
}
