<?php

/**
 * Customer_Chat_for_Facebook
 *
 * @package   Customer_Chat_for_Facebook
 * @author    Sam Carlton <sam@sam.lc>
 * @copyright 2018 Sam Carlton Creative
 * @license   GPL 2.0+
 * @link      https://samcarlton.com
 */

/**
 * All the CMB related code.
 */
class Ccff_CMB extends Ccff_Base {

	/**
	 * Initialize CMB2.
	 *
	 * @since 1.1.0
	 */
	public function initialize() {
        parent::initialize();
		require_once(  CCFF_PLUGIN_ROOT . 'vendor/cmb2/init.php' );
		require_once(  CCFF_PLUGIN_ROOT . 'vendor/cmb2-grid/Cmb2GridPluginLoad.php' );
		add_action( 'cmb2_init', array( $this, 'cmb_demo_metaboxes' ) );
	}

	/**
	 * Your metabox on Demo CPT
	 *
	 * @since 1.1.0
	 *
	 * @return void
	 */
	public function cmb_demo_metaboxes() {
		// Start with an underscore to hide fields from custom fields list
		$prefix   = '_demo_';
		$cmb_demo = new_cmb2_box( array(
			'id'            => $prefix . 'metabox',
			'title'         => __( 'Demo Metabox', CCFF_TEXTDOMAIN ),
			'object_types'  => array( 'demo' ),
			'context'       => 'normal',
			'priority'      => 'high',
			'show_names'    => true, // Show field names on the left
			'vertical_tabs' => true, // Set vertical tabs, default false
			'tabs'          => array(
				array(
					'id'     => 'tab-1',
					'icon'   => 'dashicons-admin-site',
					'title'  => 'Tab 1',
					'fields' => array(
						CCFF_TEXTDOMAIN . '_text',
						CCFF_TEXTDOMAIN . '_text2',
					),
				),
				array(
					'id'     => 'tab-2',
					'icon'   => 'dashicons-align-left',
					'title'  => 'Tab 2',
					'fields' => array(
                        CCFF_TEXTDOMAIN . '_textsmall',
						CCFF_TEXTDOMAIN . '_textsmall2',
					),
				),
			),
		) );
		$cmb2Grid = new \Cmb2Grid\Grid\Cmb2Grid( $cmb_demo );
		$row = $cmb2Grid->addRow();
		$field1 = $cmb_demo->add_field( array(
			'name' => __( 'Text', CCFF_TEXTDOMAIN ),
			'desc' => __( 'field description (optional)', CCFF_TEXTDOMAIN ),
			'id'   => $prefix . CCFF_TEXTDOMAIN . '_text',
			'type' => 'text',
				) );
		$field2 = $cmb_demo->add_field( array(
			'name' => __( 'Text 2', CCFF_TEXTDOMAIN ),
			'desc' => __( 'field description (optional)', CCFF_TEXTDOMAIN ),
			'id'   => $prefix . CCFF_TEXTDOMAIN . '_text2',
			'type' => 'text',
				) );

		$field3 = $cmb_demo->add_field( array(
			'name' => __( 'Text Small', CCFF_TEXTDOMAIN ),
			'desc' => __( 'field description (optional)', CCFF_TEXTDOMAIN ),
			'id'   => $prefix . CCFF_TEXTDOMAIN . '_textsmall',
			'type' => 'text_small',
				) );
		$field4 = $cmb_demo->add_field( array(
			'name' => __( 'Text Small 2', CCFF_TEXTDOMAIN ),
			'desc' => __( 'field description (optional)', CCFF_TEXTDOMAIN ),
			'id'   => $prefix . CCFF_TEXTDOMAIN . '_textsmall2',
			'type' => 'text_small',
		) );
		$row->addColumns( array( $field1, $field2 ) );
		$row = $cmb2Grid->addRow();
		$row->addColumns( array( $field3, $field4 ) );
	}

}