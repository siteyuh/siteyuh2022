<?php
if ($pageid == 'gallery') {
  # gallery page's twitter card
  $title = '';
  $descri = '';
  $picurl = '';
  $type = 'article';
} else {
  # homepage's or other twitter card
  $title = '';
  $descri = '';
  $picurl = '';
  $type = 'website';
}
$selfurl = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

echo '<meta name="twitter:card" content="summary">'.PHP_EOL;
echo '<meta name="twitter:site" content="@siteyuh">'.PHP_EOL;
echo '<meta property="og:url" content="'.$selfurl.'">'.PHP_EOL;
echo '<meta property="og:title" content="'.$title.'">'.PHP_EOL;
echo '<meta property="og:description" content="'.$descri.'">'.PHP_EOL;
echo '<meta property="og:image" content="'.$picurl.'">'.PHP_EOL;
echo '<meta property="og:type" content="'.$type.'">'.PHP_EOL;
