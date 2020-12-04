
            <!-- SIDEBAR -->
            <aside id="sidebar">
                <div id="cart" class="block_aside">
                    <h3>My Cart</h3>
                    <ul>
                        <?php $stats = Helpers::statsCart(); ?>
                        <li><a href="<?=base_url?>cart/index">Products (<?=$stats['count']?>)</a></li>

                        <li><a href="<?=base_url?>cart/index">Total: $<?=$stats['total']?></a></li>

                        <li><a href="<?=base_url?>cart/index">View Cart</a></li>
                    </ul>
                </div>

                <div id="login" class="block_aside">
                    <?php if(!isset($_SESSION['user_identity'])): ?>
                    <h3>Login</h3>
                    <form action="<?=base_url?>/users/login" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">

                        <label for="password">Password</label>
                        <input type="password" name="password">

                        <input type="submit" value="Login">
                    </form>
                    <?php else: ?>
                        <h3><?=$_SESSION['user_identity']->name?> <?=$_SESSION['user_identity']->lastname?></h3>
                    <?php endif; ?>
                    <ul>

                        <?php if(isset($_SESSION['admin'])): ?>
                        <li><a href="<?=base_url?>categories/index">Manage categories</a></li>
                        <li><a href="<?=base_url?>products/manage">Manage Products</a></li>
                        <li><a href="<?=base_url?>orders/manage">Manage Orders</a></li>
                        <?php endif;?>

                        <?php if(isset($_SESSION['user_identity'])):?>
                        <li><a href="<?=base_url?>orders/my_orders">My Orders</a></li>
                        <li><a href="<?=base_url?>users/logout">Logout</a></li>

                        <?php else: ?>
                        <li><a href="<?=base_url?>users/register">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </aside> <!--Fin Sidebar-->

            <!-- CONTENT CENTRAL -->
            <div id="central">
