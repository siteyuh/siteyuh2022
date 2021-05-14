<?php

include 'conn.php';

$cat_sql = "SELECT * FROM `category`";

/* 
categoryid
jname
ename
jdescribe
edescribe
catphotopath */

if ($statement = $database_handler->prepare($cat_sql)) {
  $statement->execute();
  $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
  foreach ($categories as $cat) {
    $catid = $cat['categoryid'];
    $catname = $cat['jname'];
    $descri = $cat['jdescribe'];
    $catphoto = $cat['catphotopath'];
    echo '<li><a href="';
    echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].'/gallery.php?catid='.$catid;
    echo '"><img class="nav_cat" src="https://siteyuh.com'.$catphoto.'" title="'.$descri;
    echo '" alt="'.$catname.'"><span class="cat_title">'.$cat['ename'].'</span></a></li>';
  }
}