<?php
/**
 * Text Field
 *
 * A simple text field callback to use with the Settings API. Don't forget to pass in
 * the arguments array. Here's an example call to add_settings_field() :
 *
 * add_settings_field( 'my_option', __( 'My Option' ), 'foo_field_text', 'theme_options', 'general', array(
 *     'name' => 'my_theme_options[my_option]',
 *     'value' => $options['my_option'], // assuming $options is declared
 *     'description' => __( 'Write some description for the field here.' ),
 * ) );
 */
function foo_field_text( $args ) {
	extract( wp_parse_args( $args, array(
		'name' => null,
		'value' => null,
		'description' => null,
	) ) );
	?>
	<input type="text" name="<?php esc_attr_e( $name ); ?>" value="<?php esc_attr_e( $value ); ?>" />
	<?php if ( $description ) : ?><span class="description"><?php echo $description; ?></span><?php endif; ?>
	<?php
}