<?php
/**
 * /* @var $this yii\web\View
 * @var $model \app\models\InstagramSettings
 */


use yii\helpers\Html;

$js = "$(document).on('pjax:send', function() {
  $('.loader').show().text('Загружается...')
})
$(document).on('pjax:complete', function() {
  $('.loader').hide()
})";
$this->registerJs($js);

?>
<div class="site-index">
    <?php \yii\widgets\Pjax::begin() ?>
    <?php $form = \yii\widgets\ActiveForm::begin([
        'id' => 'instagramSettings',
        'method' => 'post',

        'options' => ['class' => 'form-horizontal',
            'data-pjax' => 1]
    ]) ?>

    <?= $form->field($model, 'user')->textInput() ?>

    <?= $form->field($model, 'count_posts')->dropDownList(['5' => '5', '10' => '10', '15' => '15']) ?>

    <?= Html::submitButton(Yii::t('app', 'Обновить виджет'), ['class' => 'btn btn-primary']) ?>

    <?php \yii\widgets\ActiveForm::end() ?>

    <div class="loader"></div>

    <h2>Виджет инстаграм</h2>

    <?= \app\src\InstagramWidget::widget() ?>

    <?php \yii\widgets\Pjax::end() ?>
</div>
