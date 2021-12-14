<?php  if ($category['parent_id'] == 0): ?>

    <div class="col-md-12" id="<?= $category['id'] ?>">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">

                <span class="box-title-custom"><i class="far fa-expand-arrows-alt fa-lg"></i><span> <?= $category['name'] ?></span></span>

                <div class="box-tools pull-right lc-crud-icons">
                    <?= \yii\helpers\Html::tag('a', '<i class="fa fa-pencil"></i>', [
                        'href' => \yii\helpers\Url::to(['update', 'id' => $category['id']])
                    ]) ?>

                    <?= \yii\helpers\Html::tag('a', '<i class="fa fa-trash"></i>', [
                        'title' => 'Удалить',
                        'href' => \yii\helpers\Url::to(['delete', 'id' => $category['id']]),
                        'aria-label' => 'Удалить',
                        'data-pjax' => '0',
                        'data-confirm' => 'Удалить категорию - "'. $category['name'] .'"? Все ее дочернии категории будут удалены',
                        'data-method' => 'post',
                    ]) ?>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body" id="number-<?= $category['number'] ?>">

                <?php if (isset($category['childs'])): ?>

                    <ul class="main-ul">
                        <?= $this->getMenuHtml($category['childs']) ?>
                    </ul>

                <?php endif; ?>


            </div>
        </div>
    </div>

<?php else: ?>

    <li class="lc-li" id="<?=$category['id']?>" data-pos="#">
        <div class="lc-title">
            <div class="lc-right-icons">
                <?php echo "<i class='icons-category ".($category['folder'] == 1 ? 'fas fa-folder-open fa-lg' : 'fal fa-circle fa-lg')."'></i>".$category['name']; ?>
            </div>
            <div class="lc-crud-icons">
                <?= \yii\helpers\Html::tag('a', '<i class="fa fa-pencil"></i>', [
                        'href' => \yii\helpers\Url::to(['update', 'id' => $category['id']])
                ]) ?>

                <?= \yii\helpers\Html::tag('a', '<i class="fa fa-trash"></i>', [
                    'title' => 'Удалить',
                    'href' => \yii\helpers\Url::to(['delete', 'id' => $category['id']]),
                    'aria-label' => 'Удалить',
                    'data-pjax' => '0',
                    'data-confirm' => 'Удалить категорию - "'. $category['name'] .'"? Все ее дочернии категории будут удалены',
                    'data-method' => 'post',
                ]) ?>
            </div>
        </div>

        <?php if (isset($category['childs'])): ?>

            <ul>
                <?= $this->getMenuHtml($category['childs']) ?>
            </ul>

        <?php endif; ?>

    </li>

<?php endif; ?>

