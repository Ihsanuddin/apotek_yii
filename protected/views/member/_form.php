<?php
/* @var $this MemberController */
/* @var $model Member */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'member-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'namaMember'); ?>
		<?php echo $form->textField($model,'namaMember',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'namaMember'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamatMember'); ?>
		<?php echo $form->textField($model,'alamatMember',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'alamatMember'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tglLahirMember'); ?>
		<?php echo $form->textField($model,'tglLahirMember'); ?>
		<?php echo $form->error($model,'tglLahirMember'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'emailMember'); ?>
		<?php echo $form->textField($model,'emailMember',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'emailMember'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'noTelponMember'); ?>
		<?php echo $form->textField($model,'noTelponMember',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'noTelponMember'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->