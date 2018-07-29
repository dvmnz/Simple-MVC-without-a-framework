<div class="row">
    <div class="col">
        <ul class="list-group">
            <?php foreach ($comments as $comment) {?>
                <li class="list-group-item">
                    <strong>
                        <?php echo $comment->nickname;?>
                    </strong>
                    <l> | <?php echo $comment->message;?> | </l>

                    <a value="<?php echo $comment->product_id;?>" href="index.php?controller=comment&action=delete&id=<?php echo $comment->id; ?>" onclick="deleteCommentAJAX(this)">
                        <?php echo "Delete";?>
                    </a>
                </li>
            <?php}?>
        </ul>
    </div>
</div>