package com.example.rest.greeting.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.domain.Sort;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Service;
import org.springframework.web.server.ResponseStatusException;

import com.example.rest.greeting.entity.Posts;
import com.example.rest.greeting.repository.PostsJpaRepository;

@Service
public class PostsService {
	@Autowired
	private PostsJpaRepository postsJpaRepository;
		
	public List<Posts> getPosts(){	
		//SELECT * FROM posts
//		return postsJpaRepository.findAll();
		return postsJpaRepository.findAll(Sort.by("created").descending());
	}
	public List<Posts> getPosts(Long userid){	
		//SELECT * FROM posts
//		return postsJpaRepository.findAll();
		return postsJpaRepository.findByUserid(userid);
	}

	public Posts getPost(String slug) {
		//SELECT * FROM posts WHERE slug;
		return postsJpaRepository.findBySlug(slug).get();
	}
	public Posts getPostByTitle(String title) {
		if (postsJpaRepository.findByTitle(title).isPresent()) {
			return postsJpaRepository.findByTitle(title).get();
		}
		else {
			throw new ResponseStatusException(
				HttpStatus.NOT_FOUND, "Post [title=" + title + "] is not found!");
		}				
	}
	public Posts createPost(Posts posts) {
		//INSERT INTO posts Values (<posts.slug>, <posts.title>, <posts.body>)
		Optional<Posts> postOptional  = postsJpaRepository.findByTitle(posts.getTitle());
		
		if (postOptional.isPresent()) {
			throw new IllegalStateException("Same Title Avaliable");
		}
		else {
			postsJpaRepository.save(posts);
			return postsJpaRepository.findBySlug(posts.getSlug()).get();
		}
		
	}
	
	public List<Posts> deletePost(Long id){
		postsJpaRepository.deleteById(id);
		return postsJpaRepository.findAll();
	}
	
	public boolean deletePostBySlug(String slug) {
		if (postsJpaRepository.findBySlug(slug).isPresent()) {
			Posts postsBySlug = postsJpaRepository.findBySlug(slug).get();
			
			postsJpaRepository.deleteById(postsBySlug.getId());
			
			return true;
		}
		else {
			return false;
		}
	}
		
	public boolean deletePostByTitle(String title) {
		postsJpaRepository.deleteByTitle(title);
		
		return true;	
	}
	
	public List<Posts> getPostWithBody(String body){
		return postsJpaRepository.findAllByBodyContainsIgnoreCase(body);
	}
		
	public Posts editPost(Posts posts, Long id) {
		Optional<Posts> postOptional = postsJpaRepository.findById(id);
		
		if (postOptional.isPresent()) {
			postsJpaRepository.save(posts);
			// return postOptional.get();
			throw new ResponseStatusException(
				HttpStatus.OK, "Sukses"
			);
		}
		else {
			throw new ResponseStatusException(
				HttpStatus.NOT_FOUND, "Post [id=" + posts.getId() + "] is not found!");
		}
		

	}
	
}


	
	

