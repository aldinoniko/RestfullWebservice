package com.example.rest.greeting.controller;

import java.util.List;

//import com.example.rest.greeting.entity.Posts;
import com.example.rest.greeting.entity.Users;
import com.example.rest.greeting.service.UsersService;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

@RestController
@RequestMapping("/users")
public class UsersController {
	
    private final UsersService usersService;

    public UsersController(UsersService usersService) {
        this.usersService = usersService;
    }
    
    @GetMapping("/get")
    public List<Users> getUsers() {
    	return usersService.getAll();
    }
    
    @GetMapping("/get/{name}")
    public Users getUser(@PathVariable final String name) {
    	return usersService.getUserByName(name);
    }
    
    @GetMapping("/get_by_email/{email}")
    public Users getUserByEmail(@PathVariable final String email) {
    	return usersService.getUserByEmail(email);
    }
    
    @GetMapping("/get_posts")
    public List<Object[]> getUserPosts() {
    	return usersService.getUserPosts();
    }
    @GetMapping("/get_userid/{userid}")
	public List<Object[]> getUserPosts(@PathVariable final int userid){
		return usersService.getUserPosts(userid);
	}
}
