package com.model;

public class User {
	private int id;
	private String name;
	private String phoneNumber;
	private String city;
	private int numberOfPeople;
	private String comingDate;
	private String returnDate;
	private int roomAlloted;
	private int isCheckedOut;
	
	public int getIsCheckedOut() {
		return isCheckedOut;
	}
	public void setIsCheckedOut(int isCheckedOut) {
		this.isCheckedOut = isCheckedOut;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public String getName() {
		return name.toUpperCase();
	}
	public void setName(String name) {
		this.name = name.toUpperCase();
	}
	public String getPhoneNumber() {
		return phoneNumber;
	}
	public void setPhoneNumber(String phoneNumber) {
		this.phoneNumber = phoneNumber;
	}
	public String getCity() {
		return city.toUpperCase();
	}
	public void setCity(String city) {
		this.city = city.toUpperCase();
	}
	public int getNumberOfPeople() {
		return numberOfPeople;
	}
	public void setNumberOfPeople(int numberOfPeople) {
		this.numberOfPeople = numberOfPeople;
	}
	public String getComingDate() {
		return comingDate.toUpperCase();
	}
	public void setComingDate(String comingDate) {
		this.comingDate = comingDate.toUpperCase();
	}
	public String getReturnDate() {
		return returnDate.toUpperCase();
	}
	public void setReturnDate(String returnDate) {
		this.returnDate = returnDate.toUpperCase();
	}
	
	public int getRoomAlloted() {
		return roomAlloted;
	}
	public void setRoomAlloted(int roomAlloted) {
		this.roomAlloted = roomAlloted;
	}
	public User(String name, String phoneNumber, String city,
			int numberOfPeople, String comingDate,
			String returnDate, int roomAllotted, int isCheckedOut) {
		super();
		this.name = name;
		this.phoneNumber = phoneNumber;
		this.city = city;
		this.numberOfPeople = numberOfPeople;
		this.comingDate = comingDate;
		this.returnDate = returnDate;
		this.roomAlloted = roomAllotted;
		this.isCheckedOut = isCheckedOut;
	}
	public User() {
		super();
	}
	
	
	
}
