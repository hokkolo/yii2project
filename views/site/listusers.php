<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Listusers;
use yii\bootstrap\ActiveForm;

$this->title = 'List Users';
$this->params['breadcrumbs'][] = $this->title;
?>
 <p class="lead">List of available Users</p>

<div class="site-index">


  <div class="body-content">
        <div class="row">
         <table class="table table-hover">
                <thead>
                 <tr>
                   <th scope="col">First name</th>
                   <th scope="col">Username</th>
                 </tr>
                </thead>
                <tbody>
                 <?php if (count($users) > 0): ?>
                   <?php foreach($users as $post): ?>
                 <tr class="table-active">
                 <td> <?php echo $post->firstname;?> </td>
                 <td> <?php echo $post->username;?> </td>
                 <td>
                        <span><?=Html::a('Delete', ['delete', 'id' => $post->id], ['class' => 'label label-danger']) ?></span>
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
