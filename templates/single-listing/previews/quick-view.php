<?php
   /**
    * Listing "Quick View" template.
    *
    * @var   \MyListing\Src\Listing $listing
    * @since 1.0
    */
   if ( ! defined('ABSPATH') ) {
   	exit;
   }
   
   if ( ! ( $listing && $listing->type ) ) {
       return;
   }
   
   // preview/quick-view card options
   $options = $listing->type->get_preview_options();
   $is_caching = false;
   
   $taxonomies = array_merge( [
   	'job_listing_category' => 'job_category',
   	'case27_job_listing_tags' => 'job_tags',
   	'region' => 'region',
   ], mylisting_custom_taxonomies( 'slug', 'slug' ) );
   $taxonomy = $options['quick_view']['taxonomy'] ? $options['quick_view']['taxonomy'] : 'job_listing_category';
   $taxonomy_label = $options['quick_view']['taxonomy_label'];
   if ( isset( $taxonomies[ $taxonomy ] ) ) {
   	$categories = $listing->get_field( $taxonomies[ $taxonomy ] );
   }
   wp_enqueue_script( 'mylisting-photoswipe' );
   wp_print_styles('mylisting-photoswipe');
   $img_ID = c27()->get_attachment_by_guid( $gallery_image );
   if (isset($img_ID)) {
   	$img_alt = get_post_meta($img_ID, '_wp_attachment_image_alt', true);
   	$img_title = get_the_title($img_ID);
   	$img_caption = wp_get_attachment_caption($img_ID);
   	$img_description = get_post($img_ID)->post_content;
   }
   $listing_thumbnail = $listing->get_logo( 'thumbnail' ) ?: c27()->image( 'marker.jpg' );
   $quick_view_template = $options['quick_view']['template'];
   if ( ! ( $listing->get_locations('lat') && $listing->get_locations('lng') ) ) {
   	$quick_view_template = 'alternate';
   }
   
   $location_field = $listing->get_field_object('location');
   
   $location_arr = [];
   if ( $location_field && $location_field->get_value() ) {
   	$locations = $listing->get_field('location');
   
   	foreach ( (array) $locations as $key => $value ) {
   		if ( ! $value || ! is_array( $value ) || empty( $value['address'] ) ) {
   			continue;
   		}
   
   		$location_arr[] = [
   	        'marker_lat' => $value['lat'],
   	        'marker_lng' => $value['lng'],
   	    	'address' 	=> $value['address'],
   	        'marker_image' => [ 'url' => $listing_thumbnail ],
   	    ];
   	}
   }
   
   if ( $listing->get_priority() >= 2 ) {
       $wrapper_classes[] = $priority_class = 'level-promoted';
       $promotion_tooltip = _x( 'Promoted', 'Listing Preview Card: Promoted Tooltip Title', 'my-listing' );
   } elseif ( $listing->get_priority() === 1 ) {
       $wrapper_classes[] = $priority_class = 'level-featured';
       $promotion_tooltip = _x( 'Featured', 'Listing Preview Card: Promoted Tooltip Title', 'my-listing' );
   } else {
       $wrapper_classes[] = $priority_class = 'level-normal';
       $promotion_tooltip = '';
   } ?>
<?php
   if ( has_action( sprintf( 'mylisting/quick-view-template:%s', $quick_view_template ) ) ) {
       do_action( sprintf( 'mylisting/quick-view-template:%s', $quick_view_template ), $listing, $listing->type );
   } elseif ( $_quick_view_template = locate_template( sprintf( 'templates/single-listing/quick-view/%s.php', $quick_view_template ) ) ) {
       require $_quick_view_template;
   } else { ?>
<div class="listing-quick-view-container listing-preview <?php echo esc_attr( "quick-view-{$quick_view_template} quick-view type-{$listing->type->get_slug()} tpl-{$quick_view_template}" ) ?>">
   <div class="mc-left">
      <div class="lf-item-container">
         <div class="lf-item">
            <?php if ($options['background']['type'] == 'gallery' && ( $gallery = $listing->get_field( 'gallery' ) ) ): ?>
            <div class="pc-slider">
               <div class="pc-slides">
                  <?php foreach ( array_slice( $gallery, 0, $gallery_count ) as $gallery_image ): ?>
                  <img alt="Gallery image" src="<?php echo esc_url( c27()->get_resized_image( $gallery_image, 'large' ) ) ?>" class="single-slide">
                  <?php endforeach ?>
               </div>
               <div class="gallery-nav">
                  <ul>
                     <li><span aria-label="Prev" href="#" class="pc-slide-prev"><i class="mi keyboard_arrow_left"></i></span></li>
                     <li><span aria-label="Next" href="#" class="pc-slide-next"><i class="mi keyboard_arrow_right"></i></span></li>
                  </ul>
               </div>
            </div>
            <?php else: $options['background']['type'] = 'image'; endif; // Fallback to cover image if no gallery images are present ?>
            <?php if ($options['background']['type'] == 'image' && ( $gallery = $listing->get_field( 'gallery' ) ) ): ?>

				<?php foreach ( array_slice( $gallery, 0, $gallery_count ) as $gallery_image ): ?>
				<a class="item photoswipe-item" href="<?php echo esc_url( c27()->get_resized_image( $gallery_image, 'full' ) ? : $image ) ?>">
					<img alt="Gallery image" src="<?php echo esc_url( c27()->get_resized_image( $gallery_image, 'large' ) ) ?>" class="single-slide">
				</a>
                  
                  <?php endforeach ?>
            <?php endif ?>
            <div class="lf-item-info">
               <h4>
                  <?php echo apply_filters( 'the_title', $listing->get_name(), $listing->get_id() ) ?>
                  <?php if ( $listing->is_verified() ): ?>
                  <img height="18" width="18" alt="<?php echo esc_attr( _ex( 'Verified listing', 'Alt text for verified icon', 'my-listing' ) ) ?>" class="verified-listing" src="<?php echo esc_url( c27()->image('tick.svg') ) ?>">
                  <?php endif ?>
               </h4>
               <?php
                  /**
                   * Include info fields template.
                   *
                   * @since 1.0
                   */
                  require locate_template( 'templates/single-listing/previews/partials/info-fields.php' ) ?>
            </div>
            <?php
               /**
                * Include head buttons template.
                *
                * @since 1.0
                */
               require locate_template( 'templates/single-listing/previews/partials/head-buttons.php' ) ?>
         </div>
      </div>
   </div>
</div>
<?php }