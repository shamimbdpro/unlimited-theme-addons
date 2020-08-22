<?php 
namespace Elementor;

trait Digitalshop_Helper
{
    
    /**
     *   Woocommece product category
    */
  
    public function digitalshop_woocommerce_product_categories()
    {
        $terms = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
        ));

        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }


}




 ?>