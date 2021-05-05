<html>
    <head>
        <title>CI3 Sample</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css"> -->
    </head>
    <body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div id="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">CI3 Blog</a>
            </div>

            <div id="navbar">
                <ul class="nav navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>testapi">Posts</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>testapi">posts(API)</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>testapi/create">create(API</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div id="flash_messages" >
            <?php if($this->session->flashdata('success')) : ?><div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-success"><?=$this->session->flashdata('success'); ?></div><?php endif?>
            <?php if($this->session->flashdata('error'))   : ?><div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-danger"><?=$this->session->flashdata('error'); ?></div><?php endif?>
            <?php if($this->session->flashdata('warning')) : ?><div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-warning"><?=$this->session->flashdata('warning'); ?></div><?php endif?>
            <?php if($this->session->flashdata('info'))    : ?><div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-secondary"><?=$this->session->flashdata('info'); ?></div><?php endif?>
        </div>
