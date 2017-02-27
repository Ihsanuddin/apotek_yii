<?php
/* @var $this CsvController */
/* @var $model Csv */

$this->breadcrumbs=array(
	'Csvs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Csv', 'url'=>array('index')),
	array('label'=>'Create Csv', 'url'=>array('create')),
	array('label'=>'Update Csv', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Csv', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Csv', 'url'=>array('admin')),
);
?>

<h1>View Csv #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'csv_file',
		'image',
	),
)); ?>
