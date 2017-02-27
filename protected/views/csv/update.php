<?php
/* @var $this CsvController */
/* @var $model Csv */

$this->breadcrumbs=array(
	'Csvs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Csv', 'url'=>array('index')),
	array('label'=>'Create Csv', 'url'=>array('create')),
	array('label'=>'View Csv', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Csv', 'url'=>array('admin')),
);
?>

<h1>Update Csv <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>