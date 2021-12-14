<?php var_dump($model);?>
<style>
    .wg-view-images{
        display: grid;
        grid-template-columns: repeat(9, 1fr);
        grid-gap: 0.5em;
        margin-top: 15px;
        border: 3px dotted rgba(0,0,0,.5);
        background: rgba(0,0,0,.15);
        padding: 10px;
    }
    .block-wg-view-images{
        width: 150px;
        height: 150px;
    }
    .block-wg-view-images .wg-input{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

</style>

<?php if (!empty($images)): ?>

    <div class="wg-view-images">

        <?php foreach ($images as $item): ?>

            <div class="block-wg-view-images">
                <input class="wg-input" id="<?=$item['id']?>" type="image" name="images[]" value="<?=$item['id']?>" src="<?=$item['path']?>">
            </div>

        <?php endforeach; ?>

    </div>

<?php else: ?>

    <span>Картинки не выбраны</span>

<?php endif; ?>

