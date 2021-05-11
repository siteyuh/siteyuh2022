<?php
include 'assets/conn.php';

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
$pageid = 'gallery';
include 'assets/tmpl.php';