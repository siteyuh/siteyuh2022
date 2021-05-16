<?php
$pageid = 'home';

include 'assets/conn.php';
$cat_sql = "SELECT * FROM `cat`";

if ($statement = $database_handler->prepare($cat_sql)) {
  $statement->execute();
  $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
  $maincontent .= '<ul class="category_images">'.PHP_EOL;
  foreach ($categories as $cat) {
    // strstr($string, '.co', true)
    $maincontent .= '<li class="cat';
    $maincontent .= $cat['categoryid'];
    $maincontent .= '"><a href="gallery.php?catid=';
    $maincontent .= $cat['categoryid'];
    $maincontent .= '"><img src="';
    $maincontent .= strstr($cat['catphotopath'], '=', true).'=s156-c';
    $maincontent .= '" alt="';
    $maincontent .= $cat['jdescribe'];
    $maincontent .= '"></a></li>'.PHP_EOL;
    $maincontent .= '';
  }
  $maincontent .= '</ul>'.PHP_EOL;
}

/* TwitterCard */
$title = 'yuhのエッチなフォトギャラリー';
$descri = 'エッチなフォトギャラリーを観てください';
$picurl = 'https://siteyuh.com/img/me.jpg';
$type = 'website';


include 'assets/tmpl.php';