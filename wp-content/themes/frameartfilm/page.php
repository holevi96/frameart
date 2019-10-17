<?php get_header(); ?>
    <main id="content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="fluid-container post-content">
                    <?php the_content(); ?>

                </div>
            </article>

        <?php endwhile; endif; ?>
    </main>

<?php get_footer(); ?>