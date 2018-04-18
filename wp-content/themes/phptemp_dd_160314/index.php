<?php
$metakeywords = 'キーワード1,キーワード2,キーワード3';
$metadescription = 'メタディスクリプションです。';
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
<title><?php echo "$sitename_a"; ?> - 香り高いコーヒーを厳選しています！</title>
<meta name="keywords" content="<?php echo "$metakeywords"; ?>" />
<meta name="description" content="<?php echo "$metadescription"; ?>" />
/*<?php include '_set/css.php' ?>
<?php include '_set/js.php' ?>*/
<link href="<?php echo get_template_directory_uri(); ?>/_set/css.php" />
<link href="<?php echo get_template_directory_uri(); ?>/_set/js.php" />
</head>
<body>

<?php include '_set/head.php' ?>

<?php include '_set/global.php' ?>

<div id="pankuzu">
<div id="plink"><a href="/"><?php echo "$pankuzu_top"; ?></a></div>
</div>

<div id="mainbg">
<div id="main"><div>キャッチコピーを入れましょう</div></div>
</div>


<div id="maincontents">


<div class="topmain">
<div class="topmain-ttl"><h2>最も言いたいことを書いてください</h2></div>
<div class="topmain-txt">
<div class="topmain-img-l"><img src="/img/testimg.gif" alt="画像です。" /></div>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
</div>
</div>


<div class="topmain">
<div class="topmain-img"><img src="/img/test-w.gif" alt="画像です。" /></div>
</div>


<div class="topmain">
<div class="topmain-ttl"><h3>あなたが決めるコンテンツです</h3></div>
<div class="topmain-txt">
<div class="topmain-img-r"><img src="/img/testimg.gif" alt="画像です。" /></div>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
<p>
テキストです。テキストです。テキストです。テキストです。テキストです。
</p>
</div>
</div>


</div>

<div id="foot_pan">
<div id="foot_pan_link">
<ul>
<li><?php echo "$pankuzu_top"; ?></li>
</ul>
</div>
</div>

<?php include '_set/foot.php' ?>

<?php include '_set/pagetop.php' ?>

<?php include '_set/analytics.php' ?>

</body>
</html>
