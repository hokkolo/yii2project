<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Addstock extends ActiveRecord {
	public $id;
	public $product;
	public $category;
	public $price;
	public $quantity;

	public static function tablename()
	{ return 'inventory';
	}

	public function rules()
	{
		return[
			[['id','product','category','price','quantity'], 'required']
			];
	}
}

