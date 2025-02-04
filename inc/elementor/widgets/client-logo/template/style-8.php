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

        <a class="uta-partner-overly" href="<?php echo esc_url_raw($uta_company_logo_url);?>">
            <?php if ( ! empty( $logo['uta_company_logo_image_hover']['id'] ) ) : ?>
                <?php
                    // Use wp_get_attachment_image() for the hover image
                    echo wp_get_attachment_image(
                        $logo['uta_company_logo_image_hover']['id'], // Image ID
                        'full', // Image size (can be changed to 'thumbnail', 'medium', etc.)
                        false, // No need for the 'icon' argument
                        [
                            'alt' => esc_attr($uta_company_logo_hover_alt), // Alt text for the image
                        ]
                    );
                ?>
            <?php endif; ?>
        </a>
    </div>
</div>
