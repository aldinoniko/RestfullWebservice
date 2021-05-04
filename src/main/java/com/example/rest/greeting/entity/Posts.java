package com.example.rest.greeting.entity;

import java.sql.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.SequenceGenerator;
import javax.persistence.Table;

import org.hibernate.annotations.CreationTimestamp;

@Entity
@Table(name="posts")
public class Posts {
	@Id
	@SequenceGenerator(name="POSTS_SEQ", allocationSize=1)
	@GeneratedValue(generator="POSTS_SEQ", strategy=GenerationType.SEQUENCE)
	private Long id;
	private String slug;
	private String title;
	private String body;
	@CreationTimestamp
	
	@Column(name="created_at")
	private Date created;
	

	
	public Long getId() {
		return id;
	}
	public void setId(Long id) {
		this.id = id;
	}
	public String getSlug() {
		return slug;
	}
	public void setSlug(String slug) {
		this.slug = slug;
	}
	public String getTitle() {
		return title;
	}
	public void setTitle(String title) {
		this.title = title;
	}
	public String getBody() {
		return body;
	}
	public void setBody(String body) {
		this.body = body;
	}
	public Date getCreated_at() {
		return this.created;
	}
	public void setCreated_at(Date created_at) {
		this.created = created_at;
	}

	
}
