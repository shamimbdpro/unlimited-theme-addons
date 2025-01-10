<div class="uta-company-logo-item-single">
    <a href="<?php echo esc_url_raw($uta_company_logo_url); ?>" target="<?php echo esc_attr($uta_company_logo_url_is_external); ?>">
        <?php
            // Get the attachment ID for the logo image
            $attachment_id = attachment_url_to_postid($logo['uta_company_logo_image_normal']['url']);

            // Use wp_get_attachment_image() to output the image
            echo wp_get_attachment_image($attachment_id, 'full', false, array(
                'alt' => esc_attr($uta_company_logo_alt),
                'class' => 'company-logo-image', // Optional: Add a class if needed
            ));
        ?>
    </a>
</div>
