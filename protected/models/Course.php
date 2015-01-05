<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property integer $course_id
 * @property string $academy
 * @property integer $teacher_id
 * @property string $name
 * @property string $course_starttime
 * @property string $course_endtime
 * @property string $add_time
 * @property string $photo
 *
 * The followings are the available model relations:
 * @property Academy $academy0
 * @property Teacher $teacher
 * @property Coursecomment[] $coursecomments
 */
class Course extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Course the static model class
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
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('teacher_id', 'numerical', 'integerOnly'=>true),
			array('academy, name', 'length', 'max'=>20),
			array('photo', 'length', 'max'=>450),
			array('course_starttime, course_endtime, add_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('course_id, academy, teacher_id, name, course_starttime, course_endtime, add_time, photo', 'safe', 'on'=>'search'),
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
			'academy0' => array(self::BELONGS_TO, 'Academy', 'academy'),
			'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
			'coursecomments' => array(self::HAS_MANY, 'Coursecomment', 'course_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'course_id' => '课程ID',
			'academy' => '所属学院',
			'teacher_id' => '授课教师ID',
			'name' => '课程名称',
			'course_starttime' => '开始时间',
			'course_endtime' => '结束时间',
			'add_time' => '添加时间',
			'photo' => '课程照片',
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

		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('academy',$this->academy,true);
		$criteria->compare('teacher_id',$this->teacher_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('course_starttime',$this->course_starttime,true);
		$criteria->compare('course_endtime',$this->course_endtime,true);
		$criteria->compare('add_time',$this->add_time,true);
		$criteria->compare('photo',$this->photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}