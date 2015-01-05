<?php

/**
 * This is the model class for table "coursecomment".
 *
 * The followings are the available columns in table 'coursecomment':
 * @property integer $comment_id
 * @property integer $course_id
 * @property integer $teacher_id
 * @property string $account
 * @property string $title
 * @property string $content
 * @property string $time_add
 * @property integer $commentgrade
 * @property string $coursename
 * @property string $user_name
 *
 * The followings are the available model relations:
 * @property Course $course
 * @property Teacher $teacher
 * @property User $account0
 */
class Coursecomment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Coursecomment the static model class
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
		return 'coursecomment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_id', 'required'),
			array('course_id, teacher_id, commentgrade', 'numerical', 'integerOnly'=>true),
			array('account', 'length', 'max'=>20),
			array('title', 'length', 'max'=>40),
			array('content', 'length', 'max'=>500),
			array('coursename, user_name', 'length', 'max'=>45),
			array('time_add', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('comment_id, course_id, teacher_id, account, title, content, time_add, commentgrade, coursename, user_name', 'safe', 'on'=>'search'),
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
			'course' => array(self::BELONGS_TO, 'Course', 'course_id'),
			'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
			'account0' => array(self::BELONGS_TO, 'User', 'account'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comment_id' => 'Comment',
			'course_id' => 'Course',
			'teacher_id' => 'Teacher',
			'account' => 'Account',
			'title' => 'Title',
			'content' => 'Content',
			'time_add' => 'Time Add',
			'commentgrade' => 'Commentgrade',
			'coursename' => 'Coursename',
			'user_name' => 'User Name',
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

		$criteria->compare('comment_id',$this->comment_id);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('teacher_id',$this->teacher_id);
		$criteria->compare('account',$this->account,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('time_add',$this->time_add,true);
		$criteria->compare('commentgrade',$this->commentgrade);
		$criteria->compare('coursename',$this->coursename,true);
		$criteria->compare('user_name',$this->user_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}