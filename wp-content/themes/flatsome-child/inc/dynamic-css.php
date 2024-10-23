<?php
/*-----------------------------------------------------------------------------------*/
//	Generate Quick CSS
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'generate_quick_css' ) ) {
    function generate_quick_css() {
        global $hrm_options;
        if ( isset ( $hrm_options['quick_css'] ) ) {
            if ( !empty( $hrm_options['quick_css'] ) ) {
                $quick_css = stripslashes( $hrm_options['quick_css'] );
                if ( !empty( $quick_css ) ) {
                    echo "\n<style type='text/css' id='quick-css'>\n";
                    echo $quick_css . "\n";
                    echo "</style>". "\n\n";
                }
            }
        }
    }
    add_action('wp_head', 'generate_quick_css');
}
?>
