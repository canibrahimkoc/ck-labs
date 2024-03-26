<?php
/**
 * Template for displaying alternate Explore page with grid results (no-map).
 *
 * @var   $data
 * @var   $explore
 * @since 2.0
 */

wp_print_styles('mylisting-blog-feed-widget');
if (!$data['disable_isotope']) {
	wp_enqueue_script('mylisting-isotope');
}
$data['listing-wrap'] = 'col-lg-3 col-md-4 col-sm-6 grid-item';
?>
<div v-cloak id="c27-explore-listings" :class="['mobile-tab-'+state.mobileTab]" class="no-map-tmpl cts-explore <?php echo $data['types_template'] === 'dropdown' ? 'explore-types-dropdown' : 'explore-types-topbar' ?>">
	<?php if ( $data['types_template'] === 'topbar' ): ?>
		<?php require locate_template( 'templates/explore/partials/topbar.php' ) ?>
	<?php endif ?>

	<?php require locate_template( 'templates/explore/partials/primary-filters.php' ) ?>

	<div class="finder-container fc-type-2">

		<div class="finder-search collapse min-scroll" id="finderSearch" :class="( state.mobileTab === 'filters' ? '' : 'visible-lg' )">
			<div class="finder-tabs-wrapper">
				<?php require locate_template( 'templates/explore/partials/sidebar.php' ) ?>
			</div>
		</div>
		<div class="finder-overlay"></div>
	</div>
	<section class="i-section explore-type-2" :class="( state.mobileTab === 'results' ? '' : 'visible-lg' )">
		<div class="container">
			<?php if ( $data['explore_pagination'] === 'load-more' ): ?>
				<div class="row results-view fc-type-2-results"
				:class="{
					loading: loading,
					grid: isotope
				}"
				v-show="found_posts !== 0"></div>
				
			<?php else: ?>
				<div class="row results-view fc-type-2-results" :class="isotope ? 'grid' : ''" v-show="!loading && found_posts !== 0"></div>
			<?php endif ?>

			<?php require locate_template( 'templates/explore/partials/compare-bar.php' ) ?>

			<div class="no-results-wrapper" v-show="!loading && found_posts === 0">
				<i class="no-results-icon mi mood_bad"></i>
				<li role="presentation" class="no_job_listings_found">
					<?php _e( 'There are no listings matching your search.', 'my-listing' ) ?>
					<a href="#" class="reset-results-27 full-width" @click.prevent="resetFilters($event); getListings('reset', true);">
						<i class="mi refresh"></i>
						<?php _e( 'Reset Filters', 'my-listing' ) ?>
					</a>
				</li>
			</div>

			<div class="loader-bg" v-show="loading">
				<?php c27()->get_partial( 'spinner', [
					'color' => '#777',
					'classes' => 'center-vh',
					'size' => 28,
					'width' => 3,
				] ) ?>
			</div>

			<?php if ( $data['explore_pagination'] === 'load-more' ): ?>
				<load-more-results inline-template>
					<div class="load-more-btn">
						<a v-show="!$root.loading && $root.found_posts !== 0 && canLoadMore" href="#" @click.prevent="loadMore" class="buttons full-width button-5"><?php _ex('Load more', 'Explore page', 'my-listing') ?></a>
					</div>
				</load-more-results>
			<?php else: ?>
				<div class="row center-button pagination c27-explore-pagination" v-show="!loading"></div>
			<?php endif ?>
		</div>
	</section>

	<?php require locate_template( 'templates/explore/partials/mobile-nav.php' ) ?>
</div>
<?php wp_enqueue_script('mylisting-explore'); ?>