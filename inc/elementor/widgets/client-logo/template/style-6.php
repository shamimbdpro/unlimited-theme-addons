<div class="uta-company-logo-single">
    <div class="uta-company-logo-single-full">
        <?php if ( ! empty( $logo['uta_company_logo_image_normal']['id'] ) ) : ?>
            <?php
                // Use wp_get_attachment_image() for the normal image
                echo wp_get_attachment_image(
                    $logo['uta_company_logo_image_normal']['id'], // Image ID
                    'full', // Image size (can be changed to 'thumbnail', 'medium', etc.)
                    false, // No need for the 'icon' argument
                    [
                        'alt' => esc_attr($uta_company_logo_alt), // Alt text for the image
                    ]
                );
            ?>
        <?php endif; ?>

        <div class="overly">
            <div class="overly-full">
                <h2>
                    <a href="<?php echo esc_url_raw($uta_company_logo_url);?>" target="<?php esc_attr($uta_company_logo_url_is_external); ?>">
                        <?php echo esc_html($logo['uta_company_logo_list_title']);?>
                    </a>
                </h2>
            </div>
        </div>
    </div>
</div>
