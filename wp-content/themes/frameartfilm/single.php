<?php get_header(); ?>
<main class="fluid-container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<h1 class="entry-title"><?php the_title(); ?></h1>
<div class="post-content">
    <?php the_content(); ?>
</div>

<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>