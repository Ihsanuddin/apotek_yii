<?php
/* @var $this PrevVoucherController */
/* @var $model PrevVoucher */

$this->breadcrumbs=array(
	'Prev Vouchers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PrevVoucher', 'url'=>array('index')),
	array('label'=>'Create PrevVoucher', 'url'=>array('create')),
	array('label'=>'View PrevVoucher', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PrevVoucher', 'url'=>array('admin')),
);
?>

<h1>Update PrevVoucher <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>