<?php
/* @var $this CsvController */
/* @var $model Csv */

$this->breadcrumbs=array(
	'Csvs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Csv', 'url'=>array('index')),
	array('label'=>'Manage Csv', 'url'=>array('admin')),
);
?>

<h1>Create Csv</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>