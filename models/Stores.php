<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Stores extends ActiveRecord {
public $mid;	
public $mname;
public $fname;
public $martist;
public $mprice;
public $mremark;

       /**
    * @inheritdoc
    */
   public static function tablename()
   {
       return 'store';
   }
   /**
    * @inheritdoc
    */
   public function rules()
   {
       return [
	   [['songname','film','artist','price','remark'], 'required'],
	   [['id'],'integer','max' => 30],
	   [['songname'],'string', 'max' => 50],
	   [['film'],'string', 'max' => 50],
	   [['artist'], 'string', 'max' => 50],
	   [['price'],'integer', 'max' => 30],
           [['remark'], 'string', 'max' => 255],

       ];
   }
}

