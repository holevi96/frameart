<?php get_header(); ?>
<div class="fluid-container">
<h1 class="entry-title">Nyomda technikák</h1>
    <div class="szolgaltatasok">
        <?php if (have_posts()) : while (have_posts()) : the_post();
            $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'szolgaltatas');
            ?>

            <div class="szolgaltatas <?php echo get_category(wp_get_post_categories(get_the_ID(), array('exclude' => get_category_by_slug($path[2])->term_id))[0])->slug; ?>">
                <a class="modal-link" href="<?php echo get_permalink(); ?>">
                <h3><?php echo the_title(); ?></h3>
                <?php if ($img[0]) { ?><img src="<?php echo $img[0]; ?>" alt="">
                <?php } else { ?>
                    <img src="<?php echo get_stylesheet_directory_uri()."/img/placeholder.jpg"; ?>" alt="">
                <?php } ?>
                </a>
            </div>
        <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer(); ?>
