package com.model;

import java.util.List;

public class DisplayRoomWithCity {
	int roomNumber;
	int roomCapacity;
	int numberOfPeopleStaying;
	List cityArray;
	
	public int getRoomNumber() {
		return roomNumber;
	}
	public void setRoomNumber(int roomNumber) {
		this.roomNumber = roomNumber;
	}
	public int getRoomCapacity() {
		return roomCapacity;
	}
	public void setRoomCapacity(int roomCapacity) {
		this.roomCapacity = roomCapacity;
	}
	public int getNumberOfPeopleStaying() {
		return numberOfPeopleStaying;
	}
	public void setNumberOfPeopleStaying(int numberOfPeopleStaying) {
		this.numberOfPeopleStaying = numberOfPeopleStaying;
	}
	public List getCityArray() {
		return cityArray;
	}
	public void setCityArray(List cityArray) {
		this.cityArray = cityArray;
	}
}
