<?php
if ( in_category(array('lifelog')) ) {  // スラッグ（work）またはカテゴリーID（10）を指定します。
　　　get_template_part( 'lifelog.php' , false ); // スラッグが「work」の時に、work.php を読み込みます。
} else { // スラッグが「work」「info」以外の時に、single-normal.php を読み込みます。
    get_template_part( 'single' , 'normal');
}
?>
