<h1>Gestion de productos</h1>

<a href="<?=base_url?>products/create" class="button button-small">Create product</a>

<!-- Session flash Create -->
<?php if(isset($_SESSION['product']) && $_SESSION['product'] == 'completed'): ?>
    <strong class="alert_green">Product add successfully</strong>
<?php elseif(isset($_SESSION['product']) && $_SESSION['product'] != 'completed'): ?>
    <strong class="alert_red">Product not add, failed</strong>
<?php endif;?>

<?php Helpers::deleteSession('product') ?>

<!-- Session flash Delete -->
<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'completed'): ?>
    <strong class="alert_green">Product delete successfully</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'completed'): ?>
    <strong class="alert_red">Product delete not, failed</strong>
<?php endif;?>

<?php Helpers::deleteSession('delete') ?>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Action</th>
    </tr>
    <!-- fetch_object, Devuelve la fila actual de un conjunto de resultados como un objeto -->
    <?php while($product = $products->fetch_object()): ?>
        <tr>
            <td><?= $product->id ?></td>
            <td><?= $product->name ?></td>
            <td><?= $product->price ?></td>
            <td><?= $product->stock ?></td>
            <td>
                <a href="<?=base_url?>products/edit&id=<?=$product->id?>" class="button button-manage">Edit</a>
                <a href="<?=base_url?>products/delete&id=<?=$product->id?>" class="button button-manage button-red">Delete</a>
            </td>

        </tr>
    <?php endwhile; ?>
</table>