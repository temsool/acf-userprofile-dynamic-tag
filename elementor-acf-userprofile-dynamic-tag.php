<?php   
/**
 * Plugin Name: Elementor ACF Userprofile Dynamic Tag
 * Description: Add dynamic tag that returns an ACF field.
 * Plugin URI:  https://github.com/temsool/acf-userprofile-dynamic-tag
 * Version:     1.0.0
 * Author:      Emin
 * Author URI:  https://temsool.com/
 * Text Domain: elementor-acf-userprofile-dynamic-tag
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register New Dynamic Tag Group.
 *
 * Register new site group for site-related tags.
 *
 * @since 1.0.0
 * @param \Elementor\Core\DynamicTags\Manager $dynamic_tags_manager Elementor dynamic tags manager.
 * @return void
 */
function register_site_dynamic_tag_group( $dynamic_tags_manager ) {

	$dynamic_tags_manager->register_group(
		'emin',
		[
			'title' => esc_html__( 'Emin Dynamic Tags', 'emin-tags' )
		]
	);

}
add_action( 'elementor/dynamic_tags/register', 'register_site_dynamic_tag_group' );

/**
 * Register ACF Average Dynamic Tag.
 *
 * Include dynamic tag file and register tag class.
 *
 * @since 1.0.0
 * @param \Elementor\Core\DynamicTags\Manager $dynamic_tags_manager Elementor dynamic tags manager.
 * @return void
 */
function register_ACF_Userprofile_dynamic_tag( $dynamic_tags_manager ) {

	require_once( __DIR__ . '/acf-userprofile-dynamic-tag.php' );

	$dynamic_tags_manager->register( new \Elementor_Dynamic_Tag_ACF_Userprofile );

} 
add_action( 'elementor/dynamic_tags/register', 'register_ACF_Userprofile_dynamic_tag' );




/* 

add_action( 'elementor/dynamic_tags/register_tags', function( $dynamic_tags ) {
	class ACF_Photo_Galery extends Elementor\Core\DynamicTags\Data_Tag {

		public function get_name() {
			return 'acf_photo_galery';
		}

		public function get_categories() {
			return [ 'gallery' ];
		}

		public function get_group() {
			return [ 'acf' ];
		}

		public function get_title() {
			return 'ACF Photo Gallery';
		}
      
		protected function get_value( array $options = [] ) {
         
			$photos = acf_photo_gallery("gallery", get_the_ID());
         
			return $photos;
		}
	}
	$dynamic_tags->register_tag( 'ACF_Photo_Galery' );
} ); */