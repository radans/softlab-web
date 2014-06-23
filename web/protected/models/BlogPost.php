<?php

/**
 * This is the model class for table "sl_blog_post".
 *
 * The followings are the available columns in table 'sl_blog_post':
 * @property integer $blogPostId
 * @property string $urlLink
 * @property string $name
 * @property string $shortText
 * @property string $fullText
 * @property string $entryDate
 * @property integer $isVisible
 * @property integer $authorId
 * @property checkBoxList $tags
 *
 * The followings are the available model relations:
 * @property Users $author
 * @property BlogCategories[] $slBlogCategories
 */
class BlogPost extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sl_blog_post'; 
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, shortText, fullText', 'required'),
			array('isVisible', 'numerical', 'integerOnly'=>true),
			array('urlLink, name', 'length', 'max'=>255),
			array('entryDate', 'length', 'max'=>21),
			array('tags', 'safe'),
            array('name','length','min'=>4), 
            array('fullText','length','min'=>50), 
            array('tags','length','min'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('blogPostId, urlLink, name, shortText, fullText, entryDate, isVisible, authorId, tags', 'safe', 'on'=>'search'),
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
			'author' => array(self::BELONGS_TO, 'Users', 'authorId'),
			'slBlogCategories' => array(self::MANY_MANY, 'BlogCategories', 'sl_blog_post_in_category(blogPostFid, blogCategoryFid)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'blogPostId' => 'Blog Post',
			'urlLink' => 'Url Link',
			'name' => 'Name',
			'shortText' => 'Short Text',
			'fullText' => 'Full Text',
			'entryDate' => 'Entry Date',
			'isVisible' => 'Is Visible',
			'authorId' => 'Author',
			'tags' => 'Tags',
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

		$criteria->compare('blogPostId',$this->blogPostId);
		$criteria->compare('urlLink',$this->urlLink,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('shortText',$this->shortText,true);
		$criteria->compare('fullText',$this->fullText,true);
		$criteria->compare('entryDate',$this->entryDate,true);
		$criteria->compare('isVisible',$this->isVisible);
		$criteria->compare('authorId',$this->authorId);
		$criteria->compare('tags',$this->tags,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BlogPost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
