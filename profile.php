<?php
$pageid = 'profile';

/* TwitterCard */
$title = 'プロフィール | yuhのエッチなフォトギャラリー';
$descri = 'エッチなフォトギャラリーを観てください';
$picurl = 'https://siteyuh.com/img/me.jpg';
$type = 'article';

/* Profile */
$result = file('https://docs.google.com/spreadsheets/d/e/2PACX-1vTKfVLlme4Bx3K6eNLEqcX-ahJwvbIdOFKJPH_q5oyAEFq3O10TCqpFKIjVcwbxPa1qEGyr378DBhil/pub?output=csv');
for ( $i = 1; $i < sizeof( $result ); $i++ ) {
  list($head, $detail) = explode( ",", $result[ $i ] );
  $profile_data .= '<div class="item"><h3 class="head">'.$head.'</h3>'.PHP_EOL.'<ul class="detail"><li>'.str_replace(' ', '</li><li>', $detail).'</ul></div>'.PHP_EOL;
}
// var_dump ($profile_data);

/* contact */
?>

<?php

$maincontent = <<< EOM
<section id="profile">
<h2 class="title">プロフィール</h2>
$profile_data
</section>
<section id="contact">
<h2 class="title">yuhと交流する</h2>
$contact_data
<p><a href="https://twitter.com/siteyuh">ツイッター</a>や<a href="https://instagram.com/siteyuh03">インスタグラム</a>ではDMを解放しています。</p>
</section>
EOM;


include 'assets/tmpl.php';