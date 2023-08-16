<?php
use yii\helpers\Url;
?>

<div class="row">
    <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
            <a href="">
                <div class="img-box">
                    <img src="/images/q.png" alt="">
                </div>
                <div class="detail-box">
                    <h3><?= $product->id ?></h3>
                    <h6><?= $product->product_name ?></h6>
                    <h6><?= $product->price ?></h6>
                    <h6><?= $product->slug ?></h6>
                    <h6><?= $product->sku ?></h6>
                    
                </div>
                <div class="new">
                    <span>New</span>
                </div>
            </a>
        </div>
    </div>

    <!-- Repeat the above code block for each product, adjusting the col-* classes as needed -->

</div>
