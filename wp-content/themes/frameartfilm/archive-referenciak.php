<?php get_header(); ?>


<div class="fluid-container">
<h1 class="entry-title">Referenciák</h1>

    <div class="pictures referenciak" itemscope >
        <?php if (have_posts()) : while (have_posts()) : the_post();
            $cnt=0;
            $ref = get_the_ID();

            $video = get_field("youtube_url",$ref);
            if($video){
                $video = explode("?v=",$video)[1];
            }
            ?>



            <figure class="picture referencia"  itemprop="associatedMedia">
                <a class="<?php echo ($video)?"video":""; ?>" data-video="<?php echo $video; ?>" href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref), 'full')[0]; ?>"
                   itemprop="contentUrl"
                   data-size="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref), 'full')[1]; ?>x<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref), 'full')[2]; ?>"
                   data-index="<?php echo $cnt; ?>">
                    <?php if($cnt<9): ?>
                        <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref), 'medium_large')[0]; ?>"  itemprop="thumbnail">
                    <?php endif; ?>
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
