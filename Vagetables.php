<?php
include "header.php";
?>


<div class="bg2">

</div>


<div class="bg-text  " style=" left: 100px; width: 870px; position: absolute; pointer-events: none; visibility: inherit;right:170px;top: 270px;" data-aos="zoom-in-down">
        <p class="font_3 " style="text-align:right;">
                <span style="font-size:100px;">
                        <span style="color:white;font-family: Sofia;
  font-size: 92px; color:#043927;  ">
                                <span>VEGETABLES</span>
                        </span></span>
        </p>
</div>

<div style=" position: absolute; pointer-events: none; right:425px;top: 420px;" data-aos="fade-right">
        <h1 class="font_6" style="font-size:18px; text-align:center;">
                <span style="font-size:21px;">
                        <span style="font-style:italic;">
                                <span style="font-weight:bold;">
                                        <span style="color:#043927;">
                                                <span style="letter-spacing:0.35em;">we shop,we deliver you relax</span>
                                        </span>
                                </span>
                        </span>
                </span>
        </h1>
</div>




<div class="container float-up">
        <div id="message"></div>
        <div class="row mt-2 pb-3">
                <?php
                include 'config.php';
                $stmt = $conn->prepare("SELECT * FROM Vagetables");
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) :
                ?>
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                                <div class="card-deck">
                                        <div class="card p-2 border-secondary mb-2" style="top: -50px;">
                                              
                                        <a class="post-img" href="detail_V.php?id=<?php echo $row['id']; ?>"><img src="<?= $row['product_image'] ?>" class="card-img-top" height="250"></a>
                                                <div class="card-body p-1">
                                                        <h4 class="card-title text-center text-info"><?= $row['product_name'] ?> </h4>
                                                        <h5 class="card-text text-center text-danger"><?= number_format($row['product_price'], 2) ?>/-Rs</h5>

                                                </div>
                                                <a class="green-btn " href="detail_V.php?id=<?php echo $row['id']; ?>">Add to cart</a>
                                              
                                                <!-- <div class="card-footer p-1">
                                                        <form action="" class="form-submit">
                                                                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                                                                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                                                                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                                                                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                                                                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                                                                <button class="btn btn-info btn-block addItemBtn green-btn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
                                                        </form>
                                                </div> -->

                                        </div>
                                </div>

                        </div>
                <?php endwhile; ?>

        </div>

</div>

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