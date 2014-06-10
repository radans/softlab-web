<?php
/* @var $this TeamsController */
/* @var $model Teams */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'teams-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entryDate'); ?>
		<?php echo $form->textField($model,'entryDate',array('size'=>21,'maxlength'=>21)); ?>
		<?php echo $form->error($model,'entryDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdByUserFid'); ?>
		<?php echo $form->textField($model,'createdByUserFid'); ?>
		<?php echo $form->error($model,'createdByUserFid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teamLeaderId'); ?>
		<?php echo $form->textField($model,'teamLeaderId'); ?>
		<?php echo $form->error($model,'teamLeaderId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teamImageId'); ?>
		<?php echo $form->textField($model,'teamImageId'); ?>
		<?php echo $form->error($model,'teamImageId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->