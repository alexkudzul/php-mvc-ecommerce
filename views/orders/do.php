<?php if(isset($_SESSION['user_identity'])): ?>
    <h1>Do Orders</h1>
    <p>
        <a href="<?=base_url?>cart/index">View product and price of orders</a>
    </p>
    <br>
    <h3>Direccion para el envio</h3>
    <form action="<?=base_url?>orders/add" method="POST">
        <label for="state">State</label>
        <input type="text" name="state">

        <label for="city">City</label>
        <input type="text" name="city">

        <label for="adress">Adress</label>
        <input type="text" name="adress">

        <input type="submit" value="Confirm order">
    </form>
<?php else: ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas iniciar sesion para realizar un pedido</p>
<?php endif; ?>