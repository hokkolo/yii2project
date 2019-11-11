<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Posts;
//use app\model\Stores;
$user=false;

if (  ! Yii::$app->user->isGuest): { 
	if ( Yii::$app->user->identity->category == 'admin' ): 
		$user=true; 
endif;
}
endif;
				


$this->title = 'MP3s';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	Uploaded Musics are listed here.......!
    </p>

<div class="site-index">

<?php if( ! Yii::$app->user->isGuest ): ?>

<div class="div1" style="text-align:right; float:right; width:50%;">
<?= Html::a('Add Music', ['/site/stores'], ['class'=>'btn btn-primary']) ?>
</div>
<?php endif ?>	

  <div class="body-content">
	<div class="row">
	 <table class="table table-hover">
		<thead>
		 <tr>
		   <th scope="col">Music Name</th>
		   <th scope="col">Film</th>
		   <th scope="col">Artist</th>
		   <th scope="col">Price ($)</th>
		   <th scope="col">Remark</th>
		 </tr>
		</thead>
		<tbody>
		 <?php if (count($posts) > 0): ?>
		   <?php foreach($posts as $post): ?>
		 <tr class="table-active">
<?php /*		 <th scope="row"><?php echo $post->id;?></th> */ ?>
		 <td> <?php echo $post->songname;?> </td>
		 <td> <?php echo $post->film; ?> </td>
		 <td> <?php echo $post->artist;?> </td>
		 <td> <?php echo $post->price; ?> </td>
		 <td> <?php echo $post->remark;?> </td>
			<td> <?php if( $user ): ?>
			<span><?=Html::a('Remove', ['remove', 'id' => $post->id], ['class' => 'label label-danger']) ?></span>
		<?php endif ?>	</td>
		  </tr>
			<?php endforeach; ?>
		  <?php else: ?>
			<tr>
			 <td>No record</td>
			</tr>
		  <?php endif; ?>
		</tbody>
	 </table>
	</div>
  </div>

</div>
