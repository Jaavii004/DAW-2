import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class LogoutServlet extends HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        // Retrieve the existing session, if there is one.
        HttpSession session = request.getSession(false);
        
        // If the session exists, invalidate it (log the user out).
        if (session != null) {
            session.invalidate();
        }

        // Remove any cookies associated with the user (if any).
        Cookie[] cookies = request.getCookies();
        if (cookies != null) {
            for (Cookie cookie : cookies) {
                if (cookie.getName().equals("user_id")) { // Example cookie for user ID
                    cookie.setMaxAge(0); // Set the cookie's age to 0 to delete it
                    response.addCookie(cookie);
                }
            }
        }

        // Redirect the user to the login page after logout
        response.sendRedirect("login");
    }
}
