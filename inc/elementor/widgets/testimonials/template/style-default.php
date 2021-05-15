<div class="testimonial-<?php echo esc_html($settings['uta_testimonial_style']);?>">
    <div class="row justify-content-center">
        <div class="col-sm-9 text-center">
            <img src="<?php echo esc_url( $testimonial['image']['url'] ); ?>" alt="<?php echo esc_attr( $testimonial['name'] ); ?>">
            <p <?php echo esc_html( $this->get_render_attribute_string( $testimonialText ) ); ?>><?php echo esc_html( $testimonial['feedback'] ); ?></p>
            <?php if ( 'on' == $settings['uta-testimonial-ratings'] ) {?>
                <ul>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                </ul>
            <?php }?>
            <h5 <?php echo esc_html(  $this->get_render_attribute_string( $name ) ); ?>><?php echo esc_html( $testimonial['name'] ); ?></h5>
            <span <?php echo esc_html( $this->get_render_attribute_string( $designation ) ); ?>><?php echo esc_html( $testimonial['designation'] ); ?></span>
        </div>
    </div>
</div>