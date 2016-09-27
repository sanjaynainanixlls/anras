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
 * Servlet implementation class EditInformation
 */
@WebServlet("/EditInformation")
public class EditInformation extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public EditInformation() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		RequestDispatcher requestDispatcher = request.getRequestDispatcher("editInformationGetId.jsp");
		requestDispatcher.forward(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		int id = Integer.parseInt(request.getParameter("editId"));
		Database databaseObject = new Database();
		User userToBeEdited = databaseObject.getUserById(id);
		request.setAttribute("userToBeEdited", userToBeEdited);
		List roomList = databaseObject.getAllRooms();
		request.setAttribute("roomList", roomList);
		RequestDispatcher requestDispatcher = request.getRequestDispatcher("editInformation.jsp");
		requestDispatcher.forward(request, response);
		
		
	}

}
