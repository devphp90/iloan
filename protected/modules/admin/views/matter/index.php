<?php
$this->breadcrumbs=array(

	'Matter'=>array('admin'),

	'admin',

);

/* $this->menu=array( 
    array('label'=>'List Matter','url'=>array('index')), 
    array('label'=>'Create Matter','url'=>array('create')), 
);  */

$this->menu=array(

	array(	

		'label'=>Yii::t('app','Create'), 

		'icon'=>'icon-plus', 

		'url'=>$this->createUrl('create'),

	),

	array(

		'label'=>Yii::t('app','Search'), 

		'icon'=>'icon-search', 

		'url'=>'#', 

		'linkOptions'=>array('class'=>'search-button')

	),

	array(

		'label'=>Yii::t('app','Export(Excel)'), 

		'icon'=>'icon-download', 

		'url'=>$this->createUrl('export',array('type'=>'excel')), 

	),

	array(

		'label'=>Yii::t('app','Help'), 

		'icon'=>'icon-question-sign', 

		'url'=>array('#myModal'), 

		'linkOptions'=>array('data-toggle'=>'modal')

	),

);

Yii::app()->clientScript->registerScript('search', " 
$('.search-button').click(function(){ 
    $('.search-form').toggle(); 
    return false; 
}); 
$('.search-form form').submit(function(){ 
    $.fn.yiiGridView.update('matter-grid', { 
        data: $(this).serialize() 
    }); 
    return false; 
}); 
"); 
?> 

<h1>Manage Matters</h1> 
<?php /*
<p> 
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> 
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done. 
</p> 

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?> 
<div class="search-form" style="display:none"> 
<?php $this->renderPartial('_search',array( 
    'model'=>$model, 
)); ?>
</div><!-- search-form -->  */ ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array( 
    'id'=>'matter-grid', 
    'dataProvider'=>$model->search(), 
    'filter'=>$model, 
    'columns'=>array( 
        'id',
        'name',
        'note',
        array( 
            'class'=>'bootstrap.widgets.TbButtonColumn', 
        ), 
    ), 
)); ?>