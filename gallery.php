<?php
$pageid = 'gallery';

include 'assets/conn.php';

if ($_GET['eventid']) {
  # code...
  $sql = "SELECT *  FROM `event` WHERE `eventid` = ".$_GET['eventid'];

  $sql_event_member = "SELECT `eventdetail`.`detailid`, `eventdetail`.`photomember`, `eventdetail`.`phdesc` FROM `event`, `eventdetail` WHERE `eventdetail`.`eventid` = `event`.`eventid` AND `event`.`eventid` = ".$_GET['eventid'];

  if ($statement = $database_handler->prepare($sql)) {
    $statement->execute();
    
    $galleries = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($galleries as $gallery) {
      /* TwitterCard */
      $title = $gallery['eventname'].' | yuhのエッチなフォトギャラリー';
      $descri = strip_tags($gallery['description']);
      $picurl = $gallery['carousel'];
      $type = 'article';

      $maincontent = '<figure class="big_photo">';
      $maincontent .= '<img src="'.$gallery['carousel'];
      $maincontent .= '" name="photo">';
      $maincontent .= '<figcaption id="fig_caption">';
      $maincontent .= $gallery['eventname'];
      $maincontent .= '</figcaption>';
      $maincontent .= '</figure>';
    }
  }

  if ($statement = $database_handler->prepare($sql_event_member)) {
    $statement->execute();
    $members = $statement->fetchAll(PDO::FETCH_ASSOC);
    $maincontent .= '';
    $maincontent .= '<div class="member_wrapper">'.PHP_EOL;
    $maincontent .= '<ul class="event_member flex">'.PHP_EOL;
    foreach ($members as $member) {
      $maincontent .= '<li class=""><a href="javascript:thumb_click(\''.$member['photomember'].'s600-c\', \'';
      $maincontent .= $member['phdesc'];
      $maincontent .= '\')"><img src="'.$member['photomember'].'s250-c';
      $maincontent .= '" alt="'.$member['phdesc'];
      $maincontent .= '"></a></li>';
    }
    $maincontent .= '</ul>'.PHP_EOL;
    $maincontent .= '</div>'.PHP_EOL;
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
      $maincontent .= PHP_EOL.'<li><a href="';
      $maincontent .= $_SERVER['REQUEST_URI'].'&eventid=';
      $maincontent .= $category_event['eventid'];
      $maincontent .= '"><img src="'.$category_event['carousel'].'" alt=""></a></li>';
    }
    $maincontent .= '</ul></article>';
  }
}
?>
    
  

<?php

include 'assets/tmpl.php';