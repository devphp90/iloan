<?php
$this->breadcrumbs=array(
	'Assets'=>array('index'),
	$model->item_name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
    array(
        'label'=>Yii::t('app','Create'),
        'icon'=>'icon-plus',
        'url'=>$this->createUrl('create'),
    ),
    array(
        'label'=>Yii::t('app','View'),
        'icon'=>'icon-eye-open',
        'url'=>array('view','id'=>$model->id),
    ),
    array(
        'label'=>Yii::t('app','Manage'),
        'icon'=>'icon-th-list',
        'url'=>$this->createUrl('index')
    ),
);
?>

<h1>Update Asset <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>