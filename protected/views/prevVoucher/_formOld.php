<?php
/* @var $this PrevVoucherController */
/* @var $model PrevVoucher */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prev-voucher-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!-- <div class="row">
		<?php //echo $form->labelEx($model,'id'); ?>
		<?php //echo $form->textField($model,'id'); ?>
		<?php //echo $form->error($model,'id'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'voucher_name'); ?>
		<?php echo $form->textField($model,'voucher_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'voucher_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model,'image',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<!-- <div class="row">
		<?php //echo $form->labelEx($model,'image_voucher'); ?>
		<?php //echo $form->textField($model,'image_voucher',array('size'=>60,'maxlength'=>256)); ?>
		<?php //echo $form->error($model,'image_voucher'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'coor_x'); ?>
		<?php echo $form->textField($model,'coor_x'); ?>
		<?php echo $form->error($model,'coor_x'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coor_y'); ?>
		<?php echo $form->textField($model,'coor_y'); ?>
		<?php echo $form->error($model,'coor_y'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'font_color'); ?>
		<?php $color = array('black'=>'black','white'=>'white'); ?>
		<?php //echo $form->textField($model,'font_color',array('id'=>'color')); ?>
		<?php $this->widget('ext.select2.ESelect2', array(
						    'model' => $model,
						    'attribute' => 'font_color',
						    'data' => $color,
						    'options'=>array(
						    	//'tags'=>true,
						    	//'tokenSeparators'=>[',', ' '],
						    ),
						    'htmlOptions'=>array(
						    	'placeholder'=>'select color',
							    //'multiple'=>'multiple',
							    //'disabled'=>true,
							    // 'readonly'=>true
							  ),
						)); ?>
		<?php echo $form->error($model,'font_color'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'font_size'); ?>
		<?php echo $form->textField($model,'font_size'); ?>
		<?php echo $form->error($model,'font_size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'font_style'); ?>
		<?php $style = array('DirteeBox'=>'DirteeBox','LemonMilk'=>'LemonMilk','noodle_oblique'=>'noodle_oblique','noodle_titling'=>'noodle_titling','varsity_regular'=>'varsity_regular'); ?>
		<?php //echo $form->textField($model,'font_style',array('size'=>60,'maxlength'=>128)); ?>
		<?php $this->widget('ext.select2.ESelect2', array(
						    'model' => $model,
						    'attribute' => 'font_style',
						    'data' => $style,
						    'options'=>array(
						    	//'tags'=>true,
						    	//'tokenSeparators'=>[',', ' '],
						    ),
						    'htmlOptions'=>array(
						    	'placeholder'=>'select style',
							    //'multiple'=>'multiple',
							    //'disabled'=>true,
							    // 'readonly'=>true
							  ),
						)); ?>
		<?php echo $form->error($model,'font_style'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->