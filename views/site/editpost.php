<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Additem;
$this->title = 'Edit Product';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-contact">

 <h1><?= Html::encode($this->title) ?></h1>

    <?php  if (Yii::$app->session->hasFlash('message')): ?>

        <div class="alert alert-success">
           Done......! Data has been Updated in the Database.
        </div>

<?php else: ?>
        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']) ?>
                  <?= $form->field($model, 'product')->textInput(['autofocus' => true]) ?>
                  <?= $form->field($model, 'category')->dropDownList(
                            ['cd' => 'CDs',
                             'mp3' => 'Mp3',
                             'cassette' => 'Cassette',
                             'digital' => 'Sound Card']
                        );?>
                  <?= $form->field($model, 'price')->textInput() ?>
                  <?= $form->field($model, 'quantity')->textInput() ?>
                    <div class="form-group">
			<?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>

                    </div>
<?php echo "\n"; ?>
                <?php ActiveForm::end(); ?>

            </div>
        </div>

<?php endif ?>

