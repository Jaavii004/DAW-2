import java.io.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;

// Represents an item in the shopping cart
class CartItem {
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

public class CartServlet extends HttpServlet {
    @SuppressWarnings("unchecked")
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        HttpSession session = request.getSession();
        List<CartItem> cart = (List<CartItem>) session.getAttribute("cart");
        if (cart == null) {
            cart = new ArrayList<>();
            session.setAttribute("cart", cart);
        }
        
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
        
        response.sendRedirect("cart.jsp");
    }
}
