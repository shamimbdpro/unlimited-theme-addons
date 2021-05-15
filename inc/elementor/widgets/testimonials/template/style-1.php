<div class="testimonial-<?php echo esc_html($settings['uta_testimonial_style']);?>">
    <!-- single -->
    <div class="testimonial-item1">
        <div class="thumbnail">
            <img src="<?php echo esc_url( $testimonial['image']['url'] ); ?>" alt="<?php echo esc_attr( $testimonial['name'] ); ?>">
        </div>
        <div class="content">
            <h2 <?php echo esc_html(  $this->get_render_attribute_string( $name ) ); ?>><?php echo esc_html( $testimonial['name'] ); ?></h2>
            <h5 <?php echo esc_html( $this->get_render_attribute_string( $designation ) ); ?>><?php echo esc_html( $testimonial['designation'] ); ?></h5>
            <p <?php echo esc_html( $this->get_render_attribute_string( $testimonialText ) ); ?>><?php echo esc_html( $testimonial['feedback'] ); ?></p>
        </div>
    </div>
</div>