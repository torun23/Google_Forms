<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Preview - Google Forms</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header_styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css">
    
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color: rgb(103, 58, 183);">
    <div class="container" style="background-color: rgb(103, 58, 183);">
        <?php if ($this->session->userdata('logged_in')): ?>
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url(); ?>Form_controller/index_forms">Google Forms</a>
            </div>
        <?php endif; ?>

        <div id="navbar">
            <ul class="nav navbar-nav">
                <?php if ($this->session->userdata('logged_in')): ?>
                    <li><a href="<?php echo base_url(); ?>Publish_controller/list_user_published_forms">Published Forms</a></li>
                <?php endif; ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!$this->session->userdata('logged_in')): ?>
                    <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
                    <li><a href="<?php echo base_url(); ?>users/register">Register</a></li>
                <?php endif; ?>
                <?php if ($this->session->userdata('logged_in')): ?>
                    <li><a href="<?php echo base_url(); ?>home/title">Create Form</a></li>
                    <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <?php if ($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
    <?php endif; ?>
</div>