<?php
/**
 * The site's entry point.
 *
 * Loads the relevant template part,
 * the loop is executed (when needed) by the relevant template part.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
$breakfast = get_field('meals_details_breakfast');
$lunch = get_field('meals_details_lunch');
$dinner = get_field('meals_details_dinner');

$transport = get_field('transport_group_transport');

$is_elementor_theme_exist = function_exists('elementor_theme_do_location');

while (have_posts()) :
	the_post();
	?>
	<div class="container-xl my-4">
		<div class="row">
			<div class="col-12 col-lg-8">
				<main id="content" role="main">
					<?php if (apply_filters('hello_elementor_page_title', true)) : ?>
						<header class="page-header">
							<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
						</header>
					<?php endif; ?>
					<div class="page-content">
						<?php the_content(); ?>
						<div class="post-tags">
							<?php the_tags('<span class="tag-links">' . __('Tagged ', 'hello-elementor'), null, '</span>'); ?>
						</div>
						<?php wp_link_pages(); ?>
					</div>
					<div>
						<?php

						// Check rows existexists.
						if (have_rows('day_itinerary')):
							?>
							<h4>Tour Itinerary</h4>
							<div class="accordion" id="itinerary">
									<?php
									// Loop through rows.
									$iteration = 1;
									while (have_rows('day_itinerary')) :
										the_row();
										?>
										<div class="accordion-item">
											<?php

										// Load sub field value.
										$title = get_sub_field('title');
										$description = get_sub_field('description');
										?>
										<h2 class="accordion-header" id="flush-heading<?php echo $iteration ?>">
											<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $iteration ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $iteration ?>">
												<?php echo $title  ?>
											</button>
										</h2>
									<div id="collapse<?php echo $iteration?>" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#itinerary">
										<div class="accordion-body">
											<?php  echo $description ?>
										</div>
									</div>
										<?php
										$iteration++;
										echo '</div>';

										// End loop.
									endwhile;
								// No value.
								else :
									// Do something...
									?>
							</div>
						<?php
						endif;
						?>
					</div>
			</div>
					<div class="accordion" id="accordionExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingOne">
								<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Accordion Item #1
								</button>
							</h2>
							<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingTwo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Accordion Item #2
								</button>
							</h2>
							<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
								</div>
							</div>
						</div>
						<div class="accordion-item">
							<h2 class="accordion-header" id="headingThree">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									Accordion Item #3
								</button>
							</h2>
							<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
								<div class="accordion-body">
									<strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
								</div>
							</div>
						</div>
					</div>
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
								<?php if ($breakfast): ?>
									<div class="text-sm text-secondary">
										Breakfast: <?php echo $breakfast ?>
									</div>
								<?php endif; ?>

								<?php if ($lunch): ?>
									<div class="text-sm text-secondary">
										Lunch: <?php echo $lunch ?>
									</div>
								<?php endif; ?>

								<?php if ($dinner): ?>
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
							<?php if ($transport): ?>
								<div class="text-sm text-secondary">
									<?php echo "<div>" . implode("<br>", $transport) . "</div>"; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php
endwhile;


get_footer();
