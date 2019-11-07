<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class Createuser extends ActiveRecord {
	public $fname;
	public $uname;
	public $pword;
	public $akey;
	public $atoken;
	public $acategory;

       /**
    * @inheritdoc
    */
   public static function tablename()
   {
       return 'login';
   }
   /**
    * @inheritdoc
    */
   public function rules()
   {
       return [
           [['firstname','username','password','authkey','accesstoken','category'], 'required'],
	   [['firstname'],'string', 'max' => 50],
	   [['username'],'string', 'max' => 50],
           [['password'], 'string', 'max' => 50],
	   [['authkey'], 'string', 'max' => 255],
	   [['accesstoken'],'string', 'max' => 50],
	   [['category'],'string', 'max' => 50]

       ];
   }
}


?>
