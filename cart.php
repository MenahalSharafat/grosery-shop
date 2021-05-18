<?php
session_start();
?>

<?php
include "header.php";
?>

<div class="container">

  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div style="display:<?php if (isset($_SESSION['showAlert'])) {
                            echo $_SESSION['showAlert'];
                          } else {
                            echo 'none';
                          }
                          unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php if (isset($_SESSION['message'])) {
                  echo $_SESSION['message'];
                }
                unset($_SESSION['showAlert']); ?></strong>
      </div>
      <div class="table-responsive mt-2">
        <table class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <td colspan="7">
                <h4 class="text-center text-info m-0">Products in your cart!</h4>
              </td>
            </tr>
            <tr>
              <th> ID</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Price/Rs</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>
                <a href="action.php?clear=all" class="badge-danger badge p-2" onclick="return confirm('Are you sure you want to clear the cart')">
                  <i class="fas fa-trash"></i>
                  &nbsp;&nbsp;Clear Cart</a></th>
            </tr>
          </thead>
          <tbody>
            <?php
            require 'config.php';
            $stmt = $conn->prepare("SELECT * FROM cart");
            $stmt->execute();
            $result = $stmt->get_result();
            $grand_total = 0;
            while ($row = $result->fetch_assoc()) :

            ?>

              <tr>
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="<?= $row['product_image'] ?>" width="100"></td>
                <td><?= $row['product_name'] ?></td>
                <td><?= number_format($row['product_price'], 2) ?>/kg</td>
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;"></td>
                <td><?= number_format($row['total_price'], 2); ?>/-Rs</td>
                <td>
                  <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure you want to remove this item');"><i class="fas fa-trash-alt"></i></a>

                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
            <?php endwhile; ?>
            <tr>
              <td colspan="3">
                <a href="Fruits.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp; Continue Shopping</a>
              </td>
              <td colspan="2"><b>Grand Total</b>
              </td>
              <td><b><?= number_format($grand_total, 2); ?>/-Rs</b></td>
              <td>
                <a href="checkout.php" class="btn btn-info <?= ($grand_total > 1) ? "" : "disabled"; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;checkout</a>
              </td>
            </tr>
          </tbody>


        </table>
      </div>
    </div>

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

    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');
      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
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