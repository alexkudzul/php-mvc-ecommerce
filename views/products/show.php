<?php if(isset($productOne)):?>

<h1><?=$productOne->name?></h1>

<div id="detail-product">
    <div class="image">
        <?php if($productOne->image != null): ?>
            <img src="<?=base_url?>uploads/images/<?=$productOne->image?>" alt="">
        <?php else: ?>
            <img src="<?=base_url?>assets/img/camiseta.png" alt="">
        <?php endif; ?>
    </div>
    <div class="data">
        <p class="description"><?=$productOne->description?></p>
        <p class="price"><?=$productOne->price ?></p>
        <a href="<?=base_url?>cart/add&id=<?=$productOne->id?>"class="button">Buy</a>
    </div>
</div>

<?php else:?>
    <h1>Product no exist</h1>
<?php endif;?>