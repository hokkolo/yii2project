<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Additem extends ActiveRecord {
	public $aproduct;
	public $acategory;
	public $aprice;
	public $aquantity;

	public static function tablename()
	{ return 'inventory';
	}


	public function rules()
	{  return [
           [['product','category','price','quantity'], 'required'],
           [['product'],'string', 'max' => 50],
           [['category'],'string', 'max' => 50],
           [['price'], 'integer', 'max' => 50],
           [['quantity'], 'integer', 'max' => 50]
       ];
	}
}
