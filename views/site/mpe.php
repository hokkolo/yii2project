<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Posts;

$this->title = 'MP3s';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	Uploaded Musics are listed here.......!
    </p>

<div class="site-index">
	

  <div class="body-content">
	<div class="row">
	 <table class="table table-hover">
		<thead>
		 <tr>
		   <th scope="col">Music Name</th>
		   <th scope="col">Artist</th>
		   <th scope="col">Remark</th>
		 </tr>
		</thead>
		<tbody>
		 <?php if (count($posts) > 0): ?>
		   <?php foreach($posts as $post): ?>
		 <tr class="table-active">
<?php /*		 <th scope="row"><?php echo $post->id;?></th> */ ?>
		 <td> <?php echo $post->songname;?> </td>
		 <td> <?php echo $post->artist;?> </td>
		 <td> <?php echo $post->remark;?> </td>
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
