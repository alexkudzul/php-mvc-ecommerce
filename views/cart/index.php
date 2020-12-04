<h1>Cart shop</h1>

<!-- Si existe la session y si hay algun elemento del cart -->
<?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) >= 1): ?>
<table>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Units</th>
        <th>Delete</th>
    </tr>

    <?php
        foreach($cart as $index => $element):
        $product = $element['product'];
    ?>
        <tr>
            <td>
                <?php if($product->image != null): ?>
                    <img src="<?=base_url?>uploads/images/<?=$product->image?>" alt="" class="img_cart">
                <?php else: ?>
                    <img src="<?=base_url?>assets/img/camiseta.png" alt="" class="img_cart">
                <?php endif; ?>
            </td>
            <td>
                <a href="<?=base_url?>products/show&id=<?=$product->id?>">

                    <?=$product->name?>

                </a>
            </td>
            <td>
                <?=$product->price?>
            </td>
            <td>
                <?=$element['units']?>
                <div class="updown-units">
                    <a href="<?=base_url?>cart/up&index=<?=$index?>" class="button">+</a>
                    <a href="<?=base_url?>cart/down&index=<?=$index?>" class="button">-</a>
                </div>
            </td>
            <td>
                <a href="<?=base_url?>cart/delete&index=<?=$index?>" class="button button-cart button-red">Delete product</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<div class="delete-cart">
    <a href="<?=base_url?>cart/delete_all" class="button button-delete button-red">Delete cart</a>
</div>
<div class="total-cart">
    <?php $stats = Helpers::statsCart(); ?>
    <h3>Price total: $<?=$stats['total']?></h3>

    <a href="<?=base_url?>orders/do" class="button button-order">Confirm order</a>
</div>

<?php else: ?>
    <p>The cart not is exist, add a product</p>
<?php endif; ?>