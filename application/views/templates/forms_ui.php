<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Form Clone</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui.css">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <button id="preview-btn" class="btn btn-info"><i class="fas fa-eye"></i></button>
            <h2>Untitled Form</h2>
            <button id="add-section-btn" class="btn btn-primary">+</button>
        </div>
        <div id="form-container"></div>
    </div>

    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
</body>
</html>
