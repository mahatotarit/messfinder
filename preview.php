<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Card/Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="all-css/preview.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  </head>
  <body>
    
    <div class = "card-wrapper">
      <div class = "card">
        <!-- card left -->
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src = "assets/image/shoe_1.jpg" alt = "shoe image">
              <img src = "assets/image/shoe_2.jpg" alt = "shoe image">
              <img src = "assets/image/shoe_3.jpg" alt = "shoe image">
              <img src = "assets/image/shoe_4.jpg" alt = "shoe image">
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src = "assets/image/shoe_1.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src = "assets/image/shoe_2.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
                <img src = "assets/image/shoe_3.jpg" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
                <img src = "assets/image/shoe_4.jpg" alt = "shoe image">
              </a>
            </div>
          </div>
        </div>


        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title">Mess Name</h2>
          <a href = "#" class = "product-link">Boys</a>
          <!-- <div class = "product-rating">
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star"></i>
            <i class = "fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
          </div> -->

          <div class = "product-price">
            <p class = "last-price">Bed Price:<span style="text-decoration: none; color:blue; font-weight:bold;"> 7876</span></p>
            <p class = "new-price">adddress:<span style="color:black;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae, placeat.</span></p>
          </div>

          <div class = "product-detail">
            <h2>about this Mess: </h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo esa!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicinggnissimos, labore suscipit. Unde.</p>
            <ul>
              <li>Food Facility: <span>Yes / No</span></li>
              <li>Bed Available: <span>Yes /  No</span></li>
              <li>Bathroom: <span>Yes / No</span></li>
              <li>Contect: <span>8765456787</span></li>
              <li>Contect Email: <span>this12@gmail.com</span></li>
            </ul>
          </div>

          <div class = "purchase-info">
            <button type = "button" class = "btn">
            WhatsApp
            </button>
            <button type = "button" class = "btn">Call</button>
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

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);
</script>