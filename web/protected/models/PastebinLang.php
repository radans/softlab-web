<?php

/**
 * This is the model class for table "sl_pastebin_lang".
 *
 * The followings are the available columns in table 'sl_pastebin_lang':
 * @property integer $pastebinLangId
 * @property string $name
 * @property string $formatData
 *
 * The followings are the available model relations:
 * @property Pastebin[] $pastebins
 */
class PastebinLang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_pastebin_lang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, formatData', 'required'),
			array('name', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pastebinLangId, name, formatData', 'safe', 'on'=>'search'),
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
			'pastebins' => array(self::HAS_MANY, 'Pastebin', 'langFid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pastebinLangId' => 'Pastebin Lang',
			'name' => 'Name',
			'formatData' => 'Format Data',
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

		$criteria->compare('pastebinLangId',$this->pastebinLangId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('formatData',$this->formatData,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PastebinLang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
