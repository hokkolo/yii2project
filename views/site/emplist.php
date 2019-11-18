<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Listusers;
use yii\bootstrap\ActiveForm;

$this->title = 'Employee List';
$this->params['breadcrumbs'][] = $this->title;
?>
 <p class="lead">List of Employees</p>

<div class="site-index">
<div class="div1" style="text-align:right; float:right; width:50%;">
<?= Html::a('Add Employee', ['/site/addemployee'], ['class'=>'btn btn-primary']) ?>
</div>

  <div class="body-content">
        <div class="row">
         <table class="table table-hover">
                <thead>
                 <tr>
                   <th scope="col">First name</th>
		   <th scope="col">Username</th>
		   <th scope="col">Action</th>
                 </tr>
                </thead>
                <tbody>
                 <?php if (count($users) > 0): ?>
                   <?php foreach($users as $post): ?>
		 <tr class="table-active">
		<?php if ( $post->category == 'employee' ): ?>
                 <td> <?php echo $post->firstname;?> </td>
                 <td> <?php echo $post->username;?> </td>
                 <td>
                        <span><?=Html::a('Delete', ['delete_emp', 'id' => $post->id], ['class' => 'label label-danger']) ?></span>
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

