<?php

/**
 * This is the model class for table "prev_voucher".
 *
 * The followings are the available columns in table 'prev_voucher':
 * @property integer $id
 * @property string $voucher_name
 * @property string $image
 * @property string $image_voucher
 * @property integer $coor_x
 * @property integer $coor_y
 * @property integer $font_color
 * @property integer $font_size
 * @property string $font_style
 */
class PrevVoucher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PrevVoucher the static model class
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
		return 'prev_voucher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('voucher_name, coor_x, coor_y, font_color, font_size, font_style', 'required'),
			array('coor_x, coor_y, font_size', 'numerical', 'integerOnly'=>true),
			array('voucher_name, image, image_voucher', 'length', 'max'=>256),
			array('font_style', 'length', 'max'=>128),
			array('csv_file','file','types'=>'csv','allowEmpty'=>false,'on'=>'insert'),
			array('image','file','types' => 'jpg,png','allowEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, voucher_name, image, image_voucher, csv_file, coor_x, coor_y, font_color, font_size, font_style', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'voucher_name' => 'Voucher Name',
			'image' => 'Image',
			'image_voucher' => 'Image Voucher',
			'csv_file'=> 'Csv File',
			'coor_x' => 'Coor X',
			'coor_y' => 'Coor Y',
			'font_color' => 'Font Color',
			'font_size' => 'Font Size',
			'font_style' => 'Font Style',
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
		$criteria->compare('voucher_name',$this->voucher_name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('image_voucher',$this->image_voucher,true);
		$criteria->compare('csv_file',$this->csv_file,true);
		$criteria->compare('coor_x',$this->coor_x);
		$criteria->compare('coor_y',$this->coor_y);
		$criteria->compare('font_color',$this->font_color);
		$criteria->compare('font_size',$this->font_size);
		$criteria->compare('font_style',$this->font_style,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}