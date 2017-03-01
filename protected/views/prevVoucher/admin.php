<?php
/* @var $this PrevVoucherController */
/* @var $model PrevVoucher */

$this->breadcrumbs=array(
	'Prev Vouchers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PrevVoucher', 'url'=>array('index')),
	array('label'=>'Create PrevVoucher', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('prev-voucher-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Prev Vouchers</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prev-voucher-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'voucher_name',
		'image',
		'image_voucher',
		'coor_x',
		'coor_y',
		/*
		'font_color',
		'font_size',
		'font_style',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
