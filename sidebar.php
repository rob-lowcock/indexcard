<div id="sidebar">
	<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : 
        ?>
		<div class="unit widget">
			<h2></h2>
			<p></p>
		</div>
		<?php endif; ?>
</div>