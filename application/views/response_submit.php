<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Preview - Google Forms</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/flatly/bootstrap.min.css">
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
<div class="container">
    <div class="form-header">
        <h2><?php echo $form->title; ?></h2>
        <h4><?php echo $form->description; ?></h4>
    </div>
    <form action="<?php echo base_url('response_submit/submit_form'); ?>" method="post">
        <input type="hidden" name="form_id" value="<?php echo $form->id; ?>">
        <div class="form-section">
            <?php foreach ($questions as $question): ?>
                <div class="question-section">
                    <input type="hidden" name="responses[<?php echo $question->id; ?>][question_id]" value="<?php echo $question->id; ?>">
                    <input type="hidden" name="responses[<?php echo $question->id; ?>][form_id]" value="<?php echo $form->id; ?>">
                    <label><?php echo $question->text; ?></label>
                    <?php if ($question->type == 'multiple-choice'): ?>
                        <?php foreach ($question->options as $option): ?>
                            <div class="option">
                                <input type="radio" name="responses[<?php echo $question->id; ?>][options][]" value="<?php echo $option->option_text; ?>">
                                <label><?php echo $option->option_text; ?></label>
                            </div>
                        <?php endforeach; ?>
                    <?php elseif ($question->type == 'checkbox'): ?>
                        <?php foreach ($question->options as $option): ?>
                            <div class="option">
                                <input type="checkbox" name="responses[<?php echo $question->id; ?>][options][]" value="<?php echo $option->option_text; ?>">
                                <label><?php echo $option->option_text; ?></label>
                            </div>
                        <?php endforeach; ?>
                    <?php elseif ($question->type == 'short-answer'): ?>
                        <input type="text" class="form-control" name="responses[<?php echo $question->id; ?>][answered_text]" placeholder="Short answer text">
                    <?php elseif ($question->type == 'paragraph'): ?>
                        <textarea class="form-control" name="responses[<?php echo $question->id; ?>][answered_text]" placeholder="Paragraph text"></textarea>
                    <?php elseif ($question->type == 'dropdown'): ?>
                        <select class="form-control" name="responses[<?php echo $question->id; ?>][answered_text]">
                            <?php foreach ($question->options as $option): ?>
                                <option value="<?php echo $option->option_text; ?>"><?php echo $option->option_text; ?></option>
                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-success" style="margin-top: 20px; position: relative; left: 240px;">Submit</button>
    </form>
</div>
</body>
</html>
 