<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property string $account
 * @property string $academy
 * @property string $password
 * @property string $name
 * @property integer $gender
 * @property string $email
 * @property string $phone
 * @property string $photo
 * @property integer $visibility
 * @property string $question
 * @property string $answer
 *
 * The followings are the available model relations:
 * @property Coursecomment[] $coursecomments
 * @property Friend[] $friends
 * @property Friend[] $friends1
 * @property Friendapply[] $friendapplies
 * @property Friendapply[] $friendapplies1
 * @property Teachercomment[] $teachercomments
 * @property Topic[] $topics
 * @property Topiccollection[] $topiccollections
 * @property Topicreply[] $topicreplies
 * @property Academy $academy0
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'User';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account, password, name, gender, email', 'required'),
			array('gender, visibility', 'numerical', 'integerOnly'=>true),
			array('account, academy, password, name, phone', 'length', 'max'=>20),
			array('email', 'length', 'max'=>100),
			array('photo, question, answer', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('account, academy, password, name, gender, email, phone, photo, visibility, question, answer', 'safe', 'on'=>'search'),
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
			'coursecomments' => array(self::HAS_MANY, 'Coursecomment', 'account'),
			'friends' => array(self::HAS_MANY, 'Friend', 'second_account'),
			'friends1' => array(self::HAS_MANY, 'Friend', 'first_account'),
			'friendapplies' => array(self::HAS_MANY, 'Friendapply', 'receive_account'),
			'friendapplies1' => array(self::HAS_MANY, 'Friendapply', 'apply_account'),
			'teachercomments' => array(self::HAS_MANY, 'Teachercomment', 'account'),
			'topics' => array(self::HAS_MANY, 'Topic', 'account'),
			'topiccollections' => array(self::HAS_MANY, 'Topiccollection', 'account'),
			'topicreplies' => array(self::HAS_MANY, 'Topicreply', 'account'),
			'academy0' => array(self::BELONGS_TO, 'Academy', 'academy'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'account' => '账号',
			'academy' => '所属学院',
			'password' => '密码',
			'name' => '姓名',
			'gender' => '性别',
			'email' => 'Email',
			'phone' => '手机',
			'photo' => '照片',
			'visibility' => '可见性',
			'question' => '密码提示问题',
			'answer' => '答案',
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

		$criteria->compare('account',$this->account,true);
		$criteria->compare('academy',$this->academy,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('visibility',$this->visibility);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answer',$this->answer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}