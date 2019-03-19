<?php
add_shortcode('telephone_field', 'telephone_field');
function telephone_field() {
if (!class_exists('ACF')) {
    return; 
}
ob_start();
if( have_rows('telephone_list') ):

 	// loop through the rows of data
    while ( have_rows('telephone_list') ) : the_row();
?>

     <p><i class="fas fa-phone"></i> <a href="tel:<?php echo the_sub_field('telephone'); ?>"><?php echo the_sub_field('telephone'); ?></a></p>   
<?php
    endwhile;

endif;
return ob_get_clean();
}

add_shortcode('rating_star', 'rating_star');
function rating_star() {
	if (!class_exists('ACF')) {
	    return; 
	}
	ob_start();

	$y = get_field('rating_score');
	
	$x = 1; 
?>
<p class="rating">
<?php
	while($x <= $y) {
	    echo "<i class='fas fa-star star-rating' ></i>  ";
	    $x++;
	} 
?>
</p>
<?php


	return ob_get_clean();
}


?>