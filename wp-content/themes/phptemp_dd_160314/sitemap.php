<?php
$metakeywords = 'キーワード1,キーワード2,キーワード3';
$metadescription = 'サイトマップ用メタディスクリプションです。';
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
<title><?php echo "$oth_page_01"; ?> | <?php echo "$sitename_b"; ?></title>
<meta name="keywords" content="<?php echo "$metakeywords"; ?>" />
<meta name="description" content="<?php echo "$metadescription"; ?>" />
<?php include '_set/css.php' ?>
<?php include '_set/js.php' ?>
</head>
<body>

<?php include '_set/head.php' ?>

<?php include '_set/global.php' ?>

<div id="pankuzu">
<div id="plink"><a href="/"><?php echo "$pankuzu_top"; ?></a> &gt; <?php echo "$oth_page_01_linkname"; ?></div>
</div>


<div id="maincontents">

<div id="cen">

<div class="submain">
<div class="submain-ttl"><h3><?php echo "$oth_page_01_linkname"; ?></h3></div>
<div class="submain-txt">
<div class="sitemaptbl">
<ul>
<li><a href="/"><?php echo "$pankuzu_top"; ?></a></li>
<li><a href="/cate_01/"><?php echo "$cate_01_linkname"; ?></a>
<ul>
<li><a href="/cate_01/cate_01_01/"><?php echo "$cate_01_01_linkname"; ?></a></li>
</ul>
</li>
<li><a href="/cate_02/"><?php echo "$cate_02_linkname"; ?></a>
<ul>
<li><a href="/cate_02/cate_02_01/"><?php echo "$cate_02_01_linkname"; ?></a></li>
</ul>
</li>
<li><a href="/cate_03/"><?php echo "$cate_03_linkname"; ?></a>
<ul>
<li><a href="/cate_03/cate_03_01/"><?php echo "$cate_03_01_linkname"; ?></a></li>
</ul>
</li>
<li><a href="/cate_04/"><?php echo "$cate_04_linkname"; ?></a>
<ul>
<li><a href="/cate_04/cate_04_01/"><?php echo "$cate_04_01_linkname"; ?></a></li>
</ul>
</li>
<li><a href="/sitemap.php"><?php echo "$oth_page_01_linkname"; ?></a></li>
<li><a href="/privacy.php"><?php echo "$oth_page_02_linkname"; ?></a></li>
</ul>
</div>
</div>
</div>

</div>

<div id="ri">

<div class="side">
<div class="menubox">
<div class="menuboxttl"><h4>コンテンツメニュー</h4></div>
<div class="menulink">
<div class="menulink_a" id="ac"><a href="/sitemap.php"><?php echo "$oth_page_01"; ?></a></div>
<div class="menulink_a"><a href="/privacy.php"><?php echo "$oth_page_02"; ?></a></div>
</div>
</div>
</div>

</div>

</div>

<div id="foot_pan">
<div id="foot_pan_link">
<ul>
<li><a href="/"><?php echo "$pankuzu_top"; ?></a></li>
<li><?php echo "$oth_page_01_linkname"; ?></li>
</ul>
</div>
</div>

<?php include '_set/foot.php' ?>

<?php include '_set/pagetop.php' ?>

<?php include '_set/analytics.php' ?>

</body>
</html>
