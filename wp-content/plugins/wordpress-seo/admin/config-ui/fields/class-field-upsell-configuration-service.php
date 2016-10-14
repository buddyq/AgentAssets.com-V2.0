<?php
/**
 * @package WPSEO\Admin\ConfigurationUI
 */

/**
 * Class WPSEO_Config_Field_Upsell_Configuration_Service
 */
class WPSEO_Config_Field_Upsell_Configuration_Service extends WPSEO_Config_Field {

	/**
	 * WPSEO_Config_Field_Upsell_Configuration_Service constructor.
	 */
	public function __construct() {
		parent::__construct( 'upsellConfigurationService', 'HTML' );

<<<<<<< HEAD
<<<<<<< HEAD
		$intro_text = __( 'Welcome to the Yoast SEO configuration wizard. In a few simple steps we\'ll help you configure your SEO settings to match your website\'s needs!', 'wordpress-seo' );
=======
		$intro_text = __( 'Welcome to the Yoast SEO installation wizard. In a few simple steps we\'ll help you configure your SEO settings to match your website\'s needs!', 'wordpress-seo' );
>>>>>>> cbca85a547a01e619731d4a6c8e5344390fa2dc6
=======
		$intro_text = __( 'Welcome to the Yoast SEO installation wizard. In a few simple steps we\'ll help you configure your SEO settings to match your website\'s needs!', 'wordpress-seo' );
>>>>>>> cbca85a547a01e619731d4a6c8e5344390fa2dc6

		/* Translators: %1$s opens the link, %2$s closes the link. */
		$upsell_text = sprintf(
			__( 'While we strive to make setting up Yoast SEO as easy as possible, we understand it can be daunting. If you’d rather have us set up Yoast SEO for you (and get a copy of Yoast SEO Premium in the process), order our %1$sYoast SEO configuration service%2$s here!', 'wordpress-seo' ),
			'<a target="_blank" href="https://yoa.st/configuration-package">',
			'</a>'
		);

		$html = '<p>' . $intro_text . '</p>';
		$html .= '<p><em>' . $upsell_text . '</em></p>';


		$this->set_property( 'html', $html );
	}
}
