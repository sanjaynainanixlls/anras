package com.controller;

import java.io.IOException;
import java.util.List;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.dao.Database;
import com.model.User;

/**
 * Servlet implementation class Register
 */
@WebServlet("/Register")
public class Register extends HttpServlet {
	private static final long serialVersionUID = 1L;

    /**
     * Default constructor. 
     */
    public Register() {
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		Database databaseObject = new Database();
		List roomList = databaseObject.getAllRooms();
		request.setAttribute("roomList", roomList);
		RequestDispatcher requestDispatcher = request.getRequestDispatcher("roomAllocation.jsp");
		requestDispatcher.forward(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String name = request.getParameter("name");
		String phoneNumber = request.getParameter("phoneNumber");
		String city = request.getParameter("city");
		String comingDate = request.getParameter("comingDate");
		String returnDate = request.getParameter("returnDate");
		int numberOfPeople = (Integer.parseInt(request.getParameter("numberOfPeople")));
		int roomNumberAlloted = (Integer.parseInt(request.getParameter("roomNumberAlloted")));
		Database databaseObject = new Database();
		int userId = databaseObject.saveUserInDatabase(name,phoneNumber,city,comingDate,returnDate,numberOfPeople,roomNumberAlloted);
		if(databaseObject.updateRoomWithPeople(numberOfPeople, roomNumberAlloted, city)){
			request.setAttribute("userRegistered",name);
			request.setAttribute("roomNumber", roomNumberAlloted);
			request.setAttribute("userId", userId);
			RequestDispatcher requestDispatcher = request.getRequestDispatcher("index.jsp");
			requestDispatcher.forward(request, response);
		}
		
		
	}

}
