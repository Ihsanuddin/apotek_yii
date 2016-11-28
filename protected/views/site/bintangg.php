<?php
/* @var $this SiteController */
/* @var $model BintangForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Bintang';
$this->breadcrumbs=array(
	'Bintang',
);
?>

<h1>Bintang</h1>

<p>
<?php 
for($a=1; $a<=$length; $a++){
    for($b=1; $b<=$a; $b++){
        echo '*';
    }
    echo "</br>";
}
?>
</p>

