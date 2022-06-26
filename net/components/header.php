<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>header</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="../css/header1.css">
</head>

<body>
  <header class="header-container">
    <div class="header">
      <div class="logo-img">
        <a href="#home" class="logo">
          <img src="../images/icons/logo-1.png" alt="">
          <p>yatri <br> cafe</p>
        </a>
      </div>


      <nav class="navbar">
        <a href="#home">home</a>
        <a id="about-tag" href="#about">about</a>
        <a id="menu-tag" href="#menu">menu</a>
        <a id="review-tag" href="#review">review</a>
        <a id="contact-tag" href="#contact">contact</a>
        <div class="nav-icon" id="nav-icon">
          <div class="fas fa-adjust" id="mode"></div>
          <a href="#reservation">
            <div class="fas fa-book" id="book-btn"></div>
          </a>
          <div class="fas fa-search" id="search-btn"></div>
          <!-- <div class="fas fa-user-alt" id="user-btn"></div> -->

        </div>


      </nav>

      <div class="icons">
        <div class="fas fa-search" title="search" id="search-btn1"></div>
        <div class="fas fa-shopping-cart" title="Goto Cart" id="cart-btn"></div>
        <a href="">
          <div class="fas fa-book" title="Book A Table" id="book-btn"></div>
        </a>
        <div class="fas fa-adjust" title="change mode" id="mode1"></div>
        <a href="login.php">
          <div class="fas fa-user" title="sign in" id="signin"></div>
        </a>
        <div class="fas fa-bars" title="menu" id="menu-btn"></div>


        <!-- <div class="fas fa-sun" id="mode1"></div> -->
        <!-- <div class="fas fa-user-alt" id="user"></div> -->

      </div>

      <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
      </div>
    </div>
  </header>

  
</body>
<script>
  let navbar = document.querySelector('.navbar');

  document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
  }

  let searchForm = document.querySelector('.search-form');

  document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
  }

  let searchForm1 = document.querySelector('.search-form');

  document.querySelector('#search-btn1').onclick = () => {
    searchForm1.classList.toggle('active');
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
  }



  window.onscroll = () => {
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
  }

  var icon = document.getElementById('mode');
  icon.onclick = function() {
    document.body.classList.toggle("dark-mode");
  }

  var icon1 = document.getElementById('mode1');
  icon1.onclick = function() {
    document.body.classList.toggle("dark-mode");

  }
</script>

</html>