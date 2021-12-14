
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Alex Mayer Design</title>

    <script type="module">
        document.documentElement.classList.remove('no-js'); document.documentElement.classList.add('js')
    </script>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" />

    <meta name="description"
        content="Sie wollen eine neue Website, dann sind Sie hier genau richtig. Alex Mayr designed Ihre Homepage" />
    <meta property="og:title" content="Alex Mayer - Webdesign" />
    <meta property="og:description"
        content="Sie wollen eine neue Website, dann sind Sie hier genau richtig. Alex Mayr designed Ihre Homepage" />
    <meta property="og:image" content="https://www.alexmayer.com/images/AlexMayer_Logo.svg" />
    <meta property="og:image:alt" content="Logo von Alex Mayer" />
    <meta property="og:locale" content="de_AT" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary" />
    <meta property="og:url" content="https://www.alexmayer.com" />
    <link rel="canonical" href="https://www.alexmayer.com" />

    <link rel="apple-touch-icon" sizes="180x180" href="./favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicons//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicons//favicon-16x16.png">
    <link rel="manifest" href="./favicons//site.webmanifest">
    <link rel="mask-icon" href="./favicons//safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>
<?php wp_body_open(); ?>
<body>
    <header>
        <div id="nav_space">
            <h1 id="logo">Alex Mayer</h1>

            <a href="#" id="button" onclick="burgerKlick()"><span></span></a>
           <nav>
               <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
           </nav>
        </div>

        <nav id="navbar">
            <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
        </nav>

        <?php if (is_front_page()) { ?>
            <section id="hero"> 
                <div class="herotext">
                    <h2><span>Glänzende Ideen<br>für leuchtende<br>Augen</span></h2>
                    <a href="#">Angebot einholen</a>
                </div>
            </section>
        <?php }
            else { ?>
                <section id="hero" style="background-image: url(<?php the_post_thumbnail_url() ?>);">
                    <div class="herotext">
                        <h2><span><?php echo get_field('herotext') ?></span></h2>
                        <a href="#">Angebot einholen</a>
                    </div>
                </section> 
            <?php } ?>
            
    </header>
    
<main class="maxwidthcontainer">
    <?php if (is_front_page()) { ?>
        <section id="services">
        <h2>Leistungen</h2>
        <ul>
            <?php $services_query = new WP_Query( 'order=ASC&category_name=leistungen' ); 
            
            if ( $services_query->have_posts() ){  
            $COUNT = 1;
            
                while ( $services_query->have_posts() ) {
                    $services_query->the_post();
                    $thumbnail_id = get_post_thumbnail_id();?>
            
                <li id="service<?php echo $COUNT;?>">
                    <a href="#">
                        <p><?php the_title();?></p>
                        <img src="<?php echo wp_get_attachment_image_url($thumbnail_id);?>" alt="<?php get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>">
                    </a>
                </li>

            <?php $COUNT++;
                    wp_reset_postdata();
                }?>
            <?php }
            else {?>
                <p>Keine Referenzen vorhanden...</p>
            <?php }?>
        </ul>
    </section>

    <section id="news">
        <h2>News</h2>
        <ul>

        <?php
        $news_query = new WP_Query( 'order=ASC&category_name=news' ); 

        if ( $news_query->have_posts() ){
            while ( $news_query->have_posts()  ) {
            $news_query->the_post(); ?>
            <li>
                <a href="<?php the_permalink();?>"><?php the_title(); ?></a> - <?php the_content(); ?> <a href="<?php the_permalink();?>">[mehr erfahren]</a>
            </li>
            <?php } ?>
        <?php } 
        else {
        ?>
            <p>Erster Post demnächst...</p>
        <?php }?>
        <? wp_reset_postdata();?> 


        </ul>
    </section>

    <section id="clients">
        <h2>Referenzen</h2>
        <?php $clients_query = new WP_Query( 'order=ASC&category_name=testimonials' ); 
        
        if ( $clients_query->have_posts() ){  
          $COUNT = 1;   
          
            while ( $clients_query->have_posts() ) {
                $clients_query->the_post();
                $thumbnail_id = get_post_thumbnail_id();?>
                <article id="grid<?php echo $COUNT;?>">
                    <div id="imggrid<?php echo $COUNT;?>">
                        <img src="<?php echo wp_get_attachment_image_url($thumbnail_id);?>" alt="<?php get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>">
                    </div>
                    <div>
                        <cite><?php the_title();?></cite>
                        <p><?php echo get_field('rolle');?></p>
                    </div>
                    <blockquote>
                        <?php echo get_field('zitat');?>
                    </blockquote>
                    <?php if ($COUNT === 2) {
                        echo "<p></p>";
                    }?>
                </article>

                <?php $COUNT++;
                wp_reset_postdata();
            }?>
            <div id="quote">
                <img src="<?php bloginfo('template_directory');?>/images/quotation_mark.svg" alt="Quote-Icon">
            </div>
        <?php }
        else {?>
            <p>Keine Referenzen vorhanden...</p>
        <?php }?>
    </section>
    <?php }
    else {
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_title();
                the_content();
            }
        }
        else {
            echo "<p>Derzeit noch keine Beiträge... Bitte kommen Sie später weider zurück!</p>";
        }
    } ?>
    
</main>

<?php include('_footer.php') ?>

<script type="text/javascript" src="./js/burger.js"></script>
</body>

</html>