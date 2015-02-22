<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BlogPostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sl-blog-post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'blogPostId') ?>

    <?= $form->field($model, 'urlLink') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'shortText') ?>

    <?= $form->field($model, 'fullArticle') ?>

    <?php // echo $form->field($model, 'entryDate') ?>

    <?php // echo $form->field($model, 'isVisible') ?>

    <?php // echo $form->field($model, 'authorId') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
