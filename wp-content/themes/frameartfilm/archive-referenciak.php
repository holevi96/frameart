<?php get_header(); ?>


<div class="fluid-container">
<h1 class="entry-title">Referenciák</h1>

    <div class="pictures referenciak" itemscope >
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <figure class="picture referencia"  itemprop="associatedMedia">
                <a href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref->ID), 'full')[0]; ?>" itemprop="contentUrl" data-size="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref->ID), 'full')[1]; ?>x<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref->ID), 'full')[2]; ?>" data-index="<?php echo $cnt; ?>">
                    <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref->ID), 'medium_large')[0]; ?>"  itemprop="thumbnail">
                </a>
            </figure>
            <?php
            $cnt++;
            endwhile; endif;
        ?>
        <div class="fader"></div>


    </div>

</div>
<?php get_footer(); ?>
