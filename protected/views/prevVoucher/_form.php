<?php
/* @var $this GroupAuthController */
/* @var $model GroupAuth */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prev-voucher-form',
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

	<?php echo $form->errorSummary($model); ?>

<div class="eightcol">
		<div class="main-form">
			<table class="clear-table-form">
		        <tbody>
		        	<tr>
		        		<td colspan="2"><p class="note">Fields with <span class="required">*</span> are required.</p></td>
		        	</tr>
		        	<tr>
		        		<td><?php echo $form->labelEx($model,'voucher_name'); ?></td>
		        		<td>
							<?php echo $form->textField($model,'voucher_name',array('size'=>60,'maxlength'=>256)); ?>
							<?php echo $form->error($model,'voucher_name'); ?></td>
		        	</tr>
		        	<tr>
		        		<td><?php echo $form->labelEx($model,'image'); ?></td>
		        		<td><?php echo $form->fileField($model,'image',array('size'=>60,'maxlength'=>256)); ?>
		        			<?php echo $form->error($model,'image'); ?>
		        		</td>
		        	</tr>
		        	<tr>
		        		<td><?php echo $form->labelEx($model,'coor_x'); ?></td>
		        		<td>
		        			<?php echo $form->textField($model,'coor_x'); ?>
							<?php echo $form->error($model,'coor_x'); ?>
		        		</td>
		        	</tr>
		        	<tr>
		        		<td><?php echo $form->labelEx($model,'coor_y'); ?></td>
		        		<td>
		        			<?php echo $form->textField($model,'coor_y'); ?>
							<?php echo $form->error($model,'coor_y'); ?>
		        		</td>
		        	</tr>
		        	<tr>
		        		<td><?php echo $form->labelEx($model,'font_color'); ?></td>
		        		<?php $color = array('black'=>'black','white'=>'white'); ?>
		        		
		        		<td><?php $this->widget('ext.select2.ESelect2', array(
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
									    // 'disabled'=>true,
									    // 'readonly'=>true
									  ),
								)); ?>
				            <?php echo $form->error($model,'font_color'); ?></td>
		        	</tr>
		        	<tr>
		        		<td><?php echo $form->labelEx($model,'font_size'); ?></td>
		        		<td>
		        			<?php echo $form->textField($model,'font_size'); ?>
							<?php echo $form->error($model,'font_size'); ?>
		        		</td>
		        	</tr>
		        	<tr>
		        		<td><?php echo $form->labelEx($model,'font_style'); ?></td>
		        		<?php $style = array('DirteeBox'=>'DirteeBox','LemonMilk'=>'LemonMilk','noodle_oblique'=>'noodle_oblique','noodle_titling'=>'noodle_titling','varsity_regular'=>'varsity_regular'); ?>
		        		<td>
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
		        		</td>
		        	</tr>
		        	<tr>
		        		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Preview' : 'Preview'); ?></td>
		        		<td></td>
		        		<td></td>
		        	</tr>
		        </tbody>
		    </table>
		</div>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->

<div>
	<?php if (!$model->isNewRecord) { ?>
		
	<!-- <div class="row">
	<p>image source</p>
	</div>
	<div>
		<img src="<?php echo Yii::app()->baseUrl . '/images/voucher/' . $model->image; ?>">
	</div> -->

	<div class="row">
	<p>image voucher preview</p>
	</div>
	<div>
		<img src="<?php echo Yii::app()->baseUrl . '/images/voucherPrev/' . $model->image_voucher; ?>">
	</div>

	<?php } ?> 
</div>