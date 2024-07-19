<div class="container">
    <div class="form-header">
        <h2><?php echo $form->title; ?></h2>
        <h4><?php echo $form->description; ?></h4>
    </div>

    <?php foreach ($questions as $question): ?>
        <div class="form-section">
            <div class="question-section">
                <input type="text" class="form-control question-label" value="<?php echo $question->text; ?>" disabled>
            </div>

            <?php if ($question->type == 'multiple-choice'): ?>
                <div class="options-container">
                    <?php foreach ($question->options as $option): ?>
                        <div class="option">
                            <input type="radio" name="option-<?php echo $question->id; ?>" disabled>
                            <label><?php echo $option->option_text; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php elseif ($question->type == 'checkbox'): ?>
                <div class="options-container">
                    <?php foreach ($question->options as $option): ?>
                        <div class="option">
                            <input type="checkbox" name="option-<?php echo $question->id; ?>" disabled>
                            <label><?php echo $option->option_text; ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php elseif ($question->type == 'short-answer'): ?>
                <div class="options-container">
                    <input type="text" class="form-control" placeholder="Short answer text" disabled>
                </div>
            <?php elseif ($question->type == 'paragraph'): ?>
                <div class="options-container">
                    <textarea class="form-control" placeholder="Paragraph text" disabled></textarea>
                </div>
            <?php elseif ($question->type == 'dropdown'): ?>
                <div class="options-container">
                    <select class="form-control" disabled>
                        <?php foreach ($question->options as $option): ?>
                            <option><?php echo $option->option_text; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <a href="<?php echo base_url('Publish_controller/publish_form/'.$form->id); ?>" class="btn btn-success" style="margin-top: 20px; position: relative; left: 240px;">Publish</a>
</div>
                            