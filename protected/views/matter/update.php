<?php
$this->breadcrumbs=array(
    'Matters'=>array('index'),
    $model->name=>array('view','id'=>$model->id),
    'Update',
);

$this->menu=array(
    array('label'=>'List Matter','url'=>array('index')),
    array('label'=>'Create Matter','url'=>array('create')),
    array('label'=>'View Matter','url'=>array('view','id'=>$model->id)),
    array('label'=>'Manage Matter','url'=>array('admin')),
);
?>

<h1>Update Matter <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>