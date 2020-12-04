<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>

    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- CONTAINER -->
    <div id="container">
        <!-- HEADER -->
        <header id="header">
            <div id="logo">
                <img src="assets/img/adidas-logo.jpg" alt="Logo">
                <a href="index.php">
                    Online Store
                </a>
            </div>
        </header>
        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Categoria 1</a>
                </li>
                <li>
                    <a href="#">Categoria 2</a>
                </li>
                <li>
                    <a href="#">Categoria 3</a>
                </li>
                <li>
                    <a href="#">Categoria 4</a>
                </li>
                <li>
                    <a href="#">Categoria 5</a>
                </li>
                <li>
                    <a href="#">Contacto</a>
                </li>
            </ul>
        </nav>
        <!-- Content -->
        <div id="content">
            <!-- SIDEBAR -->
            <aside id="sidebar">
                <div id="login" class="block_aside">
                    <h3>Login</h3>
                    <form action="#" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email">

                        <label for="password">Password</label>
                        <input type="password" name="password">

                        <input type="submit" value="Login">
                    </form>
                    <ul>
                        <li>
                            <a href="#">My Orders</a>
                        </li>
                        <li>
                           <a href="#">Manage Orders</a>
                        </li>
                        <li>
                            <a href="#">Manage Categories</a>
                        </li>
                    </ul>
                </div>
            </aside> <!--Fin Sidebar-->

            <!-- CONTENT CENTRAL -->
            <div id="central">
                <h1>Productos destacados</h1>
                <div class="product">
                    <img src="assets/img/adidas1.jpg" alt="">
                    <h2>Producto 1</h2>
                    <p>$10 US</p>
                    <a href=""class="button">Buy</a>
                </div>
                <div class="product">
                    <img src="assets/img/adidas2.jpg" alt="">
                    <h2>Producto 2</h2>
                    <p>$10 US</p>
                    <a href=""class="button">Buy</a>
                </div>
                <div class="product">
                    <img src="assets/img/adidas3.jpg" alt="">
                    <h2>Producto 3</h2>
                    <p>$10 US</p>
                    <a href=""class="button">Buy</a>
                </div>
                <div class="product">
                    <img src="assets/img/adidas1.jpg" alt="">
                    <h2>Producto 1</h2>
                    <p>$10 US</p>
                    <a href=""class="button">Buy</a>
                </div>
                <div class="product">
                    <img src="assets/img/adidas2.jpg" alt="">
                    <h2>Producto 2</h2>
                    <p>$10 US</p>
                    <a href=""class="button">Buy</a>
                </div>
                <div class="product">
                    <img src="assets/img/adidas3.jpg" alt="">
                    <h2>Producto 3</h2>
                    <p>$10 US</p>
                    <a href=""class="button">Buy</a>
                </div>
            </div> <!--Fin Central-->
        </div> <!--Fin Content-->

        <!-- FOOTER -->
        <footer id="footer">
            <p>Desarrollado por Alex Ku Dzul &copy; <?=date('Y')?></p>
        </footer>
    </div>
</body>
</html>