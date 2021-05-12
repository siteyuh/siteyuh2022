<?php
$pageid = 'gallery';

include 'assets/conn.php';

if ($_GET['eventid']) {
  # code...
  $sql = "SELECT *  FROM `event` WHERE `eventid` = ".$_GET['eventid'];
  
  if ($statement = $database_handler->prepare($sql)) {
    $statement->execute();
    
    $galleries = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($galleries as $gallery) {
      /* TwitterCard */
      $title = $gallery['eventname'].' | yuhのエッチなフォトギャラリー';
      $descri = $gallery['description'];
      $picurl = $gallery['carousel'];
      $type = 'article';
    }
  }
} else {
  # code...
  $sql_select_cat = "SELECT * FROM `category` WHERE `category`.`categoryid` = ".$_GET['catid'];
  $sql_select_events = "SELECT `event`.`eventid`,  `category`.`jname`, `event`.`eventname`,`event`.`description`,`event`.`carousel` ";
  $sql_select_events .= "FROM `event`,`category`,`associate` WHERE `category`.`categoryid` = `associate`.`categoryid` ";
  $sql_select_events .= "AND `associate`.`eventid` = `event`.`eventid` AND `category`.`categoryid` = ".$_GET['catid'];
  
  if ($statement = $database_handler->prepare($sql_select_cat)) {
    $statement->execute();

    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($categories as $category) {
      /* TwitterCard */
      $title = $category['jname'].' | yuhのエッチなフォトギャラリー';
      $descri = $category['jdescribe'];
      $picurl = 'https://siteyuh.com'.$category['catphotopath'];
      $type = 'article';

    }
  }
  if ($statement = $database_handler->prepare($sql_select_events)) {
    $statement->execute();
    $maincontent = <<< EOM
<article class="gallery">
<div class="wrapper"><h2 class="title">{$category['jname']}</h2></div>
<ul class="grid">
EOM;
    $category_events = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($category_events as $category_event) {
      $maincontent .= PHP_EOL.'<li><img src="'.$category_event['carousel'].'" alt=""></li>';
    }
    $maincontent .= '</ul></article>';
  }
}
?>

<?php

include 'assets/tmpl.php';