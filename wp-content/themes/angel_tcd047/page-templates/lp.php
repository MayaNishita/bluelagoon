<?php
/*
Template Name: Landing page
*/
__( 'Landing page', 'tcd-w' );
?>
<?php
	get_header();
	$options = get_desing_plus_option();
?>

<?php get_template_part( 'breadcrumb' ); ?>

<div id="main_col" class="clearfix">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <article id="article">

  <div class="post_content clearfix">

<?php
	$lp_builder = get_post_meta( get_the_ID(), 'lp_builder', true );
	if ( ! empty( $lp_builder ) && is_array( $lp_builder ) ) :
		foreach( $lp_builder as $lpb_key => $lpb_content ) :
			$lpb_index = 'lpb_' . $lpb_key;

			if ( empty( $lpb_content['lpb_content_select'] ) ) :
				continue;

			// キャッチフレーズと説明文
			elseif ( $lpb_content['lpb_content_select'] == 'catch_and_desc' ) :
				if ( $lpb_content['lpb_catch_and_desc_headline'] || $lpb_content['lpb_catch_and_desc_desc'] ) :
?>
   <div id="<?php echo esc_attr( $lpb_index ); ?>" class="lpb_content lpb_content-<?php echo esc_attr( $lpb_content['lpb_content_select'] ); ?>">
<?php
					if ( $lpb_content['lpb_catch_and_desc_headline'] ) :
						$catch_style = 'color:#' . $lpb_content['lpb_catch_and_desc_headline_color'] . ';';
						if ( !is_mobile() ) :
							$catch_style .= 'font-size:' . $lpb_content['lpb_catch_and_desc_headline_font_size'] . 'px;';
						else :
							$catch_style .= 'font-size:' . $lpb_content['lpb_catch_and_desc_headline_font_size_mobile'] . 'px;';
						endif;
?>
    <h2 class="lpb_font_family_<?php echo esc_attr( $lpb_content['lpb_catch_and_desc_headline_font_family'] ); ?>" style="<?php echo esc_attr( $catch_style ); ?>"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $lpb_content['lpb_catch_and_desc_headline'] ) ); ?></h2>
<?php
					endif;
					if ( $lpb_content['lpb_catch_and_desc_desc'] ) :
						$desc_style = '';
						if ( !is_mobile() ) :
							$desc_style .= 'font-size:' . $lpb_content['lpb_catch_and_desc_desc_font_size'] . 'px;';
						else :
							$desc_style .= 'font-size:' . $lpb_content['lpb_catch_and_desc_desc_font_size_mobile'] . 'px;';
						endif;
?>
    <p class="lpb_font_family_<?php echo esc_attr( $lpb_content['lpb_catch_and_desc_desc_font_family'] ); ?>" style="<?php echo esc_attr( $desc_style ); ?>"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', $lpb_content['lpb_catch_and_desc_desc'] ); ?></p>
<?php
					endif;
?>
   </div>

<?php
				endif;

			// 画像
			elseif ( $lpb_content['lpb_content_select'] == 'image' ) :
				$image = wp_get_attachment_image_src( $lpb_content['lpb_image_image'], 'full' );
				if ( ! empty( $image[0] ) ) :
?>
   <div id="<?php echo esc_attr( $lpb_index ); ?>" class="lpb_content lpb_content-<?php echo esc_attr( $lpb_content['lpb_content_select'] ); ?>">
    <img src="<?php echo esc_attr( $image[0] ); ?>" alt="">
<?php
					if ( $lpb_content['lpb_image_show_caption'] && ( $lpb_content['lpb_image_catch'] || $lpb_content['lpb_image_catch2'] ) ) :
?>
    <div class="lpb_image_caption">
<?php
						if ( $lpb_content['lpb_image_catch'] ) :
							$catch_style = 'color:#' . $lpb_content['lpb_image_catch_color'] . ';';
							if ( !is_mobile() ) :
								$catch_style .= 'font-size:' . $lpb_content['lpb_image_catch_font_size'] . 'px;';
							else :
								$catch_style .= 'font-size:' . $lpb_content['lpb_image_catch_font_size_mobile'] . 'px;';
							endif;
							if ( $lpb_content['lpb_image_catch_shadow_a'] || $lpb_content['lpb_image_catch_shadow_b'] || $lpb_content['lpb_image_catch_shadow_c'] ) :
								$catch_style .= 'text-shadow:' . $lpb_content['lpb_image_catch_shadow_a'] . 'px ' . $lpb_content['lpb_image_catch_shadow_b'] . 'px ' . $lpb_content['lpb_image_catch_shadow_c'] . 'px #' . $lpb_content['lpb_image_catch_shadow_color'] . ';';
							endif;
?>
     <h3 class="lpb_image_caption_catchcopy lpb_font_family_<?php echo esc_attr( $lpb_content['lpb_image_catch_font_family'] ); ?>" style="<?php echo esc_attr( $catch_style ); ?>"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $lpb_content['lpb_image_catch'] ) ); ?></h3>
<?php
						endif;
						if ( $lpb_content['lpb_image_catch2'] ) :
							$catch2_style = 'color:#' . $lpb_content['lpb_image_catch2_color'] . ';';
							if ( !is_mobile() ) :
								$catch2_style .= 'font-size:' . $lpb_content['lpb_image_catch2_font_size'] . 'px;';
							else :
								$catch2_style .= 'font-size:' . $lpb_content['lpb_image_catch2_font_size_mobile'] . 'px;';
							endif;
							if ( $lpb_content['lpb_image_catch2_shadow_a'] || $lpb_content['lpb_image_catch2_shadow_b'] || $lpb_content['lpb_image_catch2_shadow_c'] ) :
								$catch2_style .= 'text-shadow:' . $lpb_content['lpb_image_catch2_shadow_a'] . 'px ' . $lpb_content['lpb_image_catch2_shadow_b'] . 'px ' . $lpb_content['lpb_image_catch2_shadow_c'] . 'px #' . $lpb_content['lpb_image_catch2_shadow_color'] . ';';
							endif;
?>
     <h4 class="lpb_image_caption_subcopy lpb_font_family_<?php echo esc_attr( $lpb_content['lpb_image_catch2_font_family'] ); ?>" style="<?php echo esc_attr( $catch2_style ); ?>"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $lpb_content['lpb_image_catch2'] ) ); ?></h4>
<?php
						endif;
?>
    </div>
<?php
					endif;
?>
   </div>
<?php
				endif;

			// 枠付きボックスコンテンツ
			elseif ( $lpb_content['lpb_content_select'] == 'border_box' ) :
				if ( $lpb_content['lpb_border_box_desc1'] || $lpb_content['lpb_border_box_desc2'] ) :
?>
   <div id="<?php echo esc_attr( $lpb_index ); ?>" class="lpb_content lpb_content-<?php echo esc_attr( $lpb_content['lpb_content_select'] ); ?>">
<?php
					if ( $lpb_content['lpb_border_box_headline'] ) :
?>
    <h3 class="lpb_content_headline"><?php echo esc_html( $lpb_content['lpb_border_box_headline'] ); ?></h3>
<?php
					endif;
					if ( $lpb_content['lpb_border_box_desc1'] && $lpb_content['lpb_border_box_desc2'] ) :
?>
    <div class="post_row">
     <p class="post_col post_col-2"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $lpb_content['lpb_border_box_desc1'] ) ); ?></p>
     <p class="post_col post_col-2"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $lpb_content['lpb_border_box_desc2'] ) ); ?></p>
    </div>
<?php
					elseif ( $lpb_content['lpb_border_box_desc1'] ) :
?>
    <p><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $lpb_content['lpb_border_box_desc1'] ) ); ?></p>

<?php
					elseif ( $lpb_content['lpb_border_box_desc2'] ) :
?>
    <p><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $lpb_content['lpb_border_box_desc2'] ) ); ?></p>
<?php
					endif;
?>
   </div>

<?php
				endif;

			// 参加者の声
			elseif ( $lpb_content['lpb_content_select'] == 'voice' ) :
				$item_count = 0;
				if ( $lpb_content['lpb_voice_items'] ) :
					foreach( $lpb_content['lpb_voice_items'] as $item ) :
						$image = wp_get_attachment_image_src( $item['image'], 'size1' );
						if ( ! empty( $image[0] ) || $item['name'] || $item['comment'] ) :
							$item_count++;
						endif;
					endforeach;
				endif;
				if ( $item_count ) :
?>
   <div id="<?php echo esc_attr( $lpb_index ); ?>" class="lpb_content lpb_content-<?php echo esc_attr( $lpb_content['lpb_content_select'] ); ?>">
<?php
					if ( $lpb_content['lpb_voice_headline'] ) :
?>
    <h3 class="lpb_content_headline"><?php echo esc_html( $lpb_content['lpb_voice_headline'] ); ?></h3>
<?php
					endif;
?>
    <ul>
<?php
					foreach( $lpb_content['lpb_voice_items'] as $item ) :
						$image = wp_get_attachment_image_src( $item['image'], 'size1' );
						if ( ! empty( $image[0] ) || $item['name'] || $item['comment'] ) :
?>
     <li>
      <div class="voice_user">
<?php
							if ( ! empty( $image[0] ) ) :
?>
       <div class="voice_user_image"><img src="<?php echo esc_attr( $image[0] ); ?>" alt=""></div>
<?php
							else :
?>
       <div class="voice_user_image noimage"></div>
<?php
							endif;
							if ( $item['name'] ) :
?>
       <p class="voice_user_name"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $item['name'] ) ); ?></p>
<?php
							endif;
?>
      </div>
      <p class="voice_comment"><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $item['comment'] ) ); ?></p>
     </li>
<?php
						endif;
					endforeach;
?>
    </ul>
   </div>

<?php
				endif;

			// 概要表
			elseif ( $lpb_content['lpb_content_select'] == 'summary_table' ) :
				$item_count = 0;
				if ( $lpb_content['lpb_summary_table_items'] ) :
					foreach( $lpb_content['lpb_summary_table_items'] as $item ) :
						if ( $item['headline'] || $item['desc'] ) :
							$item_count++;
						endif;
					endforeach;
				endif;
				if ( $item_count ) :
?>
   <div id="<?php echo esc_attr( $lpb_index ); ?>" class="lpb_content lpb_content-<?php echo esc_attr( $lpb_content['lpb_content_select'] ); ?>">
<?php
					if ( $lpb_content['lpb_summary_table_headline'] ) :
?>
    <h3 class="lpb_content_headline"><?php echo esc_html( $lpb_content['lpb_summary_table_headline'] ); ?></h3>
<?php
					endif;
?>
    <table class="lbp_table">
<?php
					foreach( $lpb_content['lpb_summary_table_items'] as $item ) :
						if ( $item['headline'] || $item['desc'] ) :
?>
     <tr>
      <th><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $item['headline'] ) ); ?></th>
      <td><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $item['desc'] ) ); ?></td>
     </tr>
<?php
						endif;
					endforeach;
?>
    </table>
   </div>

<?php
				endif;

			// アクセス
			elseif ( $lpb_content['lpb_content_select'] == 'access' ) :
				$item_count = 0;
				if ( $lpb_content['lpb_access_items'] ) :
					foreach( $lpb_content['lpb_access_items'] as $item ) :
						if ( $item['headline'] || $item['desc'] ) :
							$item_count++;
						endif;
					endforeach;
				endif;
				if ( $lpb_content['lpb_access_map_code1'] ||  $lpb_content['lpb_access_map_code2'] || $item_count ) :
?>
   <div id="<?php echo esc_attr( $lpb_index ); ?>" class="lpb_content lpb_content-<?php echo esc_attr( $lpb_content['lpb_content_select'] ); ?>">
<?php
					if ( $lpb_content['lpb_access_headline'] ) :
?>
    <h3 class="lpb_content_headline"><?php echo esc_html( $lpb_content['lpb_access_headline'] ); ?></h3>
<?php
					endif;

					if ( $lpb_content['lpb_access_map_type'] == 'type1' && $lpb_content['lpb_access_map_code1'] ) :
						echo $lpb_content['lpb_access_map_code1'] . "\n";
					elseif ( $lpb_content['lpb_access_map_type'] == 'type2' && $lpb_content['lpb_access_map_code2'] ) :
						echo do_shortcode( $lpb_content['lpb_access_map_code2'] ) . "\n";
					endif;

					if ( $item_count ) :
?>
    <table class="lbp_table">
<?php
						foreach( $lpb_content['lpb_access_items'] as $item ) :
							if ( $item['headline'] || $item['desc'] ) :
?>
     <tr>
      <th><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $item['headline'] ) ); ?></th>
      <td><?php echo str_replace( array( "\r\n", "\r", "\n" ), '<br>', esc_html( $item['desc'] ) ); ?></td>
     </tr>
<?php
							endif;
						endforeach;
?>
    </table>
   </div>

<?php
					endif;
				endif;

			// リンクボタン
			elseif ( $lpb_content['lpb_content_select'] == 'link_button' ) :
				if ( $lpb_content['lpb_link_button_text'] ) :
?>
   <div id="<?php echo esc_attr( $lpb_index ); ?>" class="lpb_content lpb_content-<?php echo esc_attr( $lpb_content['lpb_content_select'] ); ?>">
<?php
					if ( $lpb_content['lpb_link_button_url'] ) :
?>
    <a class="lpb_link_button" href="<?php echo esc_attr( $lpb_content['lpb_link_button_url'] ); ?>"<?php if ( $lpb_content['lpb_link_button_target'] ) echo ' target="_blank"'; ?> style="background-color:#<?php echo esc_attr( $options['pickedcolor1'] ); ?>;"><?php echo esc_html( $lpb_content['lpb_link_button_text'] ); ?></a>
<?php
					else :
?>
    <div class="lpb_link_button" style="background-color:#<?php echo esc_attr( $options['pickedcolor1'] ); ?>;"><?php echo esc_html( $lpb_content['lpb_link_button_text'] ); ?></div>
<?php
					endif;
?>
   </div>

<?php
				endif;

			// フリースペース
			elseif ( $lpb_content['lpb_content_select'] == 'wysiwyg' ) :
				if ( $lpb_content['lpb_wysiwyg_editor'] ) :
?>
   <div id="<?php echo esc_attr( $lpb_index ); ?>" class="lpb_content lpb_content-<?php echo esc_attr( $lpb_content['lpb_content_select'] ); ?>">
    <?php echo apply_filters( 'the_content', $lpb_content['lpb_wysiwyg_editor'] ); ?>
   </div>

<?php
				endif;
			endif;
		endforeach;
	endif;
?>

  </div>

 </article><!-- END #article -->

<?php endwhile; endif; ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>
