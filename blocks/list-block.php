<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

/**
 * Indicates if current integration is allowed to load.
 *
 * @since 17
 *
 * @return bool
 */
function vsel_list_block_allow_load() {
    return function_exists( 'register_block_type' );
}

/**
 * Loads an integration.
 *
 * @since 17
 */
function vsel_list_block_load() {
    vsel_list_block_hooks();
}

/**
 * Integration hooks.
 *
 * @since 17
 */
function vsel_list_block_hooks() {
    add_action( 'init', 'vsel_list_block_register_block' );
    add_action( 'enqueue_block_editor_assets', 'vsel_list_block_enqueue_block_editor_assets' );
}

/**
 * Register Very Simple Event List Gutenberg block in the backend.
 *
 * @since 17
 */
function vsel_list_block_register_block() {
    wp_register_style(
        'vsel-blocks-styles',
        trailingslashit( VSEL_PLUGIN_URL ) . 'css/vsel-blocks.css',
        array( 'wp-edit-blocks' ),
        VSEL_VERSION
    );

    $attributes = array(
        'shortcodeSettings' => array(
            'type' => 'string',
        ),
        'noNewChanges'      => array(
            'type' => 'boolean',
        ),
        'executed'          => array(
            'type' => 'boolean',
        ),
        'listType'          => array(
            'type' => 'string',
        )
    );

    register_block_type(
        'vsel/vsel-event-list-block',
        array(
            'attributes'      => $attributes,
            'render_callback' => 'vsel_list_block_get_event_html',
        )
    );
}

/**
 * Load Very Simple Event List Gutenberg block scripts.
 *
 * @since 17
 */
function vsel_list_block_enqueue_block_editor_assets() {
    vsel_css_script(); // Add the front-end CSS file
    wp_enqueue_style( 'vsel-blocks-styles' );
    wp_enqueue_script(
        'vsel-blocks-scripts',
        trailingslashit( VSEL_PLUGIN_URL ) . 'js/vsel-blocks.js',
        array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
        VSEL_VERSION,
        true
    );

    $shortcodeSettings = '';

    $i18n = array(
        'title'             => esc_html__( 'Event List', 'very-simple-event-list' ),
        'addSettings'       => esc_html__( 'Add Settings', 'very-simple-event-list' ),
        'shortcodeSettings' => esc_html__( 'Shortcode Settings', 'very-simple-event-list' ),
        'listType'          => esc_html__( 'List Type', 'very-simple-event-list' ),
        'example'           => esc_html__( 'Example', 'very-simple-event-list' ),
        'preview'           => esc_html__( 'Apply Changes', 'very-simple-event-list' ),
    );

    wp_localize_script(
        'vsel-blocks-scripts',
        'vsel_block_editor',
        array(
            'wpnonce'           => wp_create_nonce( 'vsel-blocks' ),
            'shortcodeSettings' => $shortcodeSettings,
            'listTypes' => array(
                array(
                    'id' => 'vsel',
                    'label' => esc_html__( 'Upcoming Events (today included)', 'very-simple-event-list' )
                ),
                array(
                    'id' => 'vsel-future-events',
                    'label' => esc_html__( 'Upcoming Events (today not included)', 'very-simple-event-list' )
                ),
                array(
                    'id' => 'vsel-current-events',
                    'label' => esc_html__( 'Current Events', 'very-simple-event-list' )
                ),
                array(
                    'id' => 'vsel-past-events',
                    'label' => esc_html__( 'Past Events (before today)', 'very-simple-event-list' )
                ),
                array(
                    'id' => 'vsel-all-events',
                    'label' => esc_html__( 'Show All Events', 'very-simple-event-list' )
                ),
            ),
            'i18n' => $i18n,
        )
    );
}

/**
 * Get form HTML to display in a Very Simple Event List Gutenberg block.
 *
 * @param array $attr Attributes passed by Very Simple Event List Gutenberg block.
 *
 * @since 17
 *
 * @return string
 */
function vsel_list_block_get_event_html( $attr ) {

    $return = '';
    $list_type = isset( $attr['listType'] ) ? sanitize_text_field( wp_unslash( $attr['listType'] ) ) : 'vsel';

    $shortcode_settings = isset( $attr['shortcodeSettings'] ) ? $attr['shortcodeSettings'] : '';

    $shortcode_settings = str_replace( array( '[vsel', ']' ), '', $shortcode_settings );

    $return .= do_shortcode( '[' . $list_type . ' ' . $shortcode_settings . ']' );

    return $return;
}

/**
 * Checking if is Gutenberg REST API call.
 *
 * @since 17
 *
 * @return bool True if is Gutenberg REST API call.
 */
function vsel_list_block_is_gb_editor() {

    // TODO: Find a better way to check if is GB editor API call.
    return defined( 'REST_REQUEST' ) && REST_REQUEST && ! empty( $_REQUEST['context'] ) && 'edit' === $_REQUEST['context']; // phpcs:ignore
}
