<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

			<div class="content-area">
				<img src="http://placekitten.com/1920/800" alt="">
				<div class="main"> 
					<?php
					while (have_posts()) {
						the_post();
						get_template_part( 'content' );
					} ?>
				</div>
			</div>

<?php get_footer(); ?>