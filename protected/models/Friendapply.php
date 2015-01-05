<?php

/**
 * This is the model class for table "friendapply".
 *
 * The followings are the available columns in table 'friendapply':
 * @property integer $id
 * @property string $apply_account
 * @property string $receive_account
 * @property string $information
 * @property string $time
 *
 * The followings are the available model relations:
 * @property User $receiveAccount
 * @property User $applyAccount
 */
class Friendapply extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Friendapply the static model class
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
		return 'friendapply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('apply_account, receive_account, time', 'required'),
			array('apply_account, receive_account', 'length', 'max'=>20),
			array('information', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, apply_account, receive_account, information, time', 'safe', 'on'=>'search'),
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
			'receiveAccount' => array(self::BELONGS_TO, 'User', 'receive_account'),
			'applyAccount' => array(self::BELONGS_TO, 'User', 'apply_account'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'apply_account' => 'Apply Account',
			'receive_account' => 'Receive Account',
			'information' => 'Information',
			'time' => 'Time',
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
		$criteria->compare('apply_account',$this->apply_account,true);
		$criteria->compare('receive_account',$this->receive_account,true);
		$criteria->compare('information',$this->information,true);
		$criteria->compare('time',$this->time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}