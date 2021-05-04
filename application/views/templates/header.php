<html>
    <head>
        <title>CI3 Sample</title>
        <link rel="stylesheet" href="https://getbootstrap.com/1.3.0/assets/css/bootstrap.min.css">
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