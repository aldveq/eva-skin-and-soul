<?php
/**
* Template Name: Home Page
*
* @package iwn_website
*/

get_header();

get_template_part('pages/modules/home', 'hero');
get_template_part('pages/modules/general', 'info');
get_template_part('pages/modules/services', 'info');

?>
<!--Spacing-->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php

get_footer();