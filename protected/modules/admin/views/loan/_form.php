<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'loan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'borrower_id',array('class'=>'span5')); ?>
	
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>
	
	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
