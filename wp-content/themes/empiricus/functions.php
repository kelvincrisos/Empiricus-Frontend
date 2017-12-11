<?php
/**
 * @package WordPress
 * @subpackage Empricus
 * @since Empricus 1.0
 */

//Cria o menu
register_nav_menu( 'menu', __( 'Navigation Menu', 'Empiricus' ) );




// * Cria widget 
if ( function_exists('register_sidebar') )
    register_sidebar( array(
    'name' => __( 'Fixed Social'),
    'id' => 'socialf',
    'description' => __( '', 'Empiricus' ),
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '',
    'after_title' => ''
) );


// * Cria widget 
if ( function_exists('register_sidebar') )
    register_sidebar( array(
    'name' => __( 'Newsletter'),
    'id' => 'news',
    'description' => __( '', 'Empiricus' ),
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '',
    'after_title' => ''
) );

// * Cria widget 
if ( function_exists('register_sidebar') )
    register_sidebar( array(
    'name' => __( 'Endereço do Rodapé'),
    'id' => 'endereco',
    'description' => __( '', 'Empiricus' ),
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '',
    'after_title' => ''
) );

// * Cria widget 
if ( function_exists('register_sidebar') )
    register_sidebar( array(
    'name' => __( 'Redes sociais do Rodapé'),
    'id' => 'social-footer',
    'description' => __( '', 'Empiricus' ),
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '',
    'after_title' => ''
) );

// * Cria widget 
if ( function_exists('register_sidebar') )
    register_sidebar( array(
    'name' => __( '"Sobre" do Rodapé'),
    'id' => 'sobre',
    'description' => __( '', 'Empiricus' ),
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '',
    'after_title' => ''
) );

// * Cria widget 
if ( function_exists('register_sidebar') )
    register_sidebar( array(
    'name' => __( 'Copyright'),
    'id' => 'copyright',
    'description' => __( '', 'Empiricus' ),
    'before_widget' => '',
    'after_widget' => "",
    'before_title' => '',
    'after_title' => ''
) );








// Customizar o Footer do WordPress
function remove_footer_admin () {
	echo '© <a href="http://empiricus.com.br/" target="_blank">Empiricus</a>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Olá', 'Bem vindo', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );








































































// ---------------------- CUSTOM FIELDS IN TAXONOMY {negocios-category}

        /* Add Image Upload to Series Taxonomy */
        // Add Upload fields to "Add New Taxonomy" form
        function add_series_image_field() {
            // this will add the custom meta field to the add new term page
            ?>
            <div class="form-field">
                <label for="logo_image"><?php _e( 'Banner da categoria', 'journey' ); ?></label>
                <input type="text" name="logo_image[image]" id="logo_image[image]" class="series-image" value="<?php echo $seriesimage; ?>">
                <input class="upload_image_button button" name="_add_logo_image" id="_add_logo_image" type="button" value="Select/Upload Image" />
                <script>
                    jQuery(document).ready(function() {
                        jQuery('#_add_series_image').click(function() {
                            wp.media.editor.send.attachment = function(props, attachment) {
                                jQuery('.series-image').val(attachment.url);
                            }
                            wp.media.editor.open(this);
                            return false;
                        });
                    });
                </script>
            </div>
        <?php
        }
        add_action( 'categorias_add_form_fields', 'add_series_image_field', 10, 2 );

        // Add Upload fields to "Edit Taxonomy" form
        function journey_series_edit_meta_field($term) {

            // put the term ID into a variable
            $t_id = $term->term_id;

            // retrieve the existing value(s) for this meta field. This returns an array
            $term_meta = get_option( "categorias_$t_id" ); ?>

            <tr class="form-field">
            <th scope="row" valign="top"><label for="_logo_image"><?php _e( 'Banner da categoria', 'journey' ); ?></label></th>
                <td>
                    <?php
                      $seriesimage = esc_attr( $term_meta['image'] ) ? esc_attr( $term_meta['image'] ) : ''; 
                    ?>
                    <input type="text" name="logo_image[image]" id="logo_image[image]" class="series-image" value="<?php echo $seriesimage; ?>">
                    <input class="upload_image_button button" name="_logo_image" id="_logo_image" type="button" value="Select/Upload Image" />
                </td>
            </tr>
            <tr class="form-field">
            <th scope="row" valign="top"></th>
                <td style=" height: 120px; ">
                    <style>
                        div.img-wrap {
/*background: url('http://placehold.it/960x300') no-repeat center; */
                            background-size:contain; 
                            max-width: 450px; 
                            max-height: 150px; 
                            width: 100%; 
                            height: 100%; 
                            overflow:hidden; 
                        }
                        div.img-wrap img {
                            max-width: 450px;
                        }
                    </style>
                    
                    <div class="img-wrap">
                        <img src="<?php echo $seriesimage; ?>" id="series-img">
                    </div>
                     
                    <script>
                    jQuery(document).ready(function() {
                        jQuery('#_logo_image').click(function() {
                            wp.media.editor.send.attachment = function(props, attachment) {
                                jQuery('#series-img').attr("src",attachment.url)
                                jQuery('.series-image').val(attachment.url)
                            }
                            wp.media.editor.open(this);
                            return false;
                        });
                    });
                    </script>
                </td>
            </tr>
        <?php
        }
        add_action( 'categorias_edit_form_fields', 'journey_series_edit_meta_field', 10, 2 );

        // Save Taxonomy Image fields callback function.
        function save_series_custom_meta( $term_id ) {
            if ( isset( $_POST['logo_image'] ) ) {
                $t_id = $term_id;
                $term_meta = get_option( "categorias_$t_id" );
                $cat_keys = array_keys( $_POST['logo_image'] );
                foreach ( $cat_keys as $key ) {
                    if ( isset ( $_POST['logo_image'][$key] ) ) {
                        $term_meta[$key] = $_POST['logo_image'][$key];
                    }
                }
                // Save the option array.
                update_option( "categorias_$t_id", $term_meta );
            }
        }  
        add_action( 'edited_categorias', 'save_series_custom_meta', 10, 2 );  
        add_action( 'create_categorias', 'save_series_custom_meta', 10, 2 );

























            function add_series_image_field2() {
            ?>
            <div class="form-field">
                <label for="logo_image2"><?php _e( 'Titulo do banner', 'journey' ); ?></label>
                <input type="text" name="logo_image2[image]" id="logo_image2[image]" class="series-image2" value="<?php echo $seriesimage; ?>">
                <input class="upload_image_button button" name="_add_logo_image2" id="_add_logo_image2" type="button" value="Select/Upload Image" />
                <script>
                    jQuery(document).ready(function() {
                        jQuery('#_add_series_image').click(function() {
                            wp.media.editor.send.attachment = function(props, attachment) {
                                jQuery('.series-image2').val(attachment.url);
                            }
                            wp.media.editor.open(this);
                            return false;
                        });
                    });
                </script>
            </div>
        <?php
        }
        add_action( 'categorias_add_form_fields', 'add_series_image_field2', 10, 2 );

        // Add Upload fields to "Edit Taxonomy" form
        function journey_series_edit_meta_field2($term) {

            // put the term ID into a variable
            $t_id = $term->term_id;

            // retrieve the existing value(s) for this meta field. This returns an array
            $term_meta = get_option( "categorias_$t_id" ); ?>

            <tr class="form-field">
            <th scope="row" valign="top"><label for="_logo_image2"><?php _e( 'Titulo do banner', 'journey' ); ?></label></th>
                <td>
                    <?php
                      $seriesimage = esc_attr( $term_meta['image2'] ) ? esc_attr( $term_meta['image2'] ) : ''; 
                    ?>
                    <input type="text" name="logo_image2[image2]" id="logo_image2[image2]" class="series-image2" value="<?php echo $seriesimage; ?>">
                    <input class="upload_image_button button" name="_logo_image2" id="_logo_image2" type="button" value="Select/Upload Image" />
                </td>
            </tr>
            <tr class="form-field">
            <th scope="row" valign="top"></th>
                <td style=" height: 120px; ">
                    <style>
                        div.img-wrap {
                            /*background: url('http://placehold.it/960x300') no-repeat center; */
                            background-size:contain; 
                            max-width: 450px; 
                            max-height: 150px; 
                            width: 100%; 
                            height: 100%; 
                            overflow:hidden; 
                        }
                        div.img-wrap img {
                            max-width: 450px;
                        }
                    </style>
                    
                    <div class="img-wrap">
                        <img src="<?php echo $seriesimage; ?>" id="series-img2">
                    </div>
                     
                    <script>
                    jQuery(document).ready(function() {
                        jQuery('#_logo_image2').click(function() {
                            wp.media.editor.send.attachment = function(props, attachment) {
                                jQuery('#series-img2').attr("src",attachment.url)
                                jQuery('.series-image2').val(attachment.url)
                            }
                            wp.media.editor.open(this);
                            return false;
                        });
                    });
                    </script>
                </td>
            </tr>
        <?php
        }
        add_action( 'categorias_edit_form_fields', 'journey_series_edit_meta_field2', 10, 2 );

        // Save Taxonomy Image fields callback function.
        function save_series_custom_meta2( $term_id ) {
            if ( isset( $_POST['logo_image2'] ) ) {
                $t_id = $term_id;
                $term_meta = get_option( "categorias_$t_id" );
                $cat_keys = array_keys( $_POST['logo_image2'] );
                foreach ( $cat_keys as $key ) {
                    if ( isset ( $_POST['logo_image2'][$key] ) ) {
                        $term_meta[$key] = $_POST['logo_image2'][$key];
                    }
                }
                // Save the option array.
                update_option( "categorias_$t_id", $term_meta );
            }
        }
        
        add_action( 'edited_categorias', 'save_series_custom_meta2', 10, 2 );  
        add_action( 'create_categorias', 'save_series_custom_meta2', 10, 2 );






































    //--------- Add term page
        
        function add_cor() {
            // this will add the custom meta field to the add new term page
            ?>
            <div class="form-field">
                <label for="term_meta[cor]"><?php _e( 'Cor Tema', 'pippin' ); ?></label>
                <input type="text" name="term_meta[cor]" id="term_meta[cor]" value="" placeholder="#fff">
                <!--<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>-->
            </div>
        <?php
        }
        // add_action( 'categorias_add_form_fields', 'add_cor', 10, 2 );

        function add_banner_title() {
            // this will add the custom meta field to the add new term page
            ?>
            <div class="form-field">
                <label for="term_meta[b-title]"><?php _e( 'Título do banner(alternativo, se não houver imagem)', 'pippin' ); ?></label>
                <input type="text" name="term_meta[b-title]" id="term_meta[b-title]" value="">
                <!--<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>-->
            </div>
        <?php
        }
        add_action( 'categorias_add_form_fields', 'add_banner_title', 10, 2 );

        function add_banner_desc() {
            // this will add the custom meta field to the add new term page
            ?>
            <div class="form-field">
                <label for="term_meta[b-desc]"><?php _e( 'Descrição do banner', 'pippin' ); ?></label>
                <input type="text" name="term_meta[b-title]" id="term_meta[b-desc]" value="">
            </div>
        <?php
        }
        // add_action( 'categorias_add_form_fields', 'add_banner_desc', 10, 2 );

    //-----------  Edit term page

        function edit_cor($term) {
            // put the term ID into a variable
            $t_id = $term->term_id;

            // retrieve the existing value(s) for this meta field. This returns an array
            $term_meta = get_option( "taxonomy_$t_id" ); ?>
            <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[cor]"><?php _e( 'Cor Tema', 'pippin' ); ?></label></th>
                <td>
                    <input type="text" name="term_meta[cor]" id="term_meta[cor]" value="<?php echo esc_attr( $term_meta['cor'] ) ? esc_attr( $term_meta['cor'] ) : ''; ?>">
                    <!--<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>-->
                </td>
            </tr>
        <?php
        }
        // add_action( 'categorias_edit_form_fields', 'edit_cor', 10, 2 );


        function edit_banner_title($term) {
            // put the term ID into a variable
            $t_id = $term->term_id;

            // retrieve the existing value(s) for this meta field. This returns an array
            $term_meta = get_option( "taxonomy_$t_id" ); ?>
            <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[b-title]"><?php _e( 'Título do banner(alternativo, se não houver imagem.)', 'pippin' ); ?></label></th>
                <td>
                    <input type="text" name="term_meta[b-title]" id="term_meta[b-title]" value="<?php echo esc_attr( $term_meta['b-title'] ) ? esc_attr( $term_meta['b-title'] ) : ''; ?>">
                    <!--<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>-->
                </td>
            </tr>
        <?php
        }
        add_action( 'categorias_edit_form_fields', 'edit_banner_title', 10, 2 );


        function edit_banner_desc($term) {
            // put the term ID into a variable
            $t_id = $term->term_id;

            // retrieve the existing value(s) for this meta field. This returns an array
            $term_meta = get_option( "taxonomy_$t_id" ); ?>
            <tr class="form-field">
            <th scope="row" valign="top"><label for="term_meta[b-desc]"><?php _e( 'Descrição do banner', 'pippin' ); ?></label></th>
                <td>
                    <input type="text" name="term_meta[b-desc]" id="term_meta[b-desc]" value="<?php echo esc_attr( $term_meta['b-desc'] ) ? esc_attr( $term_meta['b-desc'] ) : ''; ?>">
                    <!--<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>-->
                </td>
            </tr>
        <?php
        }
        // add_action( 'categorias_edit_form_fields', 'edit_banner_desc', 10, 2 );
    

    //---------------  Save extra taxonomy fields callback function.
        function save_tax_negocios( $term_id ) {
            if ( isset( $_POST['term_meta'] ) ) {
                $t_id = $term_id;
                $term_meta = get_option( "taxonomy_$t_id" );
                $cat_keys = array_keys( $_POST['term_meta'] );
                foreach ( $cat_keys as $key ) {
                    if ( isset ( $_POST['term_meta'][$key] ) ) {
                        $term_meta[$key] = $_POST['term_meta'][$key];
                    }
                }
                // Save the option array.
                update_option( "taxonomy_$t_id", $term_meta );
            }
        }  
        add_action( 'edited_categorias', 'save_tax_negocios', 10, 2 );  
        add_action( 'create_categorias', 'save_tax_negocios', 10, 2 );

// ---------------------- END ----------------------------
























































// ARRUMAR BUG DE URL
function custom_taxonomy_flush_rewrite() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}
add_action('init', 'custom_taxonomy_flush_rewrite');


