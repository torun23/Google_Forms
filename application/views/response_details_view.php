
             <div class="container">
    <div class="form-header">
        <h2><?php echo $form->title; ?></h2>
        <h4><?php echo $form->description; ?></h4>
    </div>
    <?php foreach ($questions as $question): ?>
        <div class="form-section">
            <div class="question-section">
                <input type="text" class="form-control question-label" value="<?php echo $question->question_text; ?>" disabled>
                <textarea class="form-control" disabled><?php echo $question->answered_text; ?></textarea>
            </div>
        </div>
    <?php endforeach; ?>
</div>
