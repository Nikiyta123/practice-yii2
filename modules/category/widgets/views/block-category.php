<?php  if ($category['parent_id'] == 0): ?>

    <div class="col-md-4">

        <?= $category['name'] ?>

        <?php if (isset($category['childs'])): ?>

            <ul class="main-ul">
                <?= $this->getMenuHtml($category['childs']) ?>
            </ul>

        <?php endif; ?>

    </div>

<?php else: ?>

    <li><?= $category['name']; ?>

        <?php if (isset($category['childs'])): ?>

            <ul>
                <?= $this->getMenuHtml($category['childs']) ?>
            </ul>

        <?php endif; ?>

    </li>

<?php endif; ?>