<?php
$pagedisc = 'そのページで最も重要なキャッチ';
$footdisc = 'フッターにページのサブキャッチ的な・・・。<br />全ページ共通していません。';
require_once('_set/_init.inc');
?><?php include '_set/moji.php' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php echo "$moji"; ?>" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />
<title><?php echo "$not_found"; ?> | <?php echo "$sitename_a"; ?></title>
<?php include '_set/css.php' ?>
</head>
<body>

<?php include '_set/head.php' ?>

<?php include '_set/global.php' ?>

<div id="pankuzu">
<div id="plink"><a href="/"><?php echo "$pankuzu_top"; ?></a> &gt; <?php echo "$not_found"; ?></div>
</div>


<div id="maincontents">

<div class="topmain">
<div class="topmain-ttl"><h2><?php echo "$not_found"; ?></h2></div>
<div class="topmain-txt">
<p>ページが見つかりません。<br />誠に申し訳ございませんが、トップページに戻るかサイトマップから再度アクセスしてみてください。</p>
</div>
</div>

</div>

<div id="foot_pan">
<div id="foot_pan_link">
<ul>
<li><a href="/"><?php echo "$pankuzu_top"; ?></a></li>
<li><?php echo "$not_found"; ?></li>
</ul>
</div>
</div>

<?php include '_set/foot.php' ?>

<?php include '_set/analytics.php' ?>

</body>
</html>
