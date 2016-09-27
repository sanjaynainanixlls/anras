package com.model;

public class Rooms {

	private int id;
	private int roomNumber;
	private int capacity;
	private int numberOfPeopleStaying;
	private String cityString;
	private String type;
	public String getCityString() {
		return cityString.toUpperCase();
	}
	public void setCityString(String cityString) {
		this.cityString = cityString.toUpperCase();
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public int getRoomNumber() {
		return roomNumber;
	}
	public void setRoomNumber(int roomNumber) {
		this.roomNumber = roomNumber;
	}
	public void setCapacity(int capacity) {
		this.capacity = capacity;
	}
	public int getNumberOfPeopleStaying() {
		return numberOfPeopleStaying;
	}
	public void setNumberOfPeopleStaying(int numberOfPeopleStaying) {
		this.numberOfPeopleStaying = numberOfPeopleStaying;
	}
	public int getCapacity() {
		return capacity;
	}
	
	public Rooms(int id, int roomNumber, int capacity, int numberOfPeopleStaying, String cityString, String type) {
		super();
		this.id = id;
		this.roomNumber = roomNumber;
		this.capacity = capacity;
		this.numberOfPeopleStaying = numberOfPeopleStaying;
		this.cityString = cityString;
		this.type= type;
	}
	public Rooms() {
		super();
	}
	public String getType() {
		return type;
	}
	public void setType(String type) {
		this.type = type;
	}
	
}
