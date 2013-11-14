
<?php
$this->breadcrumbs=array(
    'Matters',
);

$this->menu=array(
    array('label'=>'Create Matter','url'=>array('create')),
    array('label'=>'Manage Matter','url'=>array('admin')),
);
?>

<h1>Matters</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
)); ?>