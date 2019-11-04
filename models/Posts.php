<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Posts extends ActiveRecord {
	private $songname;
	private $artist;
	private $remark;


	   public static function tablename()
   {
       return 'store';
   }


	public function rules(){
		return[
		[['songname','artist','remark'],'required']
		];
	}
}
?>
