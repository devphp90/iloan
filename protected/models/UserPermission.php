<?php

/**
 * This is the model class for table "user_permission".
 *
 * The followings are the available columns in table 'user_permission':
 * @property integer $id
 * @property integer $uid
 * @property string $controller
 * @property integer $create
 * @property integer $update
 * @property integer $delete
 * @property integer $view
 *
 * The followings are the available model relations:
 * @property User $u
 */
class UserPermission extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserPermission the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_permission';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, controller, create, update, delete, view', 'required'),
			array('uid, create, update, delete, view', 'numerical', 'integerOnly'=>true),
			array('controller', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, controller, create, update, delete, view', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'u' => array(self::BELONGS_TO, 'User', 'uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uid' => 'Uid',
			'controller' => 'Controller',
			'create' => 'Create',
			'update' => 'Update',
			'delete' => 'Delete',
			'view' => 'View',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('controller',$this->controller,true);
		$criteria->compare('create',$this->create);
		$criteria->compare('update',$this->update);
		$criteria->compare('delete',$this->delete);
		$criteria->compare('view',$this->view);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function perSearch($uid)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->condition = 'uid=:uid';
		$criteria->params = array(
			':uid'=>$uid,
		);
		$criteria->compare('id',$this->id);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('controller',$this->controller,true);
		$criteria->compare('create',$this->create);
		$criteria->compare('update',$this->update);
		$criteria->compare('delete',$this->delete);
		$criteria->compare('view',$this->view);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	public function getController()
	{
		$whitelist = array('customer','project');
		$data = array();
		
		foreach (glob(Yii::getPathOfAlias('application.controllers') . "/*Controller.php") as $controller){
			$_controllerName = strtolower(basename($controller, "Controller.php"));

			
			if(in_array($_controllerName, $whitelist))
				$data[$_controllerName] = $_controllerName;
		}
		
		return $data;
	}
	
	
	public function permissionSearch($uid)
	{
		$whitelist = array('customer','project');
		$data = array();
		
		foreach (glob(Yii::getPathOfAlias('application.controllers') . "/*Controller.php") as $controller){
			$_controllerName = strtolower(basename($controller, "Controller.php"));
			$permission = array(
				'create'=>0,
				'update'=>0,
				'delete'=>0,
				'view'=>0,
			);
			
			$model = UserPermission::model()->findByAttributes(array('uid'=>$uid,'controller'=>$_controllerName));
			if($model != null){
				$permission['create'] = $model->create;
				$permission['update'] = $model->update;
				$permission['delete'] = $model->delete;
				$permission['view'] = $model->view;
			}
			
			if(in_array($_controllerName, $whitelist))
				$data[] = array(
					'id'=>NULL,
					'controller'=>$_controllerName,
					'create' => CHtml::checkBox('Permission['.$_controllerName.'][Create]',$permission['create'],array(':action'=>'create')),
					'update' => CHtml::checkBox('Permission[	'.$_controllerName.'][Update]',$permission['update'],array(':action'=>'update')),
					'delete' => CHtml::checkBox('Permission['.$_controllerName.'][Delete]',$permission['delete'],array(':action'=>'delete')),
					'view' => CHtml::checkBox('Permission['.$_controllerName.'][View]',$permission['view'],array(':action'=>'view')),
					'all' => CHtml::checkBox('check_all'),
				);
		}
		return new CArrayDataProvider($data,array(
			'pagination'=>false,
		));
		
	}
}