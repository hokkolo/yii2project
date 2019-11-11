<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Posts;

$this->title = 'Artist';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	List musics based on your favourite Artist
    </p>

<div class="site-index">
 <div class="body-content">
        <div class="row">
         <table class="table table-hover">
                <thead>
                 <tr>
                   <th scope="col">Artist</th>
                   <th scope="col">Action</th>
                 </tr>
                </thead>
                <tbody>
                 <?php if (count($posts) > 0): ?>
                   <?php foreach($posts as $post): ?>
                 <tr class="table-active">
                 <td> <?php echo $post->artist;?> </td>
                        <td> 
                        <span><?=Html::a('View', ['view', 'id' => $post->id], ['class' => 'label label-primary']) ?></span>
                  </td>
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
