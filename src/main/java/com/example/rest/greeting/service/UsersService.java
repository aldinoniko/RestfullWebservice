package com.example.rest.greeting.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Service;
import org.springframework.web.server.ResponseStatusException;

import com.example.rest.greeting.dto.UserPosts;
import com.example.rest.greeting.entity.Users;
import com.example.rest.greeting.repository.UsersJpaRepository;


@Service
public class UsersService {
	@Autowired
	private UsersJpaRepository userRepository;

	public List<Users> getAll(){
		return userRepository.findAll();
	}

	public Users getUserByName(String name) {		
		return userRepository.getUserByNameIgnoreCase(name).orElseThrow(() -> new ResponseStatusException(
			HttpStatus.NOT_FOUND, "User [name=" + name + "] is not found!"));
	}

	public Users getUserByEmail(String email) {		
		return userRepository.findByEmail(email).orElseThrow(() -> new ResponseStatusException(
			HttpStatus.NOT_FOUND, "User by email [email=" + email + "] is not found!"));
	}
	public List<UserPosts> getUserPosts() {
		if (!userRepository.getAllUserPosts().isEmpty()) {
			return userRepository.getAllUserPosts();
		}
		else 
			throw new ResponseStatusException(HttpStatus.NOT_FOUND, "No User post was found!");
	}

}
