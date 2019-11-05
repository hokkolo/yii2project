<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Createuser;
use app\models\Listusers;
use yii\bootstrap\ActiveForm;

$this->title = 'Create User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
<?php if( ! Yii::$app->user->isGuest ): ?>
<div class="div1" style="text-align:right; float:right; width:50%;">
<?= Html::a('List Users', ['/site/listusers'], ['class'=>'btn btn-primary']) ?>
</div>
<?php endif ?>


 <h1><?= Html::encode($this->title) ?></h1>

    <?php  if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
           Done......! User has been created.
        </div>

<?php else: ?>
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']) ?>

                    <?= $form->field($model, 'firstname')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'username')->textInput() ?>

		    <?= $form->field($model, 'password')->passwordInput() ?>
		    <?= $form->field($model, 'authkey')->textInput() ?>

 		    <?= $form->field($model, 'accesstoken')->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Add User', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

<?php endif ?>

<?php /*
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
<?php /*                 <th scope="row"><?php echo $post->id;?></th>  ?>
                 <td> <?php echo $post->firstname;?> </td>
                 <td> <?php echo $post->username;?> </td>
		 <td> 
			<span><?=Html::a('Delete') ?></span>
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

</div> */ ?>
