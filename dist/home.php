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
			<section id="view_top"  class="section view_top section-1">
				<div class="content_wrapper">
					<div class="left_content col-6"> <!-- col-4 -->
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
					<div class="right_content col-6" > <!-- col-8-->
						<div class="static-images-wrapper">
							<div class="big-wrapper">
								<img class="tredny-top-imac-mockup slide-down s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-top-imac-mockup.svg">
								<img class="tredny-top-macbook-mockup slide-left s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-top-macbook-mockup.svg">
								<img class="tredny-top-phone-mockup slide-right s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-top-phone-mockup.svg">
								<img class="tredny-top-tablet-mockup slide-right s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-top-tablet-mockup.svg">
							</div>
							<div class="small-wrapper">
								<img class="slide-right" src="http://tredny.local/wp-content/uploads/2018/07/tredny-top-group-mockup.svg">
							</div>
						</div>
					</div>
				</div>
				<svg class="mouse scroll_down" xmlns="..." viewBox="0 0 76 130">
				  <g fill="none" fill-rule="evenodd">
				  <rect width="70" height="118" x="1.5" y="1.5" stroke="#FFF" stroke-width="3" rx="36"></rect>
				  <circle class="scroll" cx="36.5" cy="31.5" r="4.5" fill="#FFF"></circle>
				  </g>
				</svg>
			</section>
		<?php endif; ?>

		<?php
			$view = get_field('view_design');
			// var_dump($view);	
			if( $view ): 
		?>
			<section id="view_design"  class="section view_design section-2">
				<div class="content_wrapper">
					<div class="left_content col-6" > <!-- col-8-->
						<div class="static-images-wrapper about">
							<a class="slide-down" href="/#view_development">
								<img src="http://tredny.local/wp-content/uploads/2018/07/tredny-about-design-icon-1.svg">
								<h3><?php echo $view['icons_subtext']['design'] ?></h3>
							</a>
							<a class="slide-down" href="/#view_development">
								<img src="http://tredny.local/wp-content/uploads/2018/07/tredny-about-coding.svg">
								<h3><?php echo $view['icons_subtext']['coding'] ?></h3>
							</a>
							<a class="slide-right" href="/#view_seo">
								<img src="http://tredny.local/wp-content/uploads/2018/07/tredny-about-digital-marketing.svg">
								<h3><?php echo $view['icons_subtext']['digital_marketing'] ?></h3>
							</a>
							<a class="slide-left" href="/#view_extras">
								<img src="http://tredny.local/wp-content/uploads/2018/07/tredny-about-extras.svg">
								<h3><?php echo $view['icons_subtext']['extras'] ?></h3>
							</a>
						</div>
					</div>
					<div class="right_content col-6"> <!-- col-4 -->
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
			<section id="view_development"  class="section view_development section-3">
				<div class="content_wrapper">
					<div class="left_content col-6"> <!-- col-4 -->
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
					<div class="right_content col-6" > <!-- col-8-->
						<div class="static-images-wrapper">
							<div class="big-wrapper">
								<img class="tredny-web-design-imac slide-down s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-web-design-imac.svg">
								<img class="tredny-web-development-macbook-code slide-left s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-web-development-macbook-code.svg">
								<img class="tredny-web-design-tablet-mockup slide-right s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-web-design-tablet-mockup.svg">
							</div>
							<div class="small-wrapper">
								<img class="slide-right" src="http://tredny.local/wp-content/uploads/2018/07/tredny-web-design-development-group-mockup.svg">
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php
			$view = get_field('view_seo');
			// var_dump($view);	
			if( $view ): 
		?>
			<section id="view_seo"  class="section view_seo section-4">
				<div class="content_wrapper">
					<div class="left_content col-6" > <!-- col-8-->
						<div class="static-images-wrapper">
							<img class="tredny-digital-marketing slide-right" src="http://tredny.local/wp-content/uploads/2018/07/tredny-digital-marketing-white.svg">
						</div>
					</div>
					<div class="right_content col-6"> <!-- col-4 -->
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
			<section id="view_extras"  class="section view_extras section-5">
				<div class="content_wrapper">
					<div class="left_content col-6"> <!-- col-4 -->
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
					<div class="right_content col-6" > <!-- col-8-->
						<div class="static-images-wrapper">
							<div class="big-wrapper">
								<img class="tredny-flyers-icon xtra-icon slide-down s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-flyers-icon.svg">
								<img class="tredny-camera-icon xtra-icon slide-right s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-camera-icon.svg">
								<img class="tredny-cart-ecommerce-icon xtra-icon slide-left s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-cart-ecommerce-icon.svg">
								<img class="tredny-tools-maintenance-icon xtra-icon slide-right s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-tools-maintenance-icon.svg">
							</div>
							<div class="small-wrapper">
								<img class="slide-right" src="http://tredny.local/wp-content/uploads/2018/07/tredny-extra-icons-group.svg">
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php
			$view = get_field('view_startup');
			// var_dump($view);	
			if( $view ): 
		?>
			<section id="view_startup"  class="section view_startup section-6"> 
				<div class="content_wrapper">
					<div class="left_content col-6" > <!-- col-8-->
						<div class="static-images-wrapper">
							<!-- <img src="http://tredny.local/wp-content/uploads/2018/07/tredny-startup-boost-group.svg"> -->
							<div class="big-wrapper">
								<img class="tredny-startup-boost-responsive-website slide-down s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-startup-boost-responsive-website.svg">
								<img class="tredny-startup-boost-seo-digital-analytics  slide-right s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-startup-boost-seo-digital-analytics.svg">
								<img class="tredny-startup-boost-seo-digital-analytics ipad-macbook slide-right s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-startup-boost-seo-digital-analytics-2.svg">
								<img class="tredny-startup-boost-logo slide-left s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-startup-boost-logo-2.svg">
								<img class="tredny-startup-boost-business-cards slide-right s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-startup-boost-business-cards-2.svg">
								<img class="tredny-startup-boost-email-signatures slide-right s-absolute" src="http://tredny.local/wp-content/uploads/2018/07/tredny-startup-boost-email-signatures.svg">
							</div>
							<div class="small-wrapper">
								<img class="slide-right" src="http://tredny.local/wp-content/uploads/2018/07/tredny-startup-boost-group.svg">
							</div>
						</div>
					</div>
					<div class="right_content col-6"> <!-- col-4 -->
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
			<section id="view_contact"  class="section view_contact section-7">
				<div class="content_wrapper">
					<div class="left_content col-6"> <!-- col-4 -->
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
						<a class="button_black" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
					<?php endif; ?>
					</div>
					<div class="right_content col-6" > <!-- col-8-->
						<?php require_once "modules/form.php"; ?>
					</div>
				</div>
			</section>
			<section id="view_footer"  class="section view_footer section-8">
				
			</section>
		<?php endif; ?>

	</main>

<?php get_footer(); ?>
