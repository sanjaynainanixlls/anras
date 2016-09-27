package com.controller;

import java.io.IOException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.dao.Database;
import com.model.User;

/**
 * Servlet implementation class Checkout
 */
@WebServlet("/Checkout")
public class Checkout extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Checkout() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		
		RequestDispatcher requestDispatcher = request.getRequestDispatcher("checkout.jsp");
		requestDispatcher.forward(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		int checkoutId = Integer.parseInt(request.getParameter("checkoutId"));
		Database databaseObject = new Database();
		User userToCheckout = databaseObject.getUserById(checkoutId);
		if(userToCheckout==null){
			request.setAttribute("userHasAlreadyCheckedOut","There is no user with this id.");
			RequestDispatcher requestDispatcher = request.getRequestDispatcher("checkOutThisUser.jsp");
			requestDispatcher.forward(request, response);
		}
		
		if(userToCheckout!=null && userToCheckout.getIsCheckedOut()==1){
			request.setAttribute("userHasAlreadyCheckedOut","This User has Already Checked Out");
			RequestDispatcher requestDispatcher = request.getRequestDispatcher("checkOutThisUser.jsp");
			requestDispatcher.forward(request, response);
		}
		
		else{
			request.setAttribute("userToCheckout", userToCheckout);
			RequestDispatcher requestDispatcher = request.getRequestDispatcher("checkOutThisUser.jsp");
			requestDispatcher.forward(request, response);
		}
		
	}

}
