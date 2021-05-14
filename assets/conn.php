<?php
/* 
参考サイト
https://codelikes.com/php-pdo/#toc10
*/
$host = 'localhost';
$username = '';
$passwd = '';
$dbname = '';

//DBに接続
try {   
  $database_handler = new PDO('mysql:host='.$host.':3306;dbname='.$dbname.';charset=utf8mb4', $username, $passwd);
}   
catch (PDOException $e) {   
  /* echo "DB接続に失敗しました。\n";
  echo $e->getMessage() . "\n"; */
  exit;
}   

// echo "OK.\n";
