
<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class Listusers extends ActiveRecords {
        public $fname;
        public $uname;
	public function rules()

	public static function tablename()
   {
       return 'login';
   }

   {
       return [
               [['firstname','username'], 'required']
                      ];
   }

}
?>
