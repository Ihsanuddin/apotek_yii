<?php
/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idmember'); ?>
		<?php echo $form->textField($model,'idmember'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'namaMember'); ?>
		<?php echo $form->textField($model,'namaMember',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamatMember'); ?>
		<?php echo $form->textField($model,'alamatMember',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tglLahirMember'); ?>
		<?php echo $form->textField($model,'tglLahirMember'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'emailMember'); ?>
		<?php echo $form->textField($model,'emailMember',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'noTelponMember'); ?>
		<?php echo $form->textField($model,'noTelponMember',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->