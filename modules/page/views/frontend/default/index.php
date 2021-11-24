<?php if (!isset($forms)): ?>
    <?= $this->render('@app/views/common/forms', [
        // 'forms' => $forms,
    ]) ?>
<?php endif; ?>

<?php if (!isset($category)): ?>
    <?= $this->render('@app/views/common/category', [
        //'category' => $category,
    ]) ?>
<?php endif; ?>