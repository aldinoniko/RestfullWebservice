<h2><?=$title ?></h2>

<?=validation_errors(); ?>
<?php
if(isset($posts)) {
    echo form_open('posts/edit/'.$posts['slug']);
    echo form_hidden('slug', $posts['slug']);
}
else {
    echo form_open('posts/create');
}

?>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Post Title" value="<?=isset($posts['title'])?$posts['title'] : ''; ?>">
    <div class="form-group">
        <label>Content</label>
        <textarea name="body" id="editor1" class="form-control" cols="30" rows="10" placeholder="Post Content"><?=isset($posts['body'])?$posts['body'] : ''; ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <a href="<?=base_url()?>posts" class="btn btn-primary">Cancel</a>
</form>
