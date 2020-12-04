                <h1>Productos destacados</h1>

                <!-- fetch_object, Devuelve la fila actual de un conjunto de resultados como un objeto -->
                <?php while ($product = $products->fetch_object()): ?>
                <div class="product">
                    <a href="<?=base_url?>products/show&id=<?=$product->id?>">
                        <?php if($product->image != null): ?>
                            <img src="<?=base_url?>uploads/images/<?=$product->image?>" alt="">
                        <?php else: ?>
                            <img src="<?=base_url?>assets/img/camiseta.png" alt="">
                        <?php endif; ?>

                        <h2><?=$product->name ?></h2>
                    </a>

                        <p><?=$product->price ?></p>
                    <a href="<?=base_url?>cart/add&id=<?=$product->id?>"class="button">Buy</a>
                </div>
                <?php endwhile; ?>
