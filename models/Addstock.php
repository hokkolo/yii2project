<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Addstock extends ActiveRecord {
	public $mid;
	public $mproduct;
	public $mcategory;
	public $mprice;
	public $mquantity;

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

