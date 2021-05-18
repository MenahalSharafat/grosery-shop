<?php

include "header.php";
include "config.php";
$post_id = $_GET['id'];
$sql = "SELECT * FROM vagetables 
WHERE vagetables.id = {$post_id}";

$result = mysqli_query($conn, $sql) or die("Query Failed.");
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_assoc($result)) {
?>

<div class="container-fluid">
<div class="row">               
    <div class="col-md-6">
        <img class="single-feature-image" src="<?= $row['product_image'] ?>" alt="" />
    </div>
    <div class="col-md-6">
            <div class="card-body p-1 single-feature-detail">
                <h4 class="card-title text-center text-info"><?= $row['product_name'] ?> </h4>
                <h5 class="card-text text-center text-danger"><?= number_format($row['product_price'], 2) ?>/-Rs</h5>
                <h6 class="card-title text-justify "><?= $row['detail'] ?> </h6>
            </div>
            <div >
                                                        <form action="" class="form-submit">
                                                                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                                                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                                                                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                                                                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                                                                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                                                                <button class="single-feature-detail btn btn-info btn-block addItemBtn green-btn"style="left: 50px;"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
                                                        </form>
                                                </div>

    </div>
       
</div>
</div>
<?php
    }
} else {
    echo "<h3>NO Result Found.</h3>";
}
?>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
        $(document).ready(function() {
                $(".addItemBtn").click(function(e) {
                        e.preventDefault();
                        var $form = $(this).closest(".form-submit");
                        var pid = $form.find(".pid").val();
                        var pname = $form.find(".pname").val();
                        var pprice = $form.find(".pprice").val();
                        var pimage = $form.find(".pimage").val();
                        var pcode = $form.find(".pcode").val();

                        $.ajax({
                                url: 'action.php',
                                method: 'post',
                                data: {
                                        pid: pid,
                                        pname: pname,
                                        pprice: pprice,
                                        pimage: pimage,
                                        pcode: pcode
                                },
                                success: function(response) {
                                        $("#message").html(response);
                                        window.scrollTo(0, 0);
                                        load_cart_item_number();
                                }
                        });

                });

                load_cart_item_number();

                function load_cart_item_number() {
                        $.ajax({
                                url: 'action.php',
                                method: 'get',
                                data: {
                                        cartItem: "cart_item"
                                },
                                success: function(response) {
                                        $("#cart-item").html(response);
                                }
                        });

                }
        });
</script>

<?php
include "footer.php";
?>