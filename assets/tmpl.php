<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
include 'assets/twittercard.php'; ?>
  <title><?=$title?></title>
  <link rel="stylesheet" href="/assets/bind.css">
  <link rel="canonical" href="https://siteyuh.com<?=$_SERVER['REQUEST_URI']?>">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-7G89FV891V"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-7G89FV891V');
  </script>
</head>

<body>
  <div class="thecontent">
    <header class="sticky flex" id="global">
      <h1 class="invisible"><?=$title?></h1>
      <div class="logo"><a href="/"><img src="/assets/logo.svg" alt="site logo"></a></div>
      <div class="menu" onclick="javascript:toggle_menu()"><img src="/assets/menu.svg" alt="menu" name="menu_button"></div>
    </header>

    <main>
  
    </main>
    
    <footer>
      <p class="white small">
        Copyright All Rights Reserved.
      </p>
    </footer>
  </div>
  
  <!-- オーバーレイするメニュー -->
  <nav id="globalnav">
    <ul class="nav-container">
      <li><a href=""></a></li>
    </ul>
  </nav>
  
  <script src="/assets/main.js"></script>
</body>

</html>