<?php

/**
 * This is the model class for table "topicreply".
 *
 * The followings are the available columns in table 'topicreply':
 * @property integer $id
 * @property integer $topic_id
 * @property string $content
 * @property integer $reference
 * @property string $addtime
 * @property string $account
 * @property integer $floor
 *
 * The followings are the available model relations:
 * @property Topicreply $reference0
 * @property Topicreply[] $topicreplies
 * @property Topic $topic
 * @property User $account0
 */
class Topicreply extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Topicreply the static model class
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
		return 'topicreply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('topic_id, content, addtime, account, floor', 'required'),
			array('topic_id, reference, floor', 'numerical', 'integerOnly'=>true),
			array('content', 'length', 'max'=>500),
			array('account', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, topic_id, content, reference, addtime, account, floor', 'safe', 'on'=>'search'),
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
			'reference0' => array(self::BELONGS_TO, 'Topicreply', 'reference'),
			'topicreplies' => array(self::HAS_MANY, 'Topicreply', 'reference'),
			'topic' => array(self::BELONGS_TO, 'Topic', 'topic_id'),
			'account0' => array(self::BELONGS_TO, 'User', 'account'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'topic_id' => 'Topic',
			'content' => 'Content',
			'reference' => 'Reference',
			'addtime' => 'Addtime',
			'account' => 'Account',
			'floor' => 'Floor',
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
		$criteria->compare('topic_id',$this->topic_id);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('reference',$this->reference);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('account',$this->account,true);
		$criteria->compare('floor',$this->floor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}