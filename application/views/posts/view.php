<h2><?=$title ?></h2>
<small><?= $posts['created_at'] ?></small>
<div class="post-body">
    <?= $posts['body'] ?>
</div>

<hr>

<?=form_open('/posts/delete/' .$posts['slug'], 'style="width:100px"') ?>
    <a href="<?=base_url()?>posts/edit/<?= $posts['slug']?>" class="btn btn-primary btn-block">edit</a>
    <input type="submit" value="delete" class="btn btn-danger btn-block">
</form>