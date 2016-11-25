<?php
/* @var $this MemberController */
/* @var $data Member */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmember')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idmember), array('view', 'id'=>$data->idmember)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('namaMember')); ?>:</b>
	<?php echo CHtml::encode($data->namaMember); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamatMember')); ?>:</b>
	<?php echo CHtml::encode($data->alamatMember); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tglLahirMember')); ?>:</b>
	<?php echo CHtml::encode($data->tglLahirMember); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emailMember')); ?>:</b>
	<?php echo CHtml::encode($data->emailMember); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('noTelponMember')); ?>:</b>
	<?php echo CHtml::encode($data->noTelponMember); ?>
	<br />


</div>