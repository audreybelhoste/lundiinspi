<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Front page template
*			   @@themeDescription
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