<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>

    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
</head>
<body>
    <!-- CONTAINER -->
    <div id="container">
        <!-- HEADER -->
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>assets/img/adidas-logo.png" alt="Logo">
                <a href="<?=base_url?>">
                    <!-- Online Store -->
                </a>
            </div>
        </header>
        <!-- MENU -->
        <?php $categories = Helpers::showCategories(); ?>
        <nav id="menu">
            <ul>
                <li><a href="<?=base_url?>">Inicio</a></li>

                <!-- fetch_object, Devuelve la fila actual de un conjunto de resultados como un objeto -->
                <?php while($category = $categories->fetch_object()): ?>

                <li><a href="<?=base_url?>categories/show&id=<?=$category->id?>"><?= $category->name ?></a></li>

                <?php endwhile; ?>
            </ul>
        </nav>
        <!-- Content -->
        <div id="content">