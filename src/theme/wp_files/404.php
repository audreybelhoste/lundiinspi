<?php
/*
* Theme Name: @@prettyThemeName
* Author: @@themeAuthor
* Version: @@themeVersion
* Text Domain: @@themeName
* Description: Page template
*              @@themeDescription
*/

get_header(); ?>

<?php //------------MAIN CONTENT-----------------------?>
<main itemscope="itemscope" itemtype="http://schema.org/WebPageElement" itemprop="mainContentOfPage">

    <?php //------------TITLE-----------------------?>
    <div class="main-page-title">
        <?php get_template_part('partials/sub-header'); ?>
    </div>

    <?php //------------CONTENT-----------------------?>
    <section class="404">
        <div class="container">
        	<div class="wysiwyg">
        		<p>
        			<?=__('Oups, la page que vous cherchez n\'existe pas ou n\'existe plus.', '@@themeName')?>
        		</p>
        	</div>
        </div>
    </section>
</main>
<?php //------------END MAIN CONTENT-------------------?>

<?php get_footer(); ?>
