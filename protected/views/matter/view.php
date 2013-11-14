<?php
$this->breadcrumbs=array(
    'Matters'=>array('index'),
    $model->name,
);

$this->menu=array(
    array('label'=>'List Matter','url'=>array('index')),
    array('label'=>'Create Matter','url'=>array('create')),
    array('label'=>'Update Matter','url'=>array('update','id'=>$model->id)),
    array('label'=>'Delete Matter','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Manage Matter','url'=>array('admin')),
);
?>

<h1>View Matter #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
        'id',
        'name',
        'note',
    ),
)); ?>