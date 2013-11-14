<?php
$this->breadcrumbs=array(
    'Matters'=>array('index'),
    'Create',
);

$this->menu=array(
    array('label'=>'List Matter','url'=>array('index')),
    array('label'=>'Manage Matter','url'=>array('admin')),
);
?>

<h1>Create Matter</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>