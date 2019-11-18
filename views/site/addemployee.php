<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\Createuser;
use yii\bootstrap\ActiveForm;
use yii\ibootstrap\ActiveField;
use yii\helpers\ArrayHelpers;

$this->title = 'Add Employee';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
<?php if( Yii::$app->user->identity->category == 'supervisor' ): ?>
<div class="div1" style="text-align:right; float:right; width:50%;">
<?= Html::a('List Users', ['/site/emplist'], ['class'=>'btn btn-primary']) ?>
</div>
<?php endif ?>


 <h1><?= Html::encode($this->title) ?></h1>

    <?php  if (Yii::$app->session->hasFlash('message')): ?>

        <div class="alert alert-success">
           Done......! Employee has been created.
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
                    <?= $form->field($model, 'category')->dropDownList(
                          [
                           'employee' => 'Employee',
                           'others' => 'Others']
                                 ); ?>
                    <div class="form-group">
                        <?= Html::submitButton('Add Employee', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

<?php endif ?>
