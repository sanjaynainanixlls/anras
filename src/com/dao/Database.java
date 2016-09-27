package com.dao;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Calendar;
import java.util.List;

import org.hibernate.Criteria;
import org.hibernate.HibernateException;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;
import org.hibernate.cfg.Configuration;
import org.hibernate.criterion.Projections;

import com.model.Rooms;
import com.model.User;

public class Database {
	

	private static SessionFactory factory; 
	public List getAllRooms(){
		List<Rooms> roomList = new ArrayList<Rooms>();
		try{
	         factory = new Configuration().configure().buildSessionFactory();
	      }catch (Throwable ex) { 
	         System.err.println("Failed to create sessionFactory object." + ex);
	         throw new ExceptionInInitializerError(ex); 
	      }
		      Session session = factory.openSession();
		      Transaction tx = null;
		      try{
		         tx = session.beginTransaction();
		          roomList = session.createQuery("FROM Rooms").list(); 
		         tx.commit();
		      }catch (HibernateException e) {
		         if (tx!=null) tx.rollback();
		         e.printStackTrace(); 
		      }finally {
		         session.close(); 
		      }
		      return roomList;
	}
	public Integer saveUserInDatabase(String name, String phoneNumber,
			String city, String comingDate, String returnDate, int numberOfPeople, int roomNumberAlloted) {
		
		Session session = factory.openSession();
	      Transaction tx = null;
	      Integer userID = null;
	      try{
	         tx = session.beginTransaction();
	         int isCheckedOut = 0;
	         User user = new User(name, phoneNumber, city, numberOfPeople, comingDate, returnDate, roomNumberAlloted, isCheckedOut);
	         userID = (Integer) session.save(user); 
	         tx.commit();
	      }catch (HibernateException e) {
	         if (tx!=null) tx.rollback();
	         e.printStackTrace(); 
	      }finally {
	         session.close(); 
	      }
	      return userID;
		
	}
	public boolean updateRoomWithPeople(int numberOfPeople, int roomNumber, String city) {
		Session session = factory.openSession();
	      Transaction tx = null;
	      try{
	         tx = session.beginTransaction();
	         Rooms rooms = 
	                    (Rooms)session.get(Rooms.class, roomNumber); 
	         int numberOfPeopleStayingCurrently = rooms.getNumberOfPeopleStaying();
	         numberOfPeopleStayingCurrently += numberOfPeople;
	         rooms.setNumberOfPeopleStaying(numberOfPeopleStayingCurrently);
	         String cities =  rooms.getCityString();
	         if(cities.trim().isEmpty()|| cities==null){
	        	 cities=city;
	         }
	         else{
	        	 String citiesArray[] = cities.split(",");
	        	 boolean checkFlag = false;
	        	 for(int i=0; i<citiesArray.length;i++){
	        		 if(city.equalsIgnoreCase(citiesArray[i])){
	        			 checkFlag = true;
	        		 }
	        	 }
	        	 if(checkFlag==false){
	        		 cities = cities+","+city;
	        	 }
	         }
	         rooms.setCityString(cities);
			 session.update(rooms); 
	         tx.commit();
	         return true;
	      }catch (HibernateException e) {
	         if (tx!=null) tx.rollback();
	         e.printStackTrace(); 
	         return false;
	      }finally {
	         session.close(); 
	      }
		
	}
	public List getCompleteStatus() {
		List<User> completeStatus = new ArrayList<User>();
		try{
	         factory = new Configuration().configure().buildSessionFactory();
	      }catch (Throwable ex) { 
	         System.err.println("Failed to create sessionFactory object." + ex);
	         throw new ExceptionInInitializerError(ex); 
	      }
		      Session session = factory.openSession();
		      Transaction tx = null;
		      try{
		    	 String hql = "FROM User WHERE isCheckedOut = 0";
		         tx = session.beginTransaction();
		         completeStatus = session.createQuery(hql).list(); 
		         tx.commit();
		      }catch (HibernateException e) {
		         if (tx!=null) tx.rollback();
		         e.printStackTrace(); 
		      }finally {
		         session.close(); 
		      }
		      return completeStatus;
	}
	
	
	public User getUserById(int id) {
		Session session = factory.openSession();
	      Transaction tx = null;
	      User user = new User();
	      try{
	         tx = session.beginTransaction();
	         user = 
	                    (User)session.get(User.class, id); 
	         return user;
	      }catch (HibernateException e) {
	         if (tx!=null) tx.rollback();
	         e.printStackTrace();
	         return null;
	      }finally {
	         session.close(); 
	      }
	}
	public boolean checkoutThisUser(int userId) {
		Session session = factory.openSession();
	      Transaction tx = null;
	      try{
	         tx = session.beginTransaction();
	         User user = 
	                    (User)session.get(User.class, userId); 
	         int numberOfPeopleToFree = user.getNumberOfPeople();
	         user.setIsCheckedOut(1);
	         session.update(user); 
	         tx.commit();
	         return freeRoomWithPeople(numberOfPeopleToFree,user.getRoomAlloted(), user.getCity());
	      }catch (HibernateException e) {
	         if (tx!=null) tx.rollback();
	         e.printStackTrace(); 
	         return false;
	      }finally {
	         session.close(); 
	      }
	}
	
	private boolean freeRoomWithPeople(int numberOfPeopleToFree, int roomNumber, String oldCity) {
		Session session = factory.openSession();
	      Transaction tx = null;
	      try{
	         tx = session.beginTransaction();
	         Rooms rooms = 
	                    (Rooms)session.get(Rooms.class, roomNumber); 
	         int numberOfPeopleStayingCurrently = rooms.getNumberOfPeopleStaying();
	         numberOfPeopleStayingCurrently -= numberOfPeopleToFree;
	         rooms.setNumberOfPeopleStaying(numberOfPeopleStayingCurrently);
	         if(!checkRoomForCity(roomNumber, oldCity)){
	        	 String allCities = rooms.getCityString();
		         if(allCities.contains(",")){
		        	 String[] cityArray = allCities.split(",");
		        	 String newCities="";
		        	 int arrayIndex = 0;
		        	 for (String city : cityArray) {
						if(city.trim().equalsIgnoreCase(oldCity)){
							arrayIndex++;
						}
						else{
							newCities+=city.trim()+",";
							arrayIndex++;
						}
						
		        	 }
		        	if(newCities.endsWith(",")){
		        		StringBuilder cityStringBuilder = new StringBuilder(newCities);
		        		cityStringBuilder.setCharAt(newCities.length()-1, ' ');
		        		newCities = cityStringBuilder.toString().trim();
		        	}
		        	newCities.replace(",,", ",");
		        	rooms.setCityString(newCities);
		         }
		         else if(allCities.equals(oldCity)){
		        	 allCities="";
		        	 rooms.setCityString(allCities);
		         } 
	         }
			 session.update(rooms); 
	         tx.commit();
	         
	         return true;
	      }catch (HibernateException e) {
	         if (tx!=null) tx.rollback();
	         e.printStackTrace(); 
	         return false;
	      }finally {
	         session.close(); 
	      }
		
	}
	private Boolean checkRoomForCity(int roomNumber, String oldCity) {
		List<User> peopleFromSameCityAndRoomNumber = new ArrayList<User>();
		try{
	         factory = new Configuration().configure().buildSessionFactory();
	      }catch (Throwable ex) { 
	         System.err.println("Failed to create sessionFactory object." + ex);
	         throw new ExceptionInInitializerError(ex); 
	      }
		      Session session = factory.openSession();
		      Transaction tx = null;
		      try{
		    	 String hql = "FROM User WHERE roomAlloted='"+roomNumber +"' AND city='"+oldCity+"' AND isCheckedOut='0'" ;
		         tx = session.beginTransaction();
		         peopleFromSameCityAndRoomNumber = session.createQuery(hql).list(); 
		         tx.commit();
		      }catch (HibernateException e) {
		         if (tx!=null) tx.rollback();
		         e.printStackTrace(); 
		      }finally {
		         session.close(); 
		      }
		      System.out.println("================"+peopleFromSameCityAndRoomNumber.size());
		      if(peopleFromSameCityAndRoomNumber.size()>0){
		    	  return true;
		      }
		      else{
		    	  return false;
		      }
	}
	
	public List getTodaysCheckouts() {
		List<User> todaysCheckouts = new ArrayList<User>();
		try{
	         factory = new Configuration().configure().buildSessionFactory();
	      }catch (Throwable ex) { 
	         System.err.println("Failed to create sessionFactory object." + ex);
	         throw new ExceptionInInitializerError(ex); 
	      }
		      Session session = factory.openSession();
		      Transaction tx = null;
		      try{
		    	  DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
		    	  Calendar cal = Calendar.getInstance();
		    	  System.out.println(dateFormat.format(cal.getTime())); //2014/08/06 16:00:22
		    	 String hql = "FROM User WHERE returnDate='"+dateFormat.format(cal.getTime()) +"' AND isCheckedOut='0'";
		         tx = session.beginTransaction();
		         todaysCheckouts = session.createQuery(hql).list(); 
		         tx.commit();
		      }catch (HibernateException e) {
		         if (tx!=null) tx.rollback();
		         e.printStackTrace(); 
		      }finally {
		         session.close(); 
		      }
		      return todaysCheckouts;
	}
	public List getCitiesByRoomNumber(int currentRoomNumber) {
		List cityList = null;
		try{
	         factory = new Configuration().configure().buildSessionFactory();
	      }catch (Throwable ex) { 
	         System.err.println("Failed to create sessionFactory object." + ex);
	         throw new ExceptionInInitializerError(ex); 
	      }
		      Session session = factory.openSession();
		      Transaction tx = null;
		      try{
		    	 String hql = "SELECT city FROM User WHERE roomAlloted='"+currentRoomNumber +"' AND isCheckedOut='0'";
		         tx = session.beginTransaction();
		         cityList = session.createQuery(hql).list(); 
		         tx.commit();
		      }catch (HibernateException e) {
		         if (tx!=null) tx.rollback();
		         e.printStackTrace(); 
		      }finally {
		         session.close(); 
		      }
		      return cityList;
	}
	public boolean updateUserInDatabase(int userIdToBeEdited, String name,
			String phoneNumber, String city, String comingDate,
			String returnDate, int numberOfPeople, int roomNumberAlloted) {
		Session session = factory.openSession();
	      Transaction tx = null;
	      try{
	         tx = session.beginTransaction();
	         User userToBeEdited = 
	                    (User)session.get(User.class, userIdToBeEdited); 
	         int oldRoomNumber = userToBeEdited.getRoomAlloted();
	         int oldNumberOfPeople = userToBeEdited.getNumberOfPeople();
	         String oldCity = userToBeEdited.getCity();
	         userToBeEdited.setName( name );
	         userToBeEdited.setPhoneNumber(phoneNumber);
	         userToBeEdited.setCity(city);
	         userToBeEdited.setComingDate(comingDate);
	         userToBeEdited.setReturnDate(returnDate);
	         userToBeEdited.setNumberOfPeople(numberOfPeople);
	         userToBeEdited.setRoomAlloted(roomNumberAlloted);
	         freeRoomWithPeople(oldNumberOfPeople, oldRoomNumber, oldCity);
			 session.update(userToBeEdited); 
	         tx.commit();
	         return true;
	      }catch (HibernateException e) {
	         if (tx!=null) tx.rollback();
	         e.printStackTrace();
	          return false; 
	      }finally {
	         session.close(); 
	      }
		
	}
	public List getAllCheckouts() {
		List<User> allCheckouts = new ArrayList<User>();
		try{
	         factory = new Configuration().configure().buildSessionFactory();
	      }catch (Throwable ex) { 
	         System.err.println("Failed to create sessionFactory object." + ex);
	         throw new ExceptionInInitializerError(ex); 
	      }
		      Session session = factory.openSession();
		      Transaction tx = null;
		      try{
		    	 String hql = "FROM User WHERE isCheckedOut = 1";
		         tx = session.beginTransaction();
		         allCheckouts = session.createQuery(hql).list(); 
		         tx.commit();
		      }catch (HibernateException e) {
		         if (tx!=null) tx.rollback();
		         e.printStackTrace(); 
		      }finally {
		         session.close(); 
		      }
		      return allCheckouts;
	}
	public List getNotCheckedOut() {
		List<User> notCheckedOut = new ArrayList<User>();
		try{
	         factory = new Configuration().configure().buildSessionFactory();
	      }catch (Throwable ex) { 
	         System.err.println("Failed to create sessionFactory object." + ex);
	         throw new ExceptionInInitializerError(ex); 
	      }
		      Session session = factory.openSession();
		      Transaction tx = null;
		      try{
		    	 String hql = "FROM User WHERE isCheckedOut = 0";
		         tx = session.beginTransaction();
		         notCheckedOut = session.createQuery(hql).list(); 
		         tx.commit();
		      }catch (HibernateException e) {
		         if (tx!=null) tx.rollback();
		         e.printStackTrace(); 
		      }finally {
		         session.close(); 
		      }
		      return notCheckedOut;
	}
	
	
	
	
}
