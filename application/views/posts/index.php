<?php
    if (!$this->session->userdata('username')) redirect ('login', 'refresh');
?>
<h2><?= $title ?></h2>

<?php foreach($posts as $post) : ?>
    <h3><?=$post['title']?></h3>
    <small><?=$post['created_at']?></small>
    <p><?=$post['body']?></p>
    <a href="<?=site_url('/posts/view/')?><?=$post['slug']?>">Read more...</a>
<?php endforeach ?>