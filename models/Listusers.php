<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Listusers extends ActiveRecord {
	public $uid;
	public $fname;
	public $uname;

	public static function tablename()
   {
       return 'login';
   }
	 public function rules()
   {
       return [
               [['id','firstname','username'], 'required']
              ];
   }

}

