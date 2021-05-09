<html>
    <head>
        <title>CI3 Sample</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <!-- // Bootstrap // -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>about">About</a></li>

                    <?php if($this->session->userdata('username')): ?>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>testapi">Posts (API)</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>testapi/create">Create</a></li>
                <li class="nav-item"><a class="btn btn-danger" type="button" href="<?= base_url(); ?>logout">Logout</a></li>
                     <?php else: ?>
                <li class="nav-item"><a class="btn btn-secondary" type="button" href="<?= base_url(); ?>login">Login</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div id="flash_messages" >
            <?php if($this->session->flashdata('success')) : ?>
                <div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$this->session->flashdata('success'); ?>
                </div>
            <?php endif?>
            <?php if($this->session->flashdata('error'))   : ?>
                <div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$this->session->flashdata('error'); ?>
                </div>
            <?php endif?>
            <?php if($this->session->flashdata('warning')) : ?>
                <div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$this->session->flashdata('warning'); ?>
                </div>
            <?php endif?>
            <?php if($this->session->flashdata('info'))    : ?>
                <div style="margin: 1em; padding: 1em;" class="alert alert-dismissible alert-secondary">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?=$this->session->flashdata('info'); ?>
                </div>
            <?php endif?>
        </div>

        <?php if(!empty(validation_errors())) : ?>
        <div style="margin: 1em; padding: 1em;" id="validation_message" class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?=validation_errors(); ?>
        </div>
        <?php endif ?>
