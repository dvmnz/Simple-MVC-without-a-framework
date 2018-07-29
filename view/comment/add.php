<!-- a simple view returning json data -->
<?php
include "view/header.php";
echo "<h3 style=\"text-align: center;\">Comment added</h3>";
?>
<div class="container">
        <div class="row">
            <div class="col">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="index.php?controller=comment&action=allFromUser&product_id=<?php echo $product_id; ?>">
                            <?php echo "Return to the product";?>
                        </a>
                     </li>

                </ul>
            </div>
        </div>
</div>



<?php
json_encode($comment);
include "view/footer.php";
?>