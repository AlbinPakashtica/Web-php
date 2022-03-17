 <?php foreach ($Products as $item): ?>
    <div class="product-box">
        <img src="<?=APP_URL?>public/assets/img/example-product.jpg" alt="image">
        <h3 class="price">$<?= $item->price?></h3>
        <p class="product-name"><?= $item->name?></p>
        <form method="get" class="product-buttons">
            <button type=”submit” value="<?= $item->id?>" name="cart-bttn" class="cart-bttn">Add to cart</button>
            <button type=”submit” value="<?= $item->id?>" class="wishlist-bttn" name="wishlist-bttn">Save🖤</button>
        </form>
    </div>
<?php endforeach; ?>

