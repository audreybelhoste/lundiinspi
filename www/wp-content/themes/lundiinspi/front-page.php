<?php
/*
* Theme Name: © Lundi Inspi by Nicolas et Audrey Schwartz
* Author: Nicolas et Audrey Schwartz
* Version: 0.0.1
* Text Domain: lundiinspi
* Description: Front page template
*			   Site de Lundi Inspi
*/

get_header(); ?>


<?php //------------MAIN CONTENT-----------------------?>
<main itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">
	
    <div class="homeIntro">

        <h1 class="homeIntro__title"><?php the_field('home_title'); ?></h1>
    
    </div>
	
</main>
<?php //------------END MAIN CONTENT-------------------?>

<?php get_footer(); ?>