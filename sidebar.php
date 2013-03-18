<div id="sidebar">
	<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : 
        ?>
		<?php the_widget('WP_Widget_Search', NULL, array('before' => '<div class="unit widget">')); ?>
		<?php the_widget('WP_Widget_Recent_Posts', array('title' => 'Recent Posts'), array('before' => '<div class="unit widget">')); ?> 
		<?php the_widget('WP_Widget_Categories', array('title' => 'Categories'), array('before' => '<div class="unit widget">')); ?>
		<?php the_widget('WP_Widget_Meta', array('title' => 'Meta'), array('before' => '<div class="unit widget">')); ?>
		<?php endif; ?>
</div>