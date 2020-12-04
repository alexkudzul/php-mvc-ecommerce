<h1>Gestionar categorias</h1>

<a href="<?=base_url?>categories/create" class="button button-small">Create category</a>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
    </tr>
    <!-- fetch_object, Devuelve la fila actual de un conjunto de resultados como un objeto -->
    <?php while($category = $categories->fetch_object()): ?>
        <tr>
            <td><?= $category->id ?></td>
            <td><?= $category->name ?></td>
        </tr>
    <?php endwhile; ?>
</table>