<header class="mainHeader">
    <?php //Liens d'évitements ?>
    <ul class="skip-links">
        <li>
            <a title="<?=__('Passer les menus de navigation','lundiinspi')?>" href="#content">
                <?=__('Passer les menus de navigation','lundiinspi')?>
            </a>
        </li>
    </ul> 

    <div class="mainHeader__wrapper">

        <?php if(is_front_page()): ?>
        <div class="mainHeader__logo">
        <?php else: ?>
        <a href="<?php echo home_url(); ?>" class="mainHeader__logo">
        <?php endif; ?>
        
            <img src="<?php echo get_template_directory_uri() . '/images/logo_lundiinspi.svg'; ?>" alt="<?php _e('Logo Lundi Inspi', 'lundiinspi'); ?>">
        
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
                        'depth'             => 1,
                        'container'         => '',
                        'items_wrap'		=> '%3$s',
                        'container_class'   => 'menu',
                    ));
                ?>
            </ul>

            <button class="mainHeader__nav__search" id="toggleSearch"></button>

        </nav>

    </div>
    
</header>
<div id="content"></div>