package com.example.rest.greeting.controller;

import java.util.List;

import org.springframework.http.HttpStatus;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.server.ResponseStatusException;

import com.example.rest.greeting.entity.Posts;

import com.example.rest.greeting.service.PostsService;

@RestController
@RequestMapping("/posts")
public class PostsController {
	private final PostsService postService;
		
	public PostsController(PostsService postsService) {
		this.postService  = postsService;				
	}
	
	@GetMapping("/all")
	public List<Posts> getAll() {
		return postService.getPosts();
	}
//	@GetMapping("/get_userid/{userid}")
//	public List<Posts> getUserPosts(@PathVariable final Long userid){
//		return postService.getPosts(userid);
//	}
	
	@GetMapping("/get/{slug}")
	public Posts getPosts(@PathVariable final String slug) {
		return postService.getPost(slug);
	}
	
	@GetMapping("/get_bybody/{body}")
	public List<Posts>  getByBody(@PathVariable final String body){
		return postService.getPostWithBody(body);
		
	}
	@GetMapping("/title/{title}")
    public Posts getPostByTitle(@PathVariable final String title){
        return postService.getPostByTitle(title);
    }
	
	@PostMapping("/create")
	public Posts create(@RequestBody final Posts posts) {
		return postService.createPost(posts);
	}
	
	@DeleteMapping("/delete/{id}")
	public List<Posts> delete (@PathVariable final Long id){
		return postService.deletePost(id);
	}
	
	@PutMapping("/edit/{id}")
    public Posts edit(@RequestBody final Posts posts, @PathVariable final Long id){
    	return postService.editPost(posts, id);
    }
	
	@DeleteMapping("/delete_slug/{slug}")
	public void delete (@PathVariable final String slug ) {
		if (postService.deletePostBySlug(slug))
			throw new ResponseStatusException(HttpStatus.OK, "Post [=" + slug +"] succesfully removed ");
		else
			throw new ResponseStatusException(HttpStatus.NOT_FOUND, "Post [=" + slug +"] unsuccesfully removed ");
			
	}
	
	@DeleteMapping("/delete_title/{title}")
	public void delete_title (@PathVariable final String title ) {
		if(postService.deletePostByTitle(title))
			throw new ResponseStatusException(HttpStatus.OK, "Post [=" + title +"] succesfully removed ");
	}
	
}
