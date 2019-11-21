<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Cartlist extends ActiveRecord {
        public $uid;
        public $pname;
        public $pprice;
	public $uuser;

        public static function tablename()
   {
       return 'cart';
   }
         public function rules()
   {
       return [
               [['id','product','price','user'], 'required']
              ];
   }

}
