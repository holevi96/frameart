<?php get_header(); ?>
<div class="bckvideo">
    <div class="letter">
        <video class="fullscreen" src="http://thenewcode.com/assets/videos/ocean-small.mp4"
               autoplay=""
               webkit-playsinline="true"
               muted="muted"
               loop
        ></video>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 285 80" preserveAspectRatio="xMidYMid slice">
            <defs>
                <mask id="mask" x="0" y="0" width="100%" height="100%" >
                    <rect x="0" y="0" width="100%" height="100%" />
                    <text x="95"  y="30">We are</text>
                    <text x="110"  y="50">Frame Art.</text>
                </mask>
            </defs>
            <rect x="0" y="0" width="100%" height="100%" />
        </svg>
        <div class="flexbox">
            <button class="p-button">Mutass többet!</button>
        </div>
    </div>
    <div class="logoanim">
        <svg width="120" height="120" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="">

            <path stroke-width="0.5" fill="none" stroke="#000" d="M28 3C12.536 3 0 15.6193 0 31.186C0 46.7528 12.536 59.3721 28 59.3721C43.464 59.3721 56 46.7528 56 31.186C56 15.6193 43.464 3 28 3ZM28 15.9885L41.6719 26.6856V46.3835H32.2656V34.4925H23.7344V46.3835H14.3281V26.6856L28 15.9885Z" class="gQmuRymz_0"></path>
            <path stroke-width="0.5" fill="none" stroke="red" d="M53,3.5A3.5,3.5 0,1,1 60,3.5A3.5,3.5 0,1,1 53,3.5" class="gQmuRymz_1"></path>
            <style data-made-with="vivus-instant">.gQmuRymz_0{stroke-dasharray:302 304;stroke-dashoffset:303;animation:gQmuRymz_draw_0 6200ms ease-in 0ms infinite,gQmuRymz_fade 6200ms linear 0ms infinite;}.gQmuRymz_1{stroke-dasharray:22 24;stroke-dashoffset:23;animation:gQmuRymz_draw_1 6200ms ease-in 0ms infinite,gQmuRymz_fade 6200ms linear 0ms infinite;}@keyframes gQmuRymz_draw{100%{stroke-dashoffset:0;}}@keyframes gQmuRymz_fade{0%{stroke-opacity:1;}93.54838709677419%{stroke-opacity:1;}100%{stroke-opacity:0;}}@keyframes gQmuRymz_draw_0{12.903225806451612%{stroke-dashoffset: 303}45.16129032258064%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}@keyframes gQmuRymz_draw_1{12.903225806451612%{stroke-dashoffset: 23}45.16129032258064%{ stroke-dashoffset: 0;}100%{ stroke-dashoffset: 0;}}</style></svg>

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
            foreach ($refs as $ref) {
                $video = get_field("youtube_url",$ref->ID);
                if($video){
                    $video = explode("?v=",$video)[1];
                }

                ?>
                <figure class="picture referencia"  itemprop="associatedMedia">
                    <a class="<?php echo ($video)?"video":""; ?>" data-video="<?php echo $video; ?>" href="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref->ID), 'full')[0]; ?>"
                       itemprop="contentUrl"
                       data-size="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref->ID), 'full')[1]; ?>x<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($ref->ID), 'full')[2]; ?>"
                       data-index="<?php echo $cnt; ?>">
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

<?php

$szolgaltatasok = get_posts(array(
    "post_type"=>"szolgaltatasok",
    "numberposts"=>-1
))
?>

<div id="rolunk">
<div class="flexrow weare">
    <div>
        <h2>We are Frame Art</h2>
        <p>The full service agency.</p>
    </div>

</div>
    <div class="fluid-container">
        <div class="flexrow imgrow left">
            <div>
                <h2>ISMERJ MEG MINKET!</h2>
                <p>Szinopszis készítés, Storyboard készítés, Aláfestő zene készítés,
                    Location manager, Világítás, Statiszta szolgáltatás, Teljes díszlet tervezés és építés,
                    Operatőr szolgáltatás, Vágás, utómunka, CGI készítés,
                    Drón felvételek</p>
                <button class="p-button pink"><a href="/rolunk">Tudj meg többet!</a></button>
            </div>

            <img src="<?php echo get_field('rolunk_kep','options'); ?>" alt="">

        </div>
    </div>
    <div class="flexrow staytouch">
        <div>
            <h2>LET’S STAY IN TOUCH ! </h2>
        </div>
        <div class="flexrow">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons8-compact-camera-100.png" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons8-compact-camera-100.png" alt="">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons8-compact-camera-100.png" alt="">
        </div>
    </div>
</div>

<div id="szolgaltatasok">
    <a class="home-title" href="/szolgaltatasok/nyomda"><h1 class="entry-title">Miben tudunk segíteni?</h1></a>
    <div class="fluid-container">
        <div class="">
            <?php foreach ($szolgaltatasok as $cat) { ?>

                <div class="szolgaltatas">
                    <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($cat->ID), 'full')[0]; ?>" alt="">
                    <h2><?php echo $cat->post_title; ?></h2>
                    <p><?php echo $cat->post_content; ?></p>

                </div>

            <?php } ?>
        </div>
    </div>
    <div class="flexrow" >
        <div>
            <h2>Az ötlettől a megvalósításig.</h2>
<!--            <div class="p-button">Ajánlatot kérek</div>-->
            <?php echo do_shortcode('[sg_popup class="p-button" id="432" event="click"]Ajánlatot kérek[/sg_popup]'); ?>
        </div>

    </div>
</div>





<div id="partnereink">
    <h1 class="entry-title">Együttműködő partnereink</h1>
    <div class="fluid-container">
        <div class="flexrow partnereink">
            <div class="main-carousel">
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
<div id="partnereink">
    <h1 class="entry-title">Ügyfeleink</h1>
    <div class="fluid-container">
        <div class="flexrow ugyfeleink">
            <div class="main-carousel">
                <?php $partnerek  = get_posts(array(
                    'post_type'=>"ugyfeleink",
                    'numberposts'=>-1
                ));
                foreach ($partnerek as $partner) {?>
                    <div class="carousel-cell">
                        <div class="logo">
                            <div>
                                <img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($partner->ID), 'full')[0]; ?>" alt="">
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>

<div id="kapcsolat">
    <div class="entry-title">Ajánlatkérés</div>

    <div class="fluid-container">
        <!--<div class="tagok">
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

        </div>-->
        <div class="kapcsolat ">
            <?php echo do_shortcode('[contact-form-7 id="88" title="Kapcsolati űrlap"]'); ?>
        </div>

    </div>
</div>


<?php get_footer(); ?>
