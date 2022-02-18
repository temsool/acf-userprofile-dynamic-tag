<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/** 
 * Elementor Dynamic Tag - ACF Userprofile
 *
 * Elementor dynamic tag that returns an ACF Userprofile.
 *
 * @since 1.0.0
 */
class Elementor_Dynamic_Tag_ACF_Userprofile extends \Elementor\Core\DynamicTags\Data_Tag {

	/**
	 * Get dynamic tag name.
	 *
	 * Retrieve the name of the ACF Userprofile tag.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Dynamic tag name.
	 */
	public function get_name() {
		return 'acf-userprofile';
	}

	/**
	 * Get dynamic tag title.
	 *
	 * Returns the title of the ACF Userprofile tag.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Dynamic tag title.
	 */
	public function get_title() {
		return esc_html__( 'ACF Userprofile', 'elementor-acf-userprofile-dynamic-tag' );
	}

	/**
	 * Get dynamic tag groups.
	 *
	 * Retrieve the list of groups the ACF Userprofile tag belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Dynamic tag groups.
	 */

    public function get_group() {
        return [ 'emin' ];
    }
	/**
	 * Get dynamic tag categories.
	 *
	 * Retrieve the list of categories the ACF Userprofile tag belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Dynamic tag categories.
	 */
	public function get_categories() {
        return [ 'image' ];

	return [ \Elementor\Modules\DynamicTags\Module::IMAGE_CATEGORY ];
 
	}

	/** 
	 * Register dynamic tag controls.
	 *
	 * Add input fields to allow the user to customize the ACF Userprofile tag settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return void
	 */
	protected function register_controls() {
	/* 	$this->add_control(
			'fields',
			[
				'label' => esc_html__( 'Fields', 'elementor-acf-userprofile-dynamic-tag' ),
				'type' => 'image',
			]
		); */
	}

	/**
	 * Render tag output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
    // public function render() {
	

	// 	$value = "XXXXXXXXXXXX";
	// 	echo wp_kses_post( $value );
	// }


    protected function get_value( array $options = [] ) {
         
     	// Make sure that ACF if installed and activated
		if ( ! function_exists( 'get_field' ) ) {
			echo 0;
			return;
		}
        $user_id=get_current_user_id();
       // Get the file id
    $image_id = get_user_meta($user_id, 'tsm_local_avatar', true); // CHANGE TO YOUR FIELD NAME
    //    $avatarURL = get_avatar_url( $id_or_email, $args );
      $image_url  = wp_get_attachment_image_src( $image_id, 'medium' ); // Set image size by name
       // Get the file url
       $avatar_url = $image_url[0];
      $avatar='<img class="user-avatar" src="'.$avatar_url.'" />';
      return [
        'id' =>  $image_id, // attachment id
        'url' => $avatar_url, // attacment URL
    ];
 //     echo  $avatar;
    }

}