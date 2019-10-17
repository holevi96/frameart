<?php get_header(); ?>
<div class="video">
    <video class="fullscreen" src="<?php echo get_stylesheet_directory_uri(); ?>/video.mp4"
           autoplay=""
           webkit-playsinline="true"
           muted="muted"
           loop
    />

    />
</div>
<?php
$categories = get_categories();
$top_level_categories = array_filter($categories, function ($cat) {
    if ($cat->parent == 0) return true;
});
?>
<div id="szolgaltatasok">
    <a class="home-title" href="/szolgaltatasok/nyomda"><h1 class="entry-title">Szolgáltatások</h1></a>
    <div class="fluid-container">
        <div class="flexrow">
            <?php foreach ($top_level_categories as $cat) {

                ?>

                <div class="szolgaltatas" gif-url="<?php echo get_field('kep_gif', 'category_' . $cat->term_id); ?>" img-url="<?php echo get_field('kep', 'category_' . $cat->term_id); ?>">
                    <a href="/szolgaltatasok/<?php echo $cat->slug; ?>">
                        <h2><?php echo $cat->name; ?></h2>

                    <img src="<?php echo get_field('kep', 'category_' . $cat->term_id); ?>" alt="">
                    </a>
                </div>

            <?php } ?>
        </div>
    </div>
</div>

<?php //get_template_part("components/calltoaction", "frameart"); ?>
<div id="referenciak">
    <a class="home-title" href="/referenciak"><h1 class="entry-title">Referenciáink</h1></a>
    <div class="fluid-container">
        <div class="pictures referenciak" itemscope >
            <?php
            $refs = get_posts(array(
                "post_type" => "referenciak",
                "numberposts" => -1,
                "post_status" => 'publish'
            ));
            $cnt = 0;
            foreach ($refs as $ref) { ?>
                <figure class="picture referencia"  itemprop="associatedMedia">
                    <a href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref->ID), 'full')[0]; ?>" itemprop="contentUrl" data-size="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref->ID), 'full')[1]; ?>x<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref->ID), 'full')[2]; ?>" data-index="<?php echo $cnt; ?>">
                        <?php if($cnt<9): ?>
                            <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref->ID), 'medium_large')[0]; ?>"  itemprop="thumbnail">
                        <?php endif; ?>
                    </a>
                </figure>
            <?php
            $cnt++;
            }
            ?>
            <div class="fader"></div>


        </div>
        <div class="center">
             <button class="p-button pink"><a href="/referenciak">Összes megtekintése</a></button>
        </div>
    </div>
</div>

<div id="nyomdatechnika">
    <a class="home-title" href="/nyomda_technikak"><h1 class="entry-title">Nyomdatechnika</h1></a>
    <div class="fluid-container">
        <div class="flexrow imgrow">
            <div>
                <h2>Nyomdatechnika</h2>
                <p><?php echo get_field('nyomda_szoveg','options'); ?></p>
                <button class="p-button pink"><a href="/nyomda_technikak">Eszközeink</a></button>
            </div>
            <img src="<?php echo get_field('nyomda_kep','options'); ?>" alt="">
        </div>

    </div>
</div>


<div id="rolunk">
    <a class="home-title" href="/rolunk"><h1 class="entry-title">Rólunk</h1></a>
    <div class="fluid-container">
        <div class="flexrow imgrow left">
            <img src="<?php echo get_field('rolunk_kep','options'); ?>" alt="">
            <div>
                <h2>Kik vagyunk és mit csinálunk?</h2>
                <p><?php echo get_field('nyomda_szoveg','options'); ?></p>
                <button class="p-button pink"><a href="/rolunk">Tudj meg többet!</a></button>
            </div>

        </div>
    </div>
</div>


<div id="partnereink">
    <h1 class="entry-title">Partnereink</h1>
    <div class="fluid-container">
        <div class="flexrow partnereink">
            <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
                <?php $partnerek  = get_posts(array(
                        'post_type'=>"partnerek",
                        'numberposts'=>-1
                ));
                foreach ($partnerek as $partner) {?>
                    <div class="carousel-cell">
                        <div class="logo">
                            <div>
                                <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($partner->ID), 'full')[0]; ?>" alt="">
                            </div>
                        </div>
                        <p><?php echo $partner->post_content; ?></p>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>


<div id="kapcsolat">
    <div class="entry-title">Kapcsolat</div>

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
        <div class="kapcsolat ">
            <?php echo do_shortcode('[contact-form-7 id="88" title="Kapcsolati űrlap"]'); ?>
        </div>

    </div>
</div>


<?php get_footer(); ?>
