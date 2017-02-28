<?php
/* @var $this PrevVoucherController */
/* @var $model PrevVoucher */

$this->breadcrumbs=array(
	'Prev Vouchers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PrevVoucher', 'url'=>array('index')),
	array('label'=>'Create PrevVoucher', 'url'=>array('create')),
	array('label'=>'Update PrevVoucher', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PrevVoucher', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PrevVoucher', 'url'=>array('admin')),
);
?>

<h1>View PrevVoucher #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'voucher_name',
		'image',
		'image_voucher',
		'coor_x',
		'coor_y',
		'font_color',
		'font_size',
		'font_style',
	),
)); ?>
