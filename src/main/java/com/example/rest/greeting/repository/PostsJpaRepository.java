package com.example.rest.greeting.repository;

import java.util.List;
import java.util.Optional;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Component;
import org.springframework.transaction.annotation.Transactional;

import com.example.rest.greeting.entity.Posts;

@Component
public interface PostsJpaRepository extends JpaRepository<Posts, Long>{

	Optional<Posts> findBySlug(String slug);
	  
	Optional<Posts> findByTitle(String title);
	List<Posts> findByUserid(Long userid);
	
	@Transactional
	void deleteByTitle(String title);
	
	List<Posts> findAllByBodyContainsIgnoreCase(String body);
}
