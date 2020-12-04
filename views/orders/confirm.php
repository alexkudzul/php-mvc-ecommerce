<?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'completed') : ?>

    <h1>Tu pedido se ha confirmado</h1>
    <p>Pedido exitoso, realiza el pago a la cuenta 5555 5555 5555 5555 </p>
    <br>

    <?php if (isset($order)) : ?>
        <h3>Datos del pedido:</h3>
        Numero de pedido: <?= $order->id ?> <br>
        Total a pagar: $<?= $order->cost ?> <br>
        Productos:
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Units</th>
            </tr>
            <?php while ($product = $products->fetch_object()) : ?>
                <tr>
                    <td>
                        <?php if ($product->image != null) : ?>
                            <img src="<?= base_url ?>uploads/images/<?= $product->image ?>" alt="" class="img_cart">
                        <?php else : ?>
                            <img src="<?= base_url ?>assets/img/camiseta.png" alt="" class="img_cart">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url ?>products/show&id=<?= $product->id ?>">

                            <?= $product->name ?>

                        </a>
                    </td>
                    <td>
                        <?= $product->price ?>
                    </td>
                    <td>
                        <?= $product->units_order ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>

<?php elseif ((isset($_SESSION['order']) && $_SESSION['order'] == 'completed')) : ?>
    <h1>Tu pedido no ha podido procesarse </h1>
<?php endif; ?>