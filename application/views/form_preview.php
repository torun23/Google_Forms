<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Preview - Google Forms</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/header_styles.css">
    <style>
        body { background-color: rgb(240, 235, 248); }
        .container { margin-top: 30px; }
        .form-section { background-color: white; width: 56%; margin-bottom: 30px; margin-left: 240px; padding: 20px; position: relative; align-items: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .form-header { background-color: white; padding: 20px; margin-bottom: 10px; margin-left: 240px; border-radius: 10px 10px 0 0; display:flex ;flex-direction: column; justify-content: space-between; align-items: left; position: relative; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-top: 10px solid rgb(103, 58, 183); width: 56%; }
        .form-section h2 { text-align: center; margin-bottom: 30px; }
        .form-section .question-section { margin-bottom: 20px; }
    </style>
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
                <li><a href="<?php echo base_url(); ?>home/index3">Home</a></li>
                <li><a href="<?php echo base_url(); ?>home/index1">About</a></li>
                <?php if ($this->session->userdata('logged_in')): ?>
                    <li><a href="#">Responses</a></li>
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

<div class="container">
    <div class="form-header">
        <h2><?php echo $form->title; ?></h2>

        <h4><?php echo $form->description; ?></h4>

    </div>
    <div class="form-section">
        <?php foreach ($questions as $question): ?>
            <div class="question-section">
                <input type="text" class="form-control question-label" value="<?php echo $question->text; ?>" disabled>
                <?php if ($question->type == 'multiple-choice'): ?>
                    <?php foreach ($question->options as $option): ?>
                        <div class="option">
                            <input type="radio" name="option-<?php echo $question->id; ?>">
                            <label><?php echo $option->option_text; ?></label>
                        </div>
                    <?php endforeach; ?>
                <?php elseif ($question->type == 'checkbox'): ?>
                    <?php foreach ($question->options as $option): ?>
                        <div class="option">
                            <input type="checkbox" name="option-<?php echo $question->id; ?>">
                            <label><?php echo $option->option_text; ?></label>
                        </div>
                    <?php endforeach; ?>
                <?php elseif ($question->type == 'short-answer'): ?>
                    <input type="text" class="form-control" placeholder="Short answer text">
                <?php elseif ($question->type == 'paragraph'): ?>
                    <textarea class="form-control" placeholder="Paragraph text"></textarea>
                <?php elseif ($question->type == 'dropdown'): ?>
                    <select class="form-control">
                        <?php foreach ($question->options as $option): ?>
                            <option><?php echo $option->option_text; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="<?php echo base_url('Publish_controller/publish_form/' . $form->id); ?>" class="btn btn-success" style="margin-top: 20px; position: relative; left: 240px;">Publish</a>

</div>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1');
</script>

</body>
</html>
