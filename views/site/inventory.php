<?php
use yii\helpers\Html;
use app\models\Addstock;
use yii\bootstrap\ActiveForm;

$this->title = 'Inventory';
$this->params['breadcrumbs'][] = $this->title;
?>

 <p class="lead">Inventory Records</p>

<div class="site-index">

<div class="div1" style="text-align:right; float:right; width:50%;">
<?= Html::a('Add Stock', ['/site/addstock'], ['class'=>'btn btn-primary']) ?>
</div>
  <div class="body-content">
        <div class="row">
         <table class="table table-hover">
                <thead>
                 <tr>
                   <th scope="col">Product</th>
		   <th scope="col">Category</th>
	           <th scope="col">Price</th>	
		   <th scope="col">Quantity</th>
		   <th scope="col">Action</th>
                 </tr>
                </thead>
                <tbody>
                 <?php if (count($posts) > 0): ?>
                   <?php foreach($posts as $post): ?>
                    <tr class="table-active">
                        <td> <?php echo $post->product;?> </td>
		        <td> <?php echo $post->category;?> </td>
		        <td> <?php echo $post->price; ?> </td>
			<td> <?php echo $post->quantity;?> </td>
			<td>
			<span><?=Html::a('Edit', ['edit', 'id' => $post->id], ['class' => 'label label-info']) ?></span>

                        <span><?=Html::a('Delete', ['delete_item', 'id' => $post->id], ['class' => 'label label-danger']) ?></span>
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
