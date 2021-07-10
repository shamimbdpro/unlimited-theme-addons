
<!-- Testimonial Style 4 -->
<div class="uta-testimonial-<?php echo esc_html($settings['uta_testimonial_style']);?>">
    <!-- single -->
    <div class="uta-testimonial-item4">
        <div class="uta-content">
            <div class="uta-thumbnail">
                <img src="<?php echo esc_url( $testimonial['image']['url'] ); ?>" alt="<?php echo esc_attr( $testimonial['name'] ); ?>">
                <div class="icon">
                    <i class="fas fa-quote-right"></i>
                </div>
            </div>
            
            <h2 <?php echo esc_html(  $this->get_render_attribute_string( $name ) ); ?>><?php echo esc_html( $testimonial['name'] ); ?></h2>
            <h5 <?php echo esc_html( $this->get_render_attribute_string( $designation ) ); ?>><?php echo esc_html( $testimonial['designation'] ); ?></h5>
            <?php if ( 'on' == $settings['uta-testimonial-ratings'] ) {?>
                <div class="ratting">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                </div>
            <?php }?>
            <p <?php echo esc_html( $this->get_render_attribute_string( $testimonialText ) ); ?>><?php echo esc_html( $testimonial['feedback'] ); ?></p>
        </div>
    </div>

</div>