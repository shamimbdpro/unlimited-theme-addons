<div class="testimonial-<?php echo esc_attr( $settings['uta_testimonial_style'] ); ?>">
    <div class="row justify-content-center">
        <div class="col-sm-9 text-center">
            <!-- Check if image ID exists and use wp_get_attachment_image() -->
            <?php if ( ! empty( $testimonial['image']['id'] ) ) : ?>
                <?php 
                    // Get the image ID from the testimonial array and display it using wp_get_attachment_image()
                    echo wp_get_attachment_image( $testimonial['image']['id'], 'full', false, [
                        'alt' => esc_attr( $testimonial['name'] ),
                        'class' => 'testimonial-image' // Optional: add custom class for styling
                    ]);
                ?>
            <?php endif; ?>

            <!-- Testimonial text output with safe attributes -->
            <p <?php echo esc_html( $this->get_render_attribute_string( $testimonialText ) ); ?>>
                <?php echo esc_html( $testimonial['feedback'] ); ?>
            </p>

            <!-- Ratings display if enabled -->
            <?php if ( 'on' == $settings['uta-testimonial-ratings'] ) : ?>
                <ul>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                </ul>
            <?php endif; ?>

            <!-- Name and designation with safe attributes -->
            <h5 <?php echo esc_html( $this->get_render_attribute_string( $name ) ); ?>>
                <?php echo esc_html( $testimonial['name'] ); ?>
            </h5>
            <span <?php echo esc_html( $this->get_render_attribute_string( $designation ) ); ?>>
                <?php echo esc_html( $testimonial['designation'] ); ?>
            </span>
        </div>
    </div>
</div>
