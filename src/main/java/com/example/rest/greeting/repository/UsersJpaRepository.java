package com.example.rest.greeting.repository;

import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
//import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Component;

import com.example.rest.greeting.dto.UserPosts;
import com.example.rest.greeting.entity.Users;


@Component
public interface UsersJpaRepository extends  JpaRepository<Users, Long> {
	
	 @Query(value = "SELECT new com.example.rest.greeting.dto.UserPosts (p.body, p.created, p.slug, p.title, u.name) FROM Users u JOIN u.Posts p"
	            , nativeQuery = true)
	    List<UserPosts> getAllUserPosts();
//	 @Query(value = "SELECT p.slug, p.title, p.body, p.created_at, u.name "
//			 + "FROM Users u INNER JOIN Posts p ON u.id=p.user "
//			 + "WHERE u.id=:userid", nativeQuery = true)
//	 List<Object[]> getAllUserPosts(@Param("userid")int usersid);
//	 
	 @Query(value = "SELECT * FROM Users u WHERE UPPER(u.name)=UPPER(?1)", nativeQuery = true)
		Optional<Users> getUserByNameIgnoreCase(String name);
	
	 Optional<Users>findByEmail(String email);
}
