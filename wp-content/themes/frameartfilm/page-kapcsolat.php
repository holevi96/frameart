<?php get_header(); ?>
<main id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <div class="fluid-container post-content">
                <div id="kapcsolat">
                    <div class="fluid-container">
                        <div class="tagok">
                            <?php if (have_rows('tagok','options')):
                                while (have_rows('tagok','options')) : the_row(); ?>
                                    <div>
                                        <img src="<?php the_sub_field('kep'); ?>" alt="">
                                        <div>
                                            <h3><?php the_sub_field('nev'); ?></h3>
                                            <h4><?php the_sub_field('pozicio'); ?></h4>
                                            <p><?php the_sub_field('telefon'); ?></p>
                                        </div>
                                    </div>

                                <?php endwhile;
                            endif; ?>

                        </div>
                        <div class="kapcsolat center">
                            <?php echo do_shortcode('[contact-form-7 id="88" title="Kapcsolati űrlap"]'); ?>

                        </div>

                    </div>
                </div>

            </div>
        </article>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
