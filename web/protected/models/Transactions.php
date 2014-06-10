<?php

/**
 * This is the model class for table "sl_transactions".
 *
 * The followings are the available columns in table 'sl_transactions':
 * @property integer $transactionId
 * @property string $name
 * @property string $timestamp
 * @property double $amount
 * @property string $description
 * @property integer $userId
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class Transactions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_transactions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, timestamp, amount, description, userId', 'required'),
			array('userId', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('name', 'length', 'max'=>255),
			array('timestamp', 'length', 'max'=>21),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('transactionId, name, timestamp, amount, description, userId', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'userId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'transactionId' => 'Transaction',
			'name' => 'Name',
			'timestamp' => 'Timestamp',
			'amount' => 'Amount',
			'description' => 'Description',
			'userId' => 'User',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('transactionId',$this->transactionId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('userId',$this->userId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transactions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
