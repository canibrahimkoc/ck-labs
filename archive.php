<?php
/**
 * The template for displaying archive pages.
 *
 * @since 1.0.0
 */
get_header();
global $wp_query;
$title = get_the_archive_title();
$description = get_the_archive_description();
?>

<div class="archive-page">
	<section class="i-section archive-heading <?php echo ! $description ? 'no-description' : '' ?>">
		<div class="container">
			<div class="row section-title">
				<h1 class="case27-primary-text"><?php echo $title ?></h1>
			</div>

			<?php if ( $description ): ?>
				<div class="row section-body archive-description text-center">
					<div class="col-md-12">
						<?php echo $description ?>
					</div>
				</div>
			<?php endif ?>
		</div>
	</section>

	<section class="i-section archive-posts">
		<div class="container">

		<?php if ( have_posts() ): ?>
				<?php wp_print_styles('mylisting-blog-feed-widget'); ?>
				<div id="submit-job-form" class="row section-body grid">
					<?php while ( have_posts() ): the_post(); ?>
    					<?php global $post;
						
						c27()->get_partial( 'post-preview', [
							'wrap_in' => 'form-section-wrapper col-md-12 col-sm-12 col-xs-12',
							'post_id' => $post->ID,
						] );
						?>
					<?php endwhile ?>
				</div>

				<div class="blog-footer">
					<div class="row project-changer">
						<div class="text-center">
							<?php echo paginate_links() ?>
						</div>
					</div>
				</div>

			<?php else: ?>

				<div class="row text-center">
					<div>
						<i class="no-results-icon material-icons mood_bad"></i>
						<p><?php _e( 'No results. Try another search?', 'my-listing' ) ?></p>
						<?php echo get_search_form() ?>
					</div>
				</div>

			<?php endif ?>

		</div>
	</section>

	<script>
		jQuery(function(i) {

			var o, r, e, t, a, n = {};
			n.Nav = {
				clearAll: function() {
					// a.find("li").removeClass("active")
				},
				highlight: function(id) {
					// e = a.find("#" + e + "-nav");
					// e.length && e.addClass("active")
				}
			};
			(e = i("#submit-job-form .form-section-wrapper")).length <= 1 || (o = 70 * window.innerHeight / 100,
			r = 5 * window.innerHeight / 100,
			i(window).on("scroll", MyListing.Helpers.debounce(function() {
				var a = []
				, t = (e.each(function(e, t) {
					var n = t.getBoundingClientRect()
					, i = o - n.top
					, n = r - n.top;
					0 <= i && a.push({
						el: t,
						diff: i,
						max_diff: n
					})
				}),
				e.removeClass("active"),
				n.Nav.clearAll(),
				!1);
				a.reverse().forEach(function(e) {
					t ? e.max_diff <= 0 && (e.el.classList.add("active"),
					n.Nav.highlight(e.el.id)) : (e.el.classList.add("active"),
					t = !0,
					n.Nav.highlight(e.el.id))
				})
			}, 20)).scroll())
		})
	</script>
</div>

<?php get_footer();
