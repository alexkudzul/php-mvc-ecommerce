<?php if(isset($edit) && isset($productOne) && is_object($productOne)): ?>
    <h1>Edit product <?=$productOne->name?></h1>
    <?php $url_action = base_url."products/save&id=".$productOne->id; ?>
<?php else: ?>
    <h1>Create new product</h1>
    <?php $url_action = base_url."products/save"; ?>
<?php endif; ?>

<div class="form_container">
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?=isset($productOne) && is_object($productOne) ? $productOne->name : ''; ?>">
        <label for="description">Description</label>
        <textarea name="description" id="" cols="30" rows="10"><?= isset($productOne) && is_object($productOne) ? $productOne->description : ''; ?></textarea>
        <label for="price">Price</label>
        <input type="text" name="price" value="<?=isset($productOne) && is_object($productOne) ? $productOne->price : '';?>">
        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=isset($productOne) && is_object($productOne) ? $productOne->stock : '';?>">

        <label for="category">Category</label>

        <?php $categories = Helpers::showCategories(); ?>

        <select name="category" id="">
            <?php while($category = $categories->fetch_object()): ?>
            <option value="<?=$category->id?>" <?=isset($productOne) && is_object($productOne) && $category->id == $productOne->category_id ? 'selected' : '';?>>
                <?= $category->name ?>
            </option>
            <?php endwhile; ?>
        </select>

        <label for="image">Image</label>
        <?php if(isset($productOne) && is_object($productOne) && !empty($productOne->image)) : ?>
            <img src="<?=base_url?>uploads/images/<?=$productOne->image?>" class="thumb" alt="">
        <?php endif; ?>
        <input type="file" name="image">

        <input type="submit" value="Save">
    </form>
</div>