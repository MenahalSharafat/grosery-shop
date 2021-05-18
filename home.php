<?php
include "header.php";
?>


<!---------------------content-------------------------->
<div class="bg">

</div>


<div class="bg-text  " style=" left: 300px; width: 870px; position: absolute; pointer-events: none; visibility: inherit;right:170px;top: 270px;" data-aos="zoom-in-down">
  <p class="font_3 " style="text-align:right;">
    <span style="font-size:100px;">
      <span style="color:white;font-family: Sofia;
  font-size: 92px; color:#043927;  ">
        <span>VEGETARIO</span>
      </span></span>
  </p>
</div>

<div style=" position: absolute; pointer-events: none; right:205px;top: 420px;" data-aos="fade-right">
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


<!--------------------cards------------------------>
<div class="container-fluid card1">
  <div class="row" data-aos="fade-down" data-aos-easing="linear">
    <div class="col-sm-4">
      <div class="card-deck ">
        <div class="card">
          <img src="pics/cc.jpg" class="card-img-top pic" alt="pics/cc.jpg">
          <div class="card-body">
            <h5 class="card-title">Delivered at your Doorstep</h5>
            <p class="card-text">Don't worry we are here to help you in your busy lifes.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-4 ">
      <div class="card">
        <img src="pics/454.jpeg" class="card-img-top pic" alt="pics/454.jpeg">
        <div class="card-body">
          <h5 class="card-title">Hand Picked</h5>
          <p class="card-text">We do pick and pack your order by our hands. <br> <br> </p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <video controls src="pics/6  Raw Vegetables.mp4" class="card-img-top pic" alt="pics/6  Raw Vegetables.mp4"></video>
        <div class="card-body">
          <h5 class="card-title">Fresh</h5>
          <p class="card-text">Fresh fruits and vegetables as you want. <br> <br>

          </p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!----------------------------------about------------------------------------------->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <img data-aos="fade-up" data-aos-duration="3000" id="id" src="pics/cont2.jpg" width="100%">
      <div class="1">
        <div class="  text" style="     margin-bottom: 0px;   ">

          <div class="strc1" id="comp-iz87le3w" style="   position: relative;">

            <div class="strc1inlineContent" style="width: 100%; position: absolute;  ">



              <div class="txtNew" style="left: 130px; width: 402px; position: absolute; pointer-events: none; top: -550px;  color:black;">
                <h2 class="font_6" style="text-align:center;"><span style="letter-spacing:0.45em;">ABOUT US</span></h2>
              </div>
              <div class="style-jneje1l5" style="transform-origin: center 2px;  width: 29px; position: absolute; top: 127px; height: 5px;">
              </div>
              <div class="txtNew" style="left: 60px; width: 659px; position: absolute; pointer-events: none; top: -500px; color:black;">
                <p data-aos="fade-up" data-aos-duration="3000" class="font_8" style="line-height:1.6em; text-align:center;">
                  Welcome to <i>VEGETARIO</i>, a platform which will provide you easiest way to buy freash fruits and vegetables online. What you have to do, is only order the fruits and vegetables that you want and will deliver it at your doorstep.
                  You can order online, while pay cash on delivery.We provide best quality fruits and vegetables, which are hand picked just for you. </p>



                <p data-aos="fade-up" data-aos-duration="3000" class="font_8 font-black" style="line-height:1.6em; text-align:center;"> We value what has historically been disregarded with supermarkets. Saving your time and money, helping you discover and cook fresh, locally sourced, wholesome food, and a commitment to this planet that our food grows in. We are not new, having born experience in farming officially engineered in food processing. Currently supervising our own agro farms. We are delivering farms fresh fruits, vegetables, meat, dry fruits, spices and pulses in one click.
                </p>

              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!------------------------------shop button---------------------------------------------------------------->

    <button data-aos="fade-up" data-aos-duration="3000" class="btn btn-outline-secondary dropdown-toggle dbutton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop Now</button>
    <div class="dropdown-menu">
      
      <a class="dropdown-item" href="Fruits.php">Fruits</a>
      <a class="dropdown-item" href="Vagetables.php">Vegetables</a>
     
    </div>


<!------------------------------footer---------------------------------------------------------------->

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