<div id="globalbg">
<div id="nav" role="navigation">
<a href="#nav" title="Show navigation">Show navigation</a>
<a href="#" title="Hide navigation">Hide navigation</a>
<ul class="clearfix">
<li><a href="/"><?php echo "$pankuzu_top"; ?></a>
</li>
<li><a href="/cate_01/" aria-haspopup="true"><span><?php echo "$cate_01_linkname"; ?></span></a>
<ul>
<li><a href="/cate_01/cate_01_01/"><?php echo "$cate_01_01_linkname"; ?></a></li>
</ul>
</li>
<li><a href="/cate_02/" aria-haspopup="true"><span><?php echo "$cate_02_linkname"; ?></span></a>
<ul>
<li><a href="/cate_02/cate_02_01/"><?php echo "$cate_02_01_linkname"; ?></a></li>
</ul>
</li>
<li><a href="/cate_03/" aria-haspopup="true"><span><?php echo "$cate_03_linkname"; ?></span></a>
<ul>
<li><a href="/cate_03/cate_03_01/"><?php echo "$cate_03_01_linkname"; ?></a></li>
</ul>
</li>
<li><a href="/cate_04/" aria-haspopup="true"><span><?php echo "$cate_04_linkname"; ?></span></a>
<ul>
<li><a href="/cate_04/cate_04_01/"><?php echo "$cate_04_01_linkname"; ?></a></li>
</ul>
</li>
</ul>
</div>

<script src="/js/jquery.2.1.3.min.js"></script>
<script src="/js/doubletaptogo.js"></script>
<script>
$( function() {
	$( '#nav li:has(ul)' ).doubleTapToGo();
});
</script>

</div>
