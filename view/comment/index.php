
<!-- a simple view, outputing all the comments -->
<?php include "view/header.php"?>
<br>
<br>
<br>


<div class="container" style="background-color: indianred;padding-bottom: 2%;padding-top: 1%;">
    <h3 style="text-align: center;color: whitesmoke;">Product's comments</h3>
    <br>
    <div class="row">
        <div class="col">
            <ul class="list-group">
                    <li class="list-group-item">
                        <strong>
                            <?php echo $product->name;?>
                        </strong>
                        <l> | <a href="index.php?controller=comment&action=allFromUser&product_id=<?php echo $product->id; ?>">
                                View Comments
                            </a> | </l>
                        <a href="index.php?controller=product&action=delete&id=<?php echo $product->id; ?>">
                            <?php echo "Delete";?>
                        </a>
                    </li>
            </ul>
        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="container" style="background-color: lightblue; padding-bottom: 2%; padding-top: 2%;">
    <div class="row">
        <div class="col">
            <form id="commentForm" value="<?php echo $product->id; ?>" action="index.php?controller=comment&action=add&product_id=<?php echo $product->id;?>" method="POST">
                <div class="input-group mb-3">
                    <h6>Add comment to this product</h6>
                </div>
                <div class="input-group mb-3">
                    <input name = "user" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                </div>
                <div class="input-group mb-3">
                    <input name = "msg" type="text" class="form-control" placeholder="Comment" aria-label="Comment" aria-describedby="basic-addon1" required>
                </div>
                <div class="input-group mb-3">
                    <input name = "email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
                </div>
                <input class="btn btn-outline-primary" type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>

<br>
<h3 style="text-align: center;">Comments</h3>

<br style="padding-bottom: 20%">
    <div id="comments" class="container">
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
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<br>
<br>
<br>
<br>
<br>
<script>

    $(document).ready(function(){
        $("#commentForm").submit(function(e) {
            $url = $(this).attr('action');
            $.ajax({
                type: "POST",
                url: $url,
                data: $("#commentForm").serialize(), // serializes the form's elements.
                success: function(data)
                {
                    //alert(data); // show response from the php script.
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
            showComments($(this).attr('value'));
        });
    });


    function showComments($value) {
        $.get("http://localhost/webP/ex2/index.php?controller=comment&action=showAll&product_id="+$value, function (data) {
            $("#comments").html(data);
        });
    }

    function deleteCommentAJAX($event) {
        $url = $event;
        $.ajax({
            url: $url,
            success: function(response) {
                //alert(response);
            }
        });
        event.preventDefault();
        showComments($event.getAttribute('value'));
    }


</script>
<?php include "view/footer.php"?>