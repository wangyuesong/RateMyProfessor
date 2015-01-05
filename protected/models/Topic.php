<?php

/**
 * This is the model class for table "Topic".
 *
 * The followings are the available columns in table 'Topic':
 * @property integer $id
 * @property string $title
 * @property string $type
 * @property string $content
 * @property string $account
 * @property string $addtime
 * @property string $lastreplytime
 * @property integer $currentfloor
 * @property integer $clicktime
 * @property string $photo
 *
 * The followings are the available model relations:
 * @property Topiczone $type0
 * @property User $account0
 * @property Topiccollection[] $topiccollections
 * @property Topicreply[] $topicreplies
 */
class Topic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Topic the static model class
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
		return 'Topic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, type, content, account', 'required'),
			array('currentfloor, clicktime', 'numerical', 'integerOnly'=>true),
			array('title, type', 'length', 'max'=>50),
			array('content, photo', 'length', 'max'=>500),
			array('account', 'length', 'max'=>20),
			array('addtime, lastreplytime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, type, content, account, addtime, lastreplytime, currentfloor, clicktime, photo', 'safe', 'on'=>'search'),
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
			'type0' => array(self::BELONGS_TO, 'Topiczone', 'type'),
			'account0' => array(self::BELONGS_TO, 'User', 'account'),
			'topiccollections' => array(self::HAS_MANY, 'Topiccollection', 'topic_id'),
			'topicreplies' => array(self::HAS_MANY, 'Topicreply', 'topic_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => '主题',
			'type' => '区域',
			'content' => '内容',
			'account' => '发帖人',
			'addtime' => '发帖时间',
			'lastreplytime' => '最后回复',
			'currentfloor' => '回复',
			'clicktime' => '查看',
			'photo' => '图片',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('account',$this->account,true);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('lastreplytime',$this->lastreplytime,true);
		$criteria->compare('currentfloor',$this->currentfloor);
		$criteria->compare('clicktime',$this->clicktime);
		$criteria->compare('photo',$this->photo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}