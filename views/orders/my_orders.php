
<?php if(isset($manage)) : ?>
    <h1>Manage Orders</h1>
<?php else: ?>
    <h1>My Orders</h1>
<?php endif; ?>



<table>
    <tr>
        <th>N° Order</th>
        <th>Cost</th>
        <th>Date</th>
        <th>Status</th>
    </tr>

    <?php
        while($order = $orders->fetch_object()):?>
        <tr>
            <td>
               <a href="<?=base_url?>orders/detail&id=<?=$order->id?>"><?=$order->id?></a>
            </td>
            <td>
                $<?=$order->cost?>
            </td>
            <td>
                <?=$order->date?>
            </td>
            <td>
                <?=Helpers::showStatus($order->status)?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
