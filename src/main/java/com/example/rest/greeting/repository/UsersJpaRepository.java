package com.example.rest.greeting.repository;

import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import org.springframework.stereotype.Component;

import com.example.rest.greeting.dto.UserPosts;
import com.example.rest.greeting.entity.Users;


@Component
public interface UsersJpaRepository extends  JpaRepository<Users, Long> {
	
	 @Query(value = "SELECT new com.example.rest.greeting.dto.UserPosts (p.body, p.created, p.slug, p.title, u.name) FROM Users u JOIN u.Posts p"
	            , nativeQuery = true)
	    List<UserPosts> getAllUserPosts();
	 
	 @Query(value = "SELECT * FROM Users u WHERE UPPER(u.name)=UPPER(?1)", nativeQuery = true)
		Optional<Users> getUserByNameIgnoreCase(String name);
	
}
