<?php
/* @var $this PrevVoucherController */
/* @var $data PrevVoucher */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voucher_name')); ?>:</b>
	<?php echo CHtml::encode($data->voucher_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_voucher')); ?>:</b>
	<?php echo CHtml::encode($data->image_voucher); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coor_x')); ?>:</b>
	<?php echo CHtml::encode($data->coor_x); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coor_y')); ?>:</b>
	<?php echo CHtml::encode($data->coor_y); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('font_color')); ?>:</b>
	<?php echo CHtml::encode($data->font_color); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('font_size')); ?>:</b>
	<?php echo CHtml::encode($data->font_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('font_style')); ?>:</b>
	<?php echo CHtml::encode($data->font_style); ?>
	<br />

	*/ ?>

</div>