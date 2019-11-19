<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Addstock;
$this->title = 'Store';
$this->params['breadcrumbs'][] = $this->title;
?>

 <p class="lead">Store</p>

<div class="site-index">

<div class="div1" style="text-align:right; float:right; width:50%;">
<?= Html::a('View Cart', ['/site/cart'], ['class'=>'btn btn-primary']) ?>
</div>
  <div class="body-content">
        <div class="row">
         <table class="table table-hover">
                <thead>
                 <tr>
                   <th scope="col">Product</th>
                   <th scope="col">Category</th>
                   <th scope="col">Price</th>
                   <th scope="col">Stock Available</th>
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
                        <span><?=Html::a('Add to Cart', ['cartadd', 'id' => $post->id], ['class' => 'label label-success']) ?></span>

                        <span><?=Html::a('Buy Now', ['buynow', 'id' => $post->id], ['class' => 'label label-info']) ?></span>
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

