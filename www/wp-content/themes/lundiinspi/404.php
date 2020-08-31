<?php
/*
* Theme Name: © Lundi Inspi by Nicolas et Audrey Schwartz
* Author: Nicolas et Audrey Schwartz
* Version: 0.0.1
* Text Domain: lundiinspi
* Description: Page template
*              Site de Lundi Inspi
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
        			<?=__('Oups, la page que vous cherchez n\'existe pas ou n\'existe plus.', 'lundiinspi')?>
        		</p>
        	</div>
        </div>
    </section>
</main>
<?php //------------END MAIN CONTENT-------------------?>

<?php get_footer(); ?>
