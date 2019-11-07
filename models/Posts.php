<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Posts extends ActiveRecord {
	private $id;
	private $songname;
	private $film;
	private $artist;
	private $price;
	private $remark;


	   public static function tablename()
   {
       return 'store';
   }


	public function rules(){
		return[
		[['id','songname','film','artist','price','remark'],'required']
		];
	}
}
?>
