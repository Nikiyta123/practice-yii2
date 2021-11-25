<?php if (!isset($category)): ?>
    <?= $this->render('@app/views/common/category', [
        //'category' => $category,
    ]) ?>
<?php endif; ?>