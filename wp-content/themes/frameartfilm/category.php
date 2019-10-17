<?php get_header(); ?>
    <script>
        jQuery(document).ready(function () {
           // jQuery('.category-filter li').eq(0).click()
            jQuery(".szolgaltatasok .entry-title").show().html(jQuery(".szolgaltatas-nav div.active a span").html())
        })
    </script>
    <div class="fluid-container">

        <?php $path = explode('/', $_SERVER['REQUEST_URI']);
        $categories = get_categories();
            $top_level_categories = array_filter($categories, function ($cat) {
                if ($cat->parent == 0) return true;
            });
        ?>
        <div class="flexrow szolgaltatas-nav clearfix">
            <?php foreach ($top_level_categories as $cat) {?>
                <div class="szolgaltatas <?php echo $cat->slug; ?> <?php echo ($path[2] ==  $cat->slug) ? 'active' : ''; ?>">
                    <a href="/szolgaltatasok/<?php echo $cat->slug; ?>"><span><?php echo $cat->name; ?></span></a>
                </div>

            <?php }?>
        </div>
        <style>
            <?php foreach ($top_level_categories as $cat) {?>
                .szolgaltatas.<?php echo $cat->slug; ?>{
                    background-image:url(<?php echo get_field('kep', 'category_' . $cat->term_id); ?>);
                    background-size: cover;
                }
                .szolgaltatas.<?php echo $cat->slug; ?>.active{
                    border:1px transparent;
                }
            <?php }?>
        </style>
        <?php

        $args = array(
            'parent' => get_queried_object()->term_id,
            'numberposts' => -1
        );
        $categories = get_categories($args); ?>
        <div class="category-filter">
            <ul class="flexrow clearfix">
                <?php foreach ($categories as $category) { ?>
                    <li class="filter" data-slug="<?php echo $category->slug; ?>"><?php echo $category->name; ?></li>
                <?php } ?>
            </ul>
        </div>

        <div class="szolgaltatasok clearfix">
            <h2 class="entry-title">Title</h2>
            <?php if (have_posts()) : while (have_posts()) : the_post();
            $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'szolgaltatas');
            ?>

                <div class="szolgaltatas <?php echo get_category(wp_get_post_categories(get_the_ID(),array('exclude'=>get_category_by_slug($path[2])->term_id))[0])->slug; ?>">
                    <a postID="<?php echo get_the_ID(); ?>" class="modal-link" href="<?php echo get_permalink(); ?>">
                        <h3>
                            <?php echo the_title(); ?>
                        </h3>
                        <?php if($img[0]){ ?><img src="<?php echo $img[0]; ?>" alt="">
                        <?php }else{?>
<!--                            <div class="placeholder"></div>-->
                            <img src="<?php echo get_stylesheet_directory_uri()."/img/placeholder.jpg"; ?>" alt="">
                        <?php } ?>
                    </a>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>

<?php get_footer(); ?>
