<?php

// カテゴリー用入力欄を出力 -------------------------------------------------------
add_action ( 'edit_category_form_fields', 'extra_category_fields');
function extra_category_fields( $tag ) {
    $t_id = $tag->term_id;
    $cat_meta = get_option( "cat_$t_id");
?>
<tr class="form-field">
 <th><label for="upload_image"><?php _e("Category color","tcd-w"); ?></label></th>
 <td><input id="category_color" class="short-text color {required:false}" type="text" size="36" name="Cat_meta[category_color]" value="<?php if(isset ( $cat_meta['category_color'])) echo esc_html($cat_meta['category_color']) ?>" /></td>
</tr>
<?php
}


// データを保存 -------------------------------------------------------
add_action ( 'edited_term', 'save_extra_category_fileds');
function save_extra_category_fileds( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
	   $t_id = $term_id;
	   $cat_meta = get_option( "cat_$t_id");
	   $cat_keys = array_keys($_POST['Cat_meta']);
		  foreach ($cat_keys as $key){
		  if (isset($_POST['Cat_meta'][$key])){
			 $cat_meta[$key] = $_POST['Cat_meta'][$key];
		  }
	   }
	   update_option( "cat_$t_id", $cat_meta );
    }
}


?>