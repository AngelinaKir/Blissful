<?php


if( class_exists( 'WP_Customize_Control' ) ) {
	class Yoga_Meditation_Customizer_Customcontrol_Switch extends WP_Customize_Control {

		// Declare the control type.
		public $type = 'switch';

		// Enqueue scripts and styles for the custom control.
		public function enqueue() {

			// Load style and scripts for deafault switch control.
			wp_enqueue_script( 'yoga-meditation-control-switch', trailingslashit( get_template_directory_uri() ) . 'assets/js/custom-controls.js', array( 'jquery' ) );

			wp_enqueue_style( 'yoga-meditation-control-switch', trailingslashit( get_template_directory_uri() ) . 'assets/css/custom-controls.css', '', time() );

		}

		// Render the control to be displayed in the Customizer.
		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			$choices        = NULL;
			$count          = NULL;
			$class_button   = NULL;
			$class_selected = NULL;
			?>

			<?php if ( !empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>

			<?php if ( !empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<div class="switch-option">

			<?php
				$choices = $this->choices;
			?>

				<?php foreach ( $choices as $value => $label ) : ?>						

						<?php if ( empty( $count ) ) { $class_button = 'cb-enable'; } else { $class_button = 'cb-disable'; } ?>

						<?php if ( $this->value() == esc_attr( $value ) ) { $class_selected = ' selected'; } else { $class_selected = NULL; } ?>
						<?php if ( ! $this->value() and $class_button == 'cb-disable' ) { $class_selected = ' selected'; } ?>

						<label class="<?php echo esc_attr( $class_button ) . esc_attr( $class_selected ); ?>" value="<?php echo esc_attr( $value ); ?>">
							<span><?php echo esc_html( $label ); ?></span>
						</label>

						<?php $count++; ?>

				<?php endforeach; ?>
			</div>

			<input type="hidden" <?php esc_attr( $this->link() ); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
		<?php }
	}
}
// Heading

if( class_exists( 'WP_Customize_Control' ) ) {
	class Yoga_Meditation_Customizer_Customcontrol_Section_Heading extends WP_Customize_Control {
 
 		// Declare the control type.
		public $type = 'section';

		// Render the control to be displayed in the Customizer.
		public function render_content() {
		?>
			<div class="head-customize-section-description cus-head">
				<span class="title head-customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php if ( !empty( $this->description ) ) : ?>
				<span class="description-customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
			</div>
		<?php
		}
	}
}

// Customizer slider control
class Yoga_Meditation_Slider_Custom_Control extends WP_Customize_Control {
	public $type = 'slider_control';
	public function enqueue() {
		wp_enqueue_script( 'yoga-studio-controls-js', trailingslashit( esc_url(get_template_directory_uri()) ) . 'assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core' ), '1.0', true );
		wp_enqueue_style( 'yoga-studio-controls-css', trailingslashit( esc_url(get_template_directory_uri()) ) . 'assets/css/custom-controls.css', array(), '1.0', 'all' );
	}
	public function render_content() {
	?>
		<div class="slider-custom-control">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span><input type="number" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-slider-value"  <?php $this->link(); ?> />
			<div class="slider" slider-min-value="<?php echo esc_attr( $this->input_attrs['min'] ); ?>" slider-max-value="<?php echo esc_attr( $this->input_attrs['max'] ); ?>" slider-step-value="<?php echo esc_attr( $this->input_attrs['step'] ); ?>"></div><span class="slider-reset dashicons dashicons-image-rotate" slider-reset-value="<?php echo esc_attr( $this->input_attrs['reset'] ); ?>"></span>
		</div>
	<?php
	}
}