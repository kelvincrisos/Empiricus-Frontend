<?php
/**
* @package WordPress
 * @subpackage Empiricus
 * @since Empiricus 1.0
 */
?> 

<!-- Footer ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<footer class="col-1 footer">
    <div class="col-center">

        <div class="left">
            <?php if ( is_active_sidebar( 'endereco' ) ) : ?>
                <?php dynamic_sidebar( 'endereco' ); ?>
            <?php endif; ?>
        </div>

        <div class="right">
            <div class="l">

                <?php if ( is_active_sidebar( 'social-footer' ) ) : ?>
                    <?php dynamic_sidebar( 'social-footer' ); ?>
                <?php endif; ?>

            </div>

            <div class="r">
                <?php if ( is_active_sidebar( 'sobre' ) ) : ?>
                    <?php dynamic_sidebar( 'sobre' ); ?>
                <?php endif; ?>

            </div>
        </div>
    
    </div>
</footer>


<div class="col-1 copyright">
    <div class="col-center">
        <?php if ( is_active_sidebar( 'copyright' ) ) : ?>
            <?php dynamic_sidebar( 'copyright' ); ?>
        <?php endif; ?>
    </div>
</div>


<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lib/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/geral.js"></script> 


</body>
</html>