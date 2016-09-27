package com.controller;

import java.io.IOException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.dao.Database;

/**
 * Servlet implementation class DoTodaysCheckouts
 */
@WebServlet("/DoTodaysCheckouts")
public class DoTodaysCheckouts extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public DoTodaysCheckouts() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
//		String count = request.getParameter("countParameter");
		String[] idCheckboxes = request.getParameterValues("idCheckboxes");
		Database databaseObject = new Database();
		boolean completed = false;
		for(int i=0;i<idCheckboxes.length;i++){
			completed = databaseObject.checkoutThisUser(Integer.parseInt(idCheckboxes[i]));
		}
		if(completed){
			request.setAttribute("todaysCheckoutDone", "All selected users have been checked out.");
			RequestDispatcher requestDispatcher = request.getRequestDispatcher("index.jsp");
			requestDispatcher.forward(request, response);
		}
		
//		for(int i=1;i<=Integer.parseInt(count);i++){
//			int idToCheckout = Integer.parseInt(request.getParameter("parameter"+i));
//			completed = databaseObject.checkoutThisUser(idToCheckout);
//		}
		
	}

}
