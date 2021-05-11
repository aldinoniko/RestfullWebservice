<?php
    if(!$this->session->userdata('username')) redirect('login','refresh');
?>
<h2><?= $title ?></h2>

<?php foreach($posts as $post) : ?>
    <h3><?=$post->[1]?></h3>
    <small><?=$post->[3]?></small>
    <p><?=$post->[2]]?></p>
    <p><em>Created by: <?= $post[4]?></emp></p>
    <a href="<?=site_url('/testapi/')?><?=$post->[0]?>">Read more...</a>
<?php endforeach ?>