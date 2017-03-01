<?php
/* @var $this PrevVoucherController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Prev Vouchers',
);

$this->menu=array(
	array('label'=>'Create PrevVoucher', 'url'=>array('create')),
	array('label'=>'Manage PrevVoucher', 'url'=>array('admin')),
);
?>

<h1>Prev Vouchers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
