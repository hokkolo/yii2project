<?php

/* @var $this yii\web\View */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Stores;
$this->title = 'Store';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-contact">

 <h1><?= Html::encode($this->title) ?></h1>

    <?php  if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
           Done......! Data has been written to the Database.
        </div>

<?php else: ?>
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']) ?>

                    <?= $form->field($model, 'songname')->textInput(['autofocus' => true]) ?>

		    <?= $form->field($model, 'film')->textInput() ?>


		     <?= $form->field($model, 'artist')->textInput() ?>

		      <?= $form->field($model, 'price')->textInput() ?>

                    <?= $form->field($model, 'remark')->textInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Add Music', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

<?php endif ?>
