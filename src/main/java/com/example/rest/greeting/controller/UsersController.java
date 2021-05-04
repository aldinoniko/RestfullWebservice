package com.example.rest.greeting.controller;

import java.util.List;

import com.example.rest.greeting.dto.UserPosts;
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
    
    @GetMapping("/get_users")
    public List<Users> getUsers() {
    	return usersService.getAll();
    }
    
    @GetMapping("/get_users/{name}")
    public Users getUser(@PathVariable final String name) {
    	return usersService.getUserByName(name);
    }

    @GetMapping("/get_user_posts")
    public List<UserPosts> getUserPosts() {
    	return usersService.getUserPosts();
    }

}
