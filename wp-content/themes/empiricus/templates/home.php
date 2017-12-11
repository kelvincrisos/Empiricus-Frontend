<?php
/**
 * Template Name: Página inicial
 *
 * @package WordPress
 * @subpackage Empricus 
 * @since Empricus 1.0
 */ 
get_header(); ?> 



<!-- SOCIAL WIDGET ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="social-widget">
    <!-- <a href="#" class="sprite2 fb">
        <span>623</span>
    </a>
    <a href="#" class="sprite2 tw"></a>
    <a href="#" class="sprite2 in"></a>
    <a href="#" class="sprite2 plus"></a>
    <a href="#" class="sprite2 wpp"></a>
    <a href="#" class="sprite2 email"></a> -->

    <?php echo do_shortcode('[Sassy_Social_Share type="floating"]'); ?>
</div>


<!-- SUBSCRIBE ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="col-1 subscribe-banner" style="background-image: url('<?php echo get_field('1bg'); ?>');">
    <div class="col-center">
    
        <div class="content">
            <?php echo get_field('1text'); ?>

            <div class="form">
                <?php if ( is_active_sidebar( 'news' ) ) : ?>
                    <?php dynamic_sidebar( 'news' ); ?>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <div class="sprite1 go-down">
    </div>
</div>



<!-- CONTENTS ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<?php $section2 = get_field('2text'); if(!empty($section2)): ?>
<div class="col-1 section gray">
    <div class="col-center">
        
        <?php echo $section2; ?>

    </div>
</div>
<?php endif; ?>
 

<?php $section3 = get_field('3text'); if(!empty($section3)): ?>
<div class="col-1 section white">
    <div class="col-center">
        
        <?php echo $section3; ?>

        <div class="button">
            <a class="top" href="javascript:void(0);">
                <div class="sprite1 go-top"></div>
                Voltar ao topo
            </a>
        </div>

    </div>
</div>
<?php endif; ?>


<!-- ABOUT ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="col-1 about-section">
    <div class="col-center">
    

        <div class="content">
            <?php echo get_field('e-text'); ?>

            <a class="button" href="<?php echo get_field('e-link'); ?>">Saiba Mais</a>
        </div>

        <?php $eimg = get_field('e-img'); if(!empty($eimg)): ?>
            <img class="img" src="<?php echo $eimg['url']; ?>" alt="<?php echo $eimg['title']; ?>">
        <?php endif; ?>


    </div>
</div>
 

<?php get_footer(); ?>

