<?php
/* @var $this SiteController */
/* @var $model BintangForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Csv';
$this->breadcrumbs=array(
	'Csv',
);
?>

<h1>Csv</h1>

<?php if(Yii::app()->user->hasFlash('csv')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('csv'); ?>
</div>

<?php else: ?>

<p>
import file .csv
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'csv-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<style type="text/css">
		#csv_file{
			margin-bottom:10px;
		}
	</style>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'csv'); ?>
		<?php echo $form->fileField($model,'csv',array('id'=>'csv_file')); ?>
		<?php echo $form->error($model,'csv'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>