<h2><?=$title ?></h2>
<?=validation_errors(); ?>
<?php
if(isset($posts)) { var_dump($posts);
    echo form_open('testapi/edit/'.$posts->slug);   //, 'method="put"'

    echo form_hidden('id', $posts->id);
    echo form_hidden('slug', $posts->slug);
    echo form_hidden('created_at', $posts->created_at);
}
else {
    echo form_open('testapi/create');
}
?>
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Post Title" value="<?= (isset($posts))?$posts->title:''; ?>">
    </div>
    <div class="form-group">
        <label>Content</label>
        <textarea name="body" id="editor1" class="form-control" cols="30" rows="10" placeholder="Post Content"><?= (isset($posts))?$posts->body:''; ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <a href="<?=base_url()?>testapi" class="btn btn-primary">Cancel</a>
<?=form_close();?>