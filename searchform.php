<div class="search-box">
<h2>Search</h2>
<form method="get" id="searchform" action="<?php echo home_url() ; ?>/">
<input type="text" value="<?php echo esc_html($s, 1); ?>" name="s" id="s" maxlength="33" />
<input type="submit" class="button" value="Go"/>
</form>
</div>