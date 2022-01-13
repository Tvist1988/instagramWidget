<?php
/**
 * @var $feed InstagramScraper\Model\Media
 */


?>

<?php if ($feed): ?>
<?php foreach ($feed as $post): ?>

<?= \yii\helpers\Html::img(\app\src\InstagramWidget::getSrcImage($post->getImageThumbnailUrl()),
        ['style' => 'width: 150px;margin-right: 10px;margin-bottom: 10px;']) ?>

<?php endforeach; ?>
<?php else: ?>
<p>Аккаунт не найден или закрыт для публичного доступа. Попробуйте другой. </p>
<?php endif; ?>




