<?php

/**
 * This is the model class for table "coursebook".
 *
 * The followings are the available columns in table 'coursebook':
 * @property integer $courseid
 * @property string $bookisbn
 * @property string $coursename
 * @property string $bookname
 */
class Coursebook extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Coursebook the static model class
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
		return 'coursebook';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('courseid, bookisbn', 'required'),
			array('courseid', 'numerical', 'integerOnly'=>true),
			array('bookisbn', 'length', 'max'=>20),
			array('coursename, bookname', 'length', 'max'=>450),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('courseid, bookisbn, coursename, bookname', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'courseid' => 'Courseid',
			'bookisbn' => 'Bookisbn',
			'coursename' => 'Coursename',
			'bookname' => 'Bookname',
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

		$criteria->compare('courseid',$this->courseid);
		$criteria->compare('bookisbn',$this->bookisbn,true);
		$criteria->compare('coursename',$this->coursename,true);
		$criteria->compare('bookname',$this->bookname,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}