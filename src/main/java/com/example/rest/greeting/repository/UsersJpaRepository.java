package com.example.rest.greeting.repository;

import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
//import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Component;

//import com.example.rest.greeting.entity.Posts;
import com.example.rest.greeting.entity.Users;


@Component
public interface UsersJpaRepository extends  JpaRepository<Users, Long> {
	
	 @Query(value = "SELECT p.slug, p.title, p.body, p.created_at, u.name "
			 + "FROM Users u INNER JOIN Posts p ON u.id=p.userid", nativeQuery = true)
	 List<Object[]> getAllUserPosts();
	 
	 
	 @Query(value = "SELECT p.slug, p.title, p.body, p.created_at, u.name "
			 + "FROM Users u INNER JOIN Posts p ON u.id=p.userid "
			 + "WHERE u.id=:userid", nativeQuery = true)
	 List<Object[]> getAllUserPosts(@Param("userid")int userid);
	 
	 @Query(value = "SELECT * FROM Users u WHERE UPPER(u.name)=UPPER(?1)", nativeQuery = true)
		Optional<Users> getUserByNameIgnoreCase(String name);
	
	 Optional<Users>findByEmail(String email);
//	 List<Posts> findByUserid(Long userid);
}
