<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Cartlist;
use yii\bootstrap\ActiveForm;
$loguser =  Yii::$app->user->identity->username;
$this->title = 'My cart';
$this->params['breadcrumbs'][] = $this->title;
?>

 <p class="lead">My Cart</p>

<div class="site-index">
  <div class="body-content">
        <div class="row">
         <table class="table table-hover">
                <thead>
                 <tr>
                   <th scope="col">Product</th>
                   <th scope="col">Price</th>
                   <th scope="col">Action</th>
                 </tr>
                </thead>
                <tbody>
                 <?php if (count($posts) > 0): ?>
                   <?php foreach($posts as $post): ?>
                 <tr class="table-active">
                <?php if ( $post->user == $loguser ): ?>
                 <td> <?php echo $post->product;?> </td>
                 <td> <?php echo $post->price;?> </td>
                 <td>
                        <span><?=Html::a('Remove', ['delete_cart', 'id' => $post->id], ['class' => 'label label-danger']) ?></span>
                 </td>
                  </tr>
                <?php endif ?>
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

