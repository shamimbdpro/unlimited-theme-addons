<!-- Testimonial Style 5 -->
<div class="uta-testimonial-<?php echo esc_html($settings['uta_testimonial_style']);?>">
    <!-- single -->
    <div class="uta-testimonial-item5">
        <div class="uta-content">
            <p <?php echo esc_html( $this->get_render_attribute_string( $testimonialText ) ); ?>>
                <?php echo esc_html( $testimonial['feedback'] ); ?>
            </p>
        </div>
        <div class="uta-thumbnail">
            <?php if ( ! empty( $testimonial['image']['id'] ) ) : ?>
                <?php 
                    // Use wp_get_attachment_image() to retrieve and display the image with the attachment ID
                    echo wp_get_attachment_image( 
                        $testimonial['image']['id'], // Image ID
                        'full', // Image size (can be changed to other sizes like 'thumbnail', 'medium', etc.)
                        false, // No need for the 'icon' argument in this case
                        [
                            'alt' => esc_attr( $testimonial['name'] ), // Alt text for the image
                            'class' => 'uta-thumbnail-img' // Optional: add a custom class for styling
                        ]
                    );
                ?>
            <?php endif; ?>
            <div class="uta-thumbnail-content-5">
                <h2 <?php echo esc_html( $this->get_render_attribute_string( $name ) ); ?>>
                    <?php echo esc_html( $testimonial['name'] ); ?>
                </h2>
                <h5 <?php echo esc_html( $this->get_render_attribute_string( $designation ) ); ?>>
                    <?php echo esc_html( $testimonial['designation'] ); ?>
                </h5>
                <?php if ( 'on' == $settings['uta-testimonial-ratings'] ) : ?>
                    <div class="ratting">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
