<?php
/* @var $this PrevVoucherController */
/* @var $model PrevVoucher */

$this->breadcrumbs=array(
	'Prev Vouchers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PrevVoucher', 'url'=>array('index')),
	array('label'=>'Manage PrevVoucher', 'url'=>array('admin')),
);
?>

<h1>Create PrevVoucher</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>