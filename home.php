<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

			<div class="content-area">
				<div class="splashwrap">
					<div class="splashimage">
						<div class="innertext">
							<h2>Kitten Ipsum sister oscar birdwatch!</h2>
							<p>Kitten Ipsum sister, local oscar birdwatch hiss meowlly her friend bat cat rip. Smile, pillow grandparents aggressive sandi cuddles. Kitty, happy boots impressed hiding ham cat little rip browsing.</p>
						</div>
					</div>
				</div>
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content' );
					} ?>
				</div>
				<section class="events">
						<h2>Next Upcoming Event</h2>

<?php
						$counter = 0;
						$eventLoop = new WP_QUERY(array('post_type' => 'osi-events', 'posts_per_page' => 1, 'orderby' =>'meta_value', 'order' => 'ASC', 'meta_key' => 'oe-form-start', 'meta_value' => time(), 'meta_compare' => '>='));
						while ($eventLoop->have_posts()) {
							$eventLoop->the_post();
							$title = get_the_title();
							$start = get_post_meta($post->ID, 'oe-form-start', true);
							$end = get_post_meta($post->ID, 'oe-form-end', true);
							$content = get_the_content();
							$link = get_post_meta($post->ID, 'oe-form-url', true);
							$image = get_the_post_thumbnail($post->ID, 'medium');
							$image_url = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full');

							if ($end == "none")
								$dates = date('l F jS, g:ia', $start);
							else if (date('F j', $start) == date('F j', $end))
								$dates = date('l F jS, g:ia', $start) . " - " . date('g:ia', $end);
							else
								$dates = date('F jS, g:ia', $start) . " to " . date('F jS, g:ia', $end);
?>	
						<article class="event">
							<a class="img fancybox" href="<?php echo $image_url[0]; ?>"><?php echo $image; ?></a>
							<div class="eventDescription">
								<h3><?php echo $title; ?></h3>
								<h4><?php echo $dates; ?></h4>
								<p><?php echo $content; ?></p>

<?php
							if ($link != "") {
?>
							<div class="button  button--dark"><a href="<?php echo $link; ?>" target="_blank">Find Out More!</a></div>
							<!-- <p><a href="<?php echo site_url('/events/'); ?>">See More Events</a></p> -->
							<div class="fb-share-button" data-href="<?php echo get_permalink(); ?>" data-type="button"></div>
<?php				}
?>
							</div>
						</article>
<?php
						$counter++;
					}

					if ($counter == 0) {
?>
						<p>There are no events to display... yet.</p>
	<?php
					}
	?>

						
					
					</section>
			</div>

<?php get_footer(); ?>