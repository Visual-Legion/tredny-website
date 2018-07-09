<?php /* Template Name: Home Page */ ?>

<?php //get_view_top(); 
	get_header();
?>

	<main class="home" role="main" aria-label="Content" id="pagepiling">
		<!-- section -->

		<?php
			$view = get_field('view_top');
			// var_dump($view);	
			if( $view ): 
		?>
			<section  class="section view_top section-1">
				<div class="content_wrapper">
					<div class="left_content col-4">
						<div class="title">
							<h1><?php echo $view['title'] ?></h1>
						</div>
						<div class="details">
							<p><?php echo $view['content'] ?></p>
						</div>
						<?php  
							$button = $view['button'];
							if ($button) :
						?>
						<a class="button" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
					<?php endif; ?>
					</div>
					<div class="right_content col-8" ></div>
				</div>
			</section>
		<?php endif; ?>

		<?php
			$view = get_field('view_design');
			// var_dump($view);	
			if( $view ): 
		?>
			<section  class="section view_design section-2">
				<div class="content_wrapper">
					<div class="right_content col-4">
						<div class="title">
							<h1><?php echo $view['title'] ?></h1>
						</div>
						<div class="details">
							<p><?php echo $view['content'] ?></p>
						</div>
						<?php  
							$button = $view['button'];
							if ($button) :
						?>
						<a class="button" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
					<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php
			$view = get_field('view_development');
			// var_dump($view);	
			if( $view ): 
		?>
			<section  class="section view_development section-3">
				<div class="content_wrapper">
					<div class="left_content col-4">
						<div class="title">
							<h1><?php echo $view['title'] ?></h1>
						</div>
						<div class="details">
							<p><?php echo $view['content'] ?></p>
						</div>
						<?php  
							$button = $view['button'];
							if ($button) :
						?>
						<a class="button" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
					<?php endif; ?>
					</div>
					<div class="right_content col-8" ></div>
				</div>
			</section>
		<?php endif; ?>

		<?php
			$view = get_field('view_seo');
			// var_dump($view);	
			if( $view ): 
		?>
			<section  class="section view_seo section-4">
				<div class="content_wrapper">
					<div class="left_content col-8" ></div>
					<div class="right_content col-4">
						<div class="title">
							<h1><?php echo $view['title'] ?></h1>
						</div>
						<div class="details">
							<p><?php echo $view['content'] ?></p>
						</div>
						<?php  
							$button = $view['button'];
							if ($button) :
						?>
						<a class="button" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
					<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php
			$view = get_field('view_extras');
			// var_dump($view);	
			if( $view ): 
		?>
			<section  class="section view_extras section-5">
				<div class="content_wrapper">
					<div class="left_content col-4">
						<div class="title">
							<h1><?php echo $view['title'] ?></h1>
						</div>
						<div class="details">
							<p><?php echo $view['content'] ?></p>
						</div>
						<?php  
							$button = $view['button'];
							if ($button) :
						?>
						<a class="button" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
					<?php endif; ?>
					</div>
					<div class="right_content col-8" ></div>
				</div>
			</section>
		<?php endif; ?>

		<?php
			$view = get_field('view_startup');
			// var_dump($view);	
			if( $view ): 
		?>
			<section  class="section view_startup section-6">
				<div class="content_wrapper">
					<div class="left_content col-8" ></div>
					<div class="right_content col-4">
						<div class="title">
							<h1><?php echo $view['title'] ?></h1>
						</div>
						<div class="details">
							<p><?php echo $view['content'] ?></p>
						</div>
						<?php  
							$button = $view['button'];
							if ($button) :
						?>
						<a class="button" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
					<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php
			$view = get_field('view_contact');
			// var_dump($view);	
			if( $view ): 
		?>
			<section  class="section view_contact section-7">
				<div class="content_wrapper">
					<div class="left_content col-4">
						<div class="title">
							<h1><?php echo $view['title'] ?></h1>
						</div>
						<div class="details">
							<p><?php echo $view['content'] ?></p>
						</div>
						<?php  
							$button = $view['button'];
							if ($button) :
						?>
						<a class="button" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
					<?php endif; ?>
					</div>
					<div class="right_content col-8" >
						<?php require_once "modules/form.php"; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

	</main>

<?php get_footer(); ?>
