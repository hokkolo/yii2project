<?php

$user=[];
if (  ! Yii::$app->user->isGuest): {

$user =  Yii::$app->user->identity->firstname;
}
endif;
?>

<h1>
<?php echo"Welcome back ";echo $user ?>
</h1>
