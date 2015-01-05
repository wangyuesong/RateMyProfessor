<?php

/**
 * This is the model class for table "teacher".
 *
 * The followings are the available columns in table 'teacher':
 * @property integer $teacher_id
 * @property string $academy
 * @property string $name
 * @property integer $gender
 * @property string $photo
 * @property string $add_time
 * @property string $start_time
 * @property string $end_time
 *
 * The followings are the available model relations:
 * @property Course[] $courses
 * @property Coursecomment[] $coursecomments
 * @property Academy $academy0
 * @property Teachercomment[] $teachercomments
 */
class Teacher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Teacher the static model class
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
		return 'teacher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, gender', 'required'),
			array('gender', 'numerical', 'integerOnly'=>true),
			array('academy, name', 'length', 'max'=>20),
			array('photo', 'length', 'max'=>500),
			array('add_time, start_time, end_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('teacher_id, academy, name, gender, photo, add_time, start_time, end_time', 'safe', 'on'=>'search'),
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
			'courses' => array(self::HAS_MANY, 'Course', 'teacher_id'),
			'coursecomments' => array(self::HAS_MANY, 'Coursecomment', 'teacher_id'),
			'academy0' => array(self::BELONGS_TO, 'Academy', 'academy'),
			'teachercomments' => array(self::HAS_MANY, 'Teachercomment', 'teacher_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'teacher_id' => '教师ID',
			'academy' => '所属学院',
			'name' => '姓名',
			'gender' => '性别',
			'photo' => '照片',
			'add_time' => '添加时间',
			'start_time' => '开始时间',
			'end_time' => '结束时间',
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

		$criteria->compare('teacher_id',$this->teacher_id);
		$criteria->compare('academy',$this->academy,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('start_time',$this->start_time,true);
		$criteria->compare('end_time',$this->end_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}