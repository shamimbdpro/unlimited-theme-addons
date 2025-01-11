<!-- Testimonial Style 1 -->
<div class="uta-testimonial-<?php echo esc_html($settings['uta_testimonial_style']);?>">
    <!-- single -->
    <div class="uta-testimonial-item1">
        <div class="uta-thumbnail">
            <?php if ( ! empty( $testimonial['image']['id'] ) ) : ?>
                <?php
                    // Use wp_get_attachment_image() to display the image
                    echo wp_get_attachment_image(
                        $testimonial['image']['id'], // Image ID
                        'full', // Image size (can be changed to 'thumbnail', 'medium', etc.)
                        false, // No need for the 'icon' argument
                        [
                            'alt' => esc_attr( $testimonial['name'] ), // Alt text for the image
                        ]
                    );
                ?>
            <?php endif; ?>
            <h2 <?php echo esc_html(  $this->get_render_attribute_string( $name ) ); ?>><?php echo esc_html( $testimonial['name'] ); ?></h2>
            <h5 <?php echo esc_html( $this->get_render_attribute_string( $designation ) ); ?>><?php echo esc_html( $testimonial['designation'] ); ?></h5>
        </div>
        <div class="uta-content">
            <?php if ( 'on' == $settings['uta-testimonial-ratings'] ) : ?>
                <div class="ratting">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                </div>
            <?php endif; ?>

            <p <?php echo esc_html( $this->get_render_attribute_string( $testimonialText ) ); ?>>
                <?php echo esc_html( $testimonial['feedback'] ); ?>
            </p>
        </div>
    </div>
</div>
