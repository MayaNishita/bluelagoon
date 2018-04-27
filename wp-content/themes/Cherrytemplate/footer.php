<?php
/**
 * The footer for our theme.
 *
 */

?>
<?php wp_footer(); ?>
<h2><span>Instagram</span></h2>
<section id="insta">
  <!-- SnapWidget -->
<!-- SnapWidget -->
<script src="https://snapwidget.com/js/snapwidget.js"></script>
<iframe src="https://snapwidget.com/embed/532013" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%; "></iframe>
</section>
<footer>
<div id="footer">

        <h4>Cherry's Company , Inc.</h4>
    <p>1-2-4 Sekimachikita, Nerimaku, Tokyo<br />
              03-6767-8803<br />
              OPEN 10:00~19:00</p>
     <?php
      wp_nav_menu( array(
        'theme_location' => 'global',
        'container'      => 'div',
        'depth'          => 1,
      ) );
      ?>
    <address>Copyright 2017 cherryscompany. All Rights Reserved.</address>
  </div>
</footer>

</body>
</html>
