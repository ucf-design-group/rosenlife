<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

			<div class="content-area">
				<div class="splashwrap">
					<div class="splashimage">
						<div class="innertext">
							<h1>Kitten Ipsum sister oscar birdwatch!</h1>
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
			</div>

<?php get_footer(); ?>