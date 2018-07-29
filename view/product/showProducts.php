
    <div class="row">
        <div class="col">
            <ul class="list-group">
                <?php foreach ($products as $product) {?>
                    <li class="list-group-item">
                        <strong>
                            <?php echo $product->name;?>
                        </strong>
                        <l> | <a href="index.php?controller=comment&action=allFromUser&product_id=<?php echo $product->id; ?>">
                                View Comments
                            </a> | </l>
                        <a href="index.php?controller=product&action=delete&id=<?php echo $product->id; ?>" onclick="deleteProductAJAX(this)">
                            <?php echo "Delete";?>
                        </a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>
