<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;

$this->title = 'View Music';
?>

<div class="site-index">
<h1> <?php echo $post->artist ?></h1>
     <div class="body-content">
	<ul class="list-group">
  	 <li class="list-group-item d-flex justify-content-between align-items-center">
<h5>Music Name: </h5> <?php echo $post->songname; ?> 
  	</li>
  	<li class="list-group-item d-flex justify-content-between align-items-center">
 <h5>Film: </h5>	<?php echo $post->film; ?>
  	</li>
  	<li class="list-group-item d-flex justify-content-between align-items-center">
<h5>Remark: </h5> 	<?php echo $post->remark; ?>
 	 </li>
	</ul>
  		<div class="row">
		<?php echo \yii\helpers\Html::a( 'Back', Yii::$app->request->referrer); ?>
                    </div>
	
     </div>
</div>
