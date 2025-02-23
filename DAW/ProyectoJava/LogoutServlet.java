import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class LogoutServlet extends HttpServlet {
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        // Retrieve the existing session, if there is one.
        HttpSession session = request.getSession(false);
        if (session != null) {
            // Invalidate the session to log the user out.
            session.invalidate();
        }
        // Redirect to the login page (or another page as needed).
        response.sendRedirect("login");
    }
}
