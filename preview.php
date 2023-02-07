<?php
session_start();
if (isset($_SESSION['phone'])) {
  if (isset($_SESSION['password'])) {
  } else {
    header("location:loginpage.php");
  }
} else {
  header("location:loginpage.php");
}
?>

<?php
if (isset($_GET['id'])) {
  include "php/config.php";
  $mess_id = $_GET['id'];
  $single_record_sql = "SELECT * FROM showpost WHERE id={$mess_id}";
  $single_record_result = mysqli_query($conn, $single_record_sql);
  if (mysqli_num_rows($single_record_result)) {
    while ($single_result = mysqli_fetch_assoc($single_record_result)) {
?>
      <!DOCTYPE html>
      <html>

      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Product Card/Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="all-css/preview.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <style>
          .back_btn_div {
            display: none;
            position: absolute;
            padding: 10px 00px 00px 10px;
          }

          .back_a {
            text-decoration: none;
            color: black;
            font-size: 20px;
          }

          .img-display {
            border: 2px solid #337ab7;
          }

          .back_btn {
            display: inline-block;
            -ms-transform: rotate(20deg);
            /* IE 9 */
            transform: rotate(180deg);
          }

          @media((max-width: 600px)) {
            .back_btn_div {
              padding: 00px;
              margin: 5px 0px 00px 5px;
              text-align: center;
              z-index: +1;
              display: block;
              width: 30px;
              height: 30px;
              font-weight: bold;
              border-radius: 50%;
              background-color: white;
              box-shadow: 0px 0px 1px rgb(20, 20, 20);
            }

            .img-display {
              border: none;
            }

          }
        </style>
      </head>

      <body>

        <div class="card-wrapper">
          <!-- <div class="back_btn_div"> -->
          <!-- <a href="index.php" class="back_a"><span style="width:100%; height:100%; border-radius:50%" class="back_btn">&#x279C;</span></a>
          </div> -->
          <div class="card">
            <!-- card left -->
            <div class="product-imgs">
              <div class="img-display" style=" border-radius:5px; overflow:hidden; ">
                <div class="img-showcase" style="align-items:center; text-align: center;">



                  <?php $recive_sql = "SELECT * FROM showpost WHERE id='{$mess_id}'";
                  $result = mysqli_query($conn, $recive_sql);
                  if (mysqli_num_rows($result)) {
                    while ($image_row = mysqli_fetch_assoc($result)) {
                      $image_name = $image_row['imagename'];
                      $image_array = explode(",", $image_name);
                      foreach ($image_array as $ok) { ?>

                        <img src="mess_image/<?php echo $ok ?>" alt="mess image" style="border-radius: 5px; width: 100%; height:100%;">

                    <?php
                      }
                    }
                    ?>
                </div>
              </div>
              <div class="img-select">

                <?php
                    $number1 = 1;
                    $result1 = mysqli_query($conn, $recive_sql);
                    if (mysqli_num_rows($result1)) {
                      while ($image_row1 = mysqli_fetch_assoc($result1)) {
                        $image_name1 = $image_row1['imagename'];
                        $image_array1 = explode(",", $image_name1);
                        foreach ($image_array1 as $ok1) { ?>
                      <div class="img-item" style="width: 25%;">
                        <a href="#" data-id="<?php echo $number1; ?>">
                          <img src="mess_image/<?php echo $ok1; ?>" alt="Mess Image" style="width:100%; height:100%;">
                        </a>
                      </div>

                <?php
                          $number1++;
                        }
                      }
                    }
                ?>
              </div>
            </div><?php } ?>
          <!-- card right -->
          <div class="product-content">
            <h1 style="font-size:2rem;" class="product-title"><?php echo $single_result['messname']; ?></h1>
            <a href="#" class="product-link"><?php echo $single_result['messtype']; ?></a>
            <!-- <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div> -->

            <div class="product-price">
              <p class="last-price">Bed Price: <span style="text-decoration: none; color:blue; font-weight:bold;"><?php echo $single_result['price']; ?></span></p>
              <p class="new-price">adddress:<span style="color:black;"><?php echo $single_result['messlocation']; ?></span></p>
            </div>

            <div class="product-detail">
              <h2>about this Mess: </h2>
              <p><?php echo $single_result['messabout']; ?></p>
              <ul>
                <li>Food Facility: <span><?php echo $single_result['foodfacility']; ?></span></li>
                <li>Bed Available: <span><?php echo $single_result['bedavailable']; ?></span></li>
                <li>Bathroom: <span><?php echo $single_result['bathroom']; ?></span></li>
                <li>Contect: <span><?php echo $single_result['messcontactno']; ?></span></li>
                <li>Contect Email: <span>this12@gmail.com</span></li>
                <p><?php echo $single_result['extrafacility']; ?></p>
              </ul>
            </div>

            <div class="purchase-info">
              <button type="button" class="btn">
                <a href="https://wa.me/91<?php echo $single_result['messcontactno']; ?>" target="_blank" style="color:black; text-decoration:none; color:white; font-weight:bold;">WhatsApp</a>
              </button>
              <!-- <button type="button" class="btn">Call</button> -->
            </div>

            <!-- <div class = "social-links">
            <p>Share At: </p>
            <a href = "#">
              <i class = "fab fa-facebook-f"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-twitter"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-instagram"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-whatsapp"></i>
            </a>
            <a href = "#">
              <i class = "fab fa-pinterest"></i>
            </a>
          </div> -->
          </div>
          </div>
        </div>


        <script src="all-script/show-details.js"></script>
      </body>

      </html>
<?php
    }
  }
}
?>
<script>
  const imgs = document.querySelectorAll('.img-select a');
  const imgBtns = [...imgs];
  let imgId = 1;

  imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
      event.preventDefault();
      imgId = imgItem.dataset.id;
      slideImage();
    });
  });

  function slideImage() {
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
  }

  window.addEventListener('resize', slideImage);
</script>
<?php mysqli_close($conn); ?>