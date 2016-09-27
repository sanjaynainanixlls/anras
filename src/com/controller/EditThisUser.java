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
 * Servlet implementation class EditThisUser
 */
@WebServlet("/EditThisUser")
public class EditThisUser extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public EditThisUser() {
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
		int userIdToBeEdited = Integer.parseInt(request.getParameter("userIdToBeEdited"));
		String name = request.getParameter("name");
		String phoneNumber = request.getParameter("phoneNumber");
		String city = request.getParameter("city");
		String comingDate = request.getParameter("comingDate");
		String returnDate = request.getParameter("returnDate");
		int numberOfPeople = (Integer.parseInt(request.getParameter("numberOfPeople")));
		int roomNumberAlloted = (Integer.parseInt(request.getParameter("roomNumberAlloted")));
		Database databaseObject = new Database();
		boolean updated = databaseObject.updateUserInDatabase(userIdToBeEdited,name,phoneNumber,city,comingDate,returnDate,numberOfPeople,roomNumberAlloted);
		if(databaseObject.updateRoomWithPeople(numberOfPeople, roomNumberAlloted, city)){
			request.setAttribute("userRegistered",name);
			request.setAttribute("roomNumber", roomNumberAlloted);
			request.setAttribute("userId", userIdToBeEdited);
			RequestDispatcher requestDispatcher = request.getRequestDispatcher("index.jsp");
			requestDispatcher.forward(request, response);
		}
	}

}
