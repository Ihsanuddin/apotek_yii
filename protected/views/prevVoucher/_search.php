<?php
/* @var $this PrevVoucherController */
/* @var $model PrevVoucher */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'voucher_name'); ?>
		<?php echo $form->textField($model,'voucher_name',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image_voucher'); ?>
		<?php echo $form->textField($model,'image_voucher',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coor_x'); ?>
		<?php echo $form->textField($model,'coor_x'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coor_y'); ?>
		<?php echo $form->textField($model,'coor_y'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'font_color'); ?>
		<?php echo $form->textField($model,'font_color'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'font_size'); ?>
		<?php echo $form->textField($model,'font_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'font_style'); ?>
		<?php echo $form->textField($model,'font_style',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->