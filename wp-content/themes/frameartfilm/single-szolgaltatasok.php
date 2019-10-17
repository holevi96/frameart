<?php get_header(); ?>
<div class="fluid-container">
    <div class="entry-title"><?php the_title(); ?></div>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
        $pics = get_field("kep_galeria");
        $cnt = 0;
        if ($pics):?>
            <div class="pictures" itemscope>
                <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'
                     style="height: 100%;width: 100%;">
                    <?php
                    foreach ($pics as $pic) { ?>
                        <div class="carousel-cell">
                            <figure class="picture referencia" itemprop="associatedMedia">
                                <a href="<?php echo $pic["url"]; ?>" itemprop="contentUrl"
                                   data-size="<?php echo $pic["width"]; ?>x<?php echo $pic["height"]; ?>"
                                   data-index="<?php echo $cnt; ?>">
                                    <img src="<?php echo $pic["sizes"]["szolgaltatas"]; ?>" itemprop="thumbnail">
                                </a>
                            </figure>
                        </div>
                        <?php
                        $cnt++;
                    }

                    ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="content">
            <?php the_content(); ?>
        </div>

    <?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>
