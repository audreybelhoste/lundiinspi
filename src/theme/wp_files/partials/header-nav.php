<header class="mainHeader">
    <?php //Liens d'évitements ?>
    <ul class="skip-links">
        <li>
            <a title="<?=__('Passer les menus de navigation','@@themeName')?>" href="#content">
                <?=__('Passer les menus de navigation','@@themeName')?>
            </a>
        </li>
    </ul> 

    <!-- <div class="mainHeader__wrapper">

        <?php if(is_front_page()): ?>
        <div class="mainHeader__logo">
        <?php else: ?>
        <a href="<?php echo home_url(); ?>" class="mainHeader__logo">
        <?php endif; ?>
        
            <img src="<?php echo get_template_directory_uri() . '/images/logo_spikeelabs.svg'; ?>" alt="<?php _e('Logo Spikeelabs', '@@themeName'); ?>">
        
        <?php if(!is_front_page()): ?>
        </a>
        <?php else: ?>
        </div>
        <?php endif; ?>

        <div class="mainHeader__mobileNav">

            <div class="mainHeader__toggleNav" id="toggleNav">
                <span></span>
                <span></span>
                <span></span>
            </div>

        </div>

        <nav class="mainHeader__nav">
            
            <ul>
                <?php
                    wp_nav_menu(array(
                        'theme_location'    => 'main-nav',
                        'depth'             => 2,
                        'container'         => '',
                        'items_wrap'		=> '%3$s',
                        'container_class'   => 'menu',
                    ));
                ?>
            </ul>

        </nav>

    </div> -->
    
</header>
<div id="content"></div>