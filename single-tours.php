<?php
/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$breakfast  = get_field('meals_details_breakfast');
$lunch  = get_field('meals_details_lunch');
$dinner  = get_field('meals_details_dinner');

$transport = get_field('transport_group_transport');

$is_elementor_theme_exist = function_exists( 'elementor_theme_do_location' );

while ( have_posts() ) :
	the_post();
	?>
<div class="container-xl my-4">
	<div class="row">
		<div class="col-12 col-lg-8">
			<main id="content" role="main">
				<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
					<header class="page-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>
				<?php endif; ?>
				<div class="page-content">
					<?php the_content(); ?>
					<div class="post-tags">
						<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
					</div>
					<?php wp_link_pages(); ?>
				</div>
			
				<?php comments_template(); ?>
			</main>
		</div>
		<div class="col-12 col-lg-4">
			<div class="container overflow-hidden text-center">
				<div class="row gx-1">
					<div class="col">
						<div class="bg-light py-4 px-1">
							<div>
								<i class="fa-solid fa-utensils fa-2xl"></i>
							</div>
							<h5 class="text-sm">Included meals</h5>
							<div>
								<?php if($breakfast): ?>
								<div class="text-sm text-secondary">
									Breakfast: <?php echo $breakfast ?>
								</div>
								<?php endif; ?>

								<?php if($lunch): ?>
									<div class="text-sm text-secondary">
										Lunch: <?php echo $lunch ?>
									</div>
								<?php endif; ?>

								<?php if($dinner): ?>
									<div class="text-sm text-secondary">
										Dinner: <?php echo $dinner ?>
									</div>
								<?php endif; ?>

							</div>

						</div>
					</div>
					<div class="col">
						<div class="bg-light py-4 px-1">
							<i class="fa-solid fa-user-tie fa-2xl"></i>
							<h5 class="text-sm">Trip staff</h5>
						</div>
					</div>
					<div class="col">
						<div class="bg-light py-4 px-1">
							<i class="fa-solid fa-van-shuttle fa-2xl"></i>
							<h5 class="text-sm">Transport</h5>
							<?php if($transport): ?>
								<div class="text-sm text-secondary">
									<?php echo "<div>".implode( "<br>", $transport)."</div>"; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


	<?php
endwhile;


get_footer();
