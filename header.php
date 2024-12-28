<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <section>
            <img src="http://meryem.local/wp-content/uploads/2024/12/2b593eca8b40c4cdcc8094991b340eb1.jpg">
            <p style="text-indent: 10px;"><a href="http://meryem.local" class="gradient-text"
                    style="font-size: 17px;">meryem<i>.earth</i></a> || turkish, 16, bay area</p>
        </section>
        <hr style="margin-bottom: -5px; border: 1px dotted #D4D4D6;">
        <section id="nav">
            <div class="menu-container" id="menu">
                <ul class="menu-list">
                    <li><strong>NAVIGATION.</strong></li>
                    <li><a href="/about">about me</a></li>
                    <li><a href="http://meryem.local/category/blog/">blog</a></li>
                    <li>
                        <a href="#">cookie tin</a>
                        <ul class="dropdown">
                            <li style="padding: 5px 0;"><a href="http://meryem.local/category/music/">music</a></li>
                            <li><a href="http://meryem.local/category/library/">library</a></li>
                            <li style="padding: 5px 0 0 0;"><a
                                    href="http://meryem.local/category/photography/">photography</a></li>
                        </ul>
                    </li>
                    <li><a href="http://meryem.local/category/letters/">letters to others</a></li>
                    <li><a href="http://meryem.local/category/literature/">literature</a></li>
                    <li><a href="/experiences">professional experiences</a></li>
                    <li>
                        <a href="#">socials</a>
                        <ul class="dropdown">
                            <li style="padding: 5px 0;"><a href="https://www.linkedin.com/in/merszgn/"
                                    target="_blank">linkedin</a>
                            </li>
                            <li style="padding: 0 0 5px 0;"><a
                                    href="https://open.spotify.com/user/erkjyaqw93xmrsrghinv130bd"
                                    target="_blank">spotify</a></li>
                            <li style="padding: 0 0 5px 0;"><a href="https://www.instagram.com/merszgn/"
                                    target="_blank">instagram</a></li>
                            <li><a href="https://www.youtube.com/@merszgn" target="_blank">youtube</a></li>
                        </ul>
                    </li>
                    <li><a href="/contact">contact me</a></li>
                </ul>
            </div>
            <hr style="margin-bottom: -5px; border: 1px dotted #D4D4D6;">
            <section class="rights">all rights reserved. &copy; <?php echo date('Y'); ?></section>
    </header>