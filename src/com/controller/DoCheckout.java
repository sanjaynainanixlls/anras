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
 * Servlet implementation class DoCheckout
 */
@WebServlet("/DoCheckout")
public class DoCheckout extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public DoCheckout() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		int userId = (Integer.parseInt(request.getParameter("userId")));
		Database databaseObject = new Database();
		User userById =  databaseObject.getUserById(userId);
		
		boolean isRoomFree = databaseObject.checkoutThisUser(userId);
		if(isRoomFree){
			request.setAttribute("userDeleted","Bhagat "+ userById.getName() + " from " + userById.getCity() + " has been checked out.");
			RequestDispatcher requestDispatcher = request.getRequestDispatcher("index.jsp");
			requestDispatcher.forward(request, response);
		}
		else{
			request.setAttribute("userDeleted","Ohh Snap ! There was an error.");
			RequestDispatcher requestDispatcher = request.getRequestDispatcher("index.jsp");
			requestDispatcher.forward(request, response);
		}
				
		
	}

}
