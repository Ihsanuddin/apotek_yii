<?php
/* @var $this SiteController */
/* @var $model BintangForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Bintang';
$this->breadcrumbs=array(
	'Bintang',
);
?>

<h1>Bintang</h1>

<?php if(Yii::app()->user->hasFlash('bintang')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('bintang'); ?>
</div>

<?php else: ?>

<p>
isikan jumlah maksimal segitiga bintang yang akan dibuat
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'length'); ?>
		<?php echo $form->textField($model,'length'); ?>
		<?php echo $form->error($model,'length'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>