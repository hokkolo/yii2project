<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Cartadd extends ActiveRecord {
        public $aproduct;
        public $aprice;
        public $auser;

        public static function tablename()
        { return 'cart';
        }


        public function rules()
        {  return [
           [['product','price','user'], 'required'],
           [['product'],'string', 'max' => 50],
           [['price'], 'integer', 'max' => 50],
           [['user'], 'string', 'max' => 50]
       ];
	}
}	
