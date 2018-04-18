<?php function seos_photography_animation_classes () { ?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
				jQuery('.animate-article').addClass("hidden").viewportChecker({
					classToAdd: 'animated zoomIn', // Class to add to the elements when they are visible
					offset: 1    
				   }); 
		});  
		jQuery(document).ready(function() {
				jQuery('.sp-button1').addClass("hidden").viewportChecker({
					classToAdd: 'animated bounceInLeft', // Class to add to the elements when they are visible
					offset: 1    
				   }); 
		});
  		jQuery(document).ready(function() {
				jQuery('.sp-button2').addClass("hidden").viewportChecker({
					classToAdd: 'animated bounceInRight', // Class to add to the elements when they are visible
					offset: 1    
				   }); 
		});
   		jQuery(document).ready(function() {
				jQuery('.sp-title').addClass("hidden").viewportChecker({
					classToAdd: 'animated zoomIn', // Class to add to the elements when they are visible
					offset: 1    
				   }); 
		});
		jQuery(document).ready(function() {
				jQuery('.sp-description').addClass("hidden").viewportChecker({
					classToAdd: 'animated zoomIn', // Class to add to the elements when they are visible
					offset: 1    
				   }); 
		});
 		jQuery(document).ready(function() {
				jQuery('.site-title').addClass("hidden").viewportChecker({
					classToAdd: 'animated zoomIn', // Class to add to the elements when they are visible
					offset: 1    
				   }); 
		});
  		jQuery(document).ready(function() {
				jQuery('.sp-image').addClass("hidden").viewportChecker({
					classToAdd: 'animated zoomIn', // Class to add to the elements when they are visible
					offset: 1    
				   }); 
		});  		
	</script>
<?php } 

add_action('wp_footer', 'seos_photography_animation_classes');				   
				   
		
		