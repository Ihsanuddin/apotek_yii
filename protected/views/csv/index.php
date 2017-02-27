<?php
/* @var $this CsvController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Csvs',
);

$this->menu=array(
	array('label'=>'Create Csv', 'url'=>array('create')),
	array('label'=>'Manage Csv', 'url'=>array('admin')),
);
?>

<h1>Csvs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
