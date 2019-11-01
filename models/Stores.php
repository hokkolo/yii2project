<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Stores extends ActiveRecord {
public $mname;
public $martist;
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
           [['songname','artist','remark'], 'required'],
           [['songname'],'string', 'max' => 50],
           [['artist'], 'string', 'max' => 50],
           [['remark'], 'string', 'max' => 255],

       ];
   }
}

