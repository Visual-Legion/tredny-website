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
							<h1>
								<?php echo $view['title'] ?>
								<span><?php if ($view['title_copy']) echo $view['title_copy'] ?></span>
							</h1>
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
					<?php  
							$button = $view['button_copy'];
							if ($button) :
						?>
						<a class="button_alt" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
					<?php endif; ?>
					</div>
					<div class="right_content col-6" > <!-- col-8-->
						<div class="static-images-wrapper">
							<div class="big-wrapper">
								<img class="visual-legion-top-imac-mockup slide-down s-absolute" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-top-imac-mockup.svg" alt="visual legion top imac mockup">
								<img class="visual-legion-top-macbook-mockup slide-left s-absolute" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-top-macbook-mockup.svg" alt="visual legion top macbook mockup">
								<img class="visual-legion-top-phone-mockup slide-right s-absolute" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-top-phone-mockup.svg" alt="visual legion top phone mockup">
								<img class="visual-legion-top-tablet-mockup slide-right s-absolute" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-top-tablet-mockup.svg" alt="visual legion top tablet mockup">
							</div>
							<div class="small-wrapper">
								<img class="slide-right" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-top-group-mockup.svg" alt="visual legion top group mockup">
							</div>
						</div>
					</div>
				</div>
				<div class="arrow-container" style="
				    position: absolute;
				">
				<svg class="scroll_down" viewBox="0 0 40 24" width="100%" height="100%"><title>arrow down</title><path stroke="white" fill="white" d="M39.6 2.5l-2-2.1c-.3-.3-.6-.4-.9-.4-.3 0-.7.1-.9.4l-15.8 16.2-15.8-16.2c-.2-.3-.5-.4-.9-.4-.3 0-.6.1-.9.4l-2 2.1c-.3.2-.4.6-.4.9 0 .4.1.7.4.9l18.7 19.2c.3.3.6.4.9.4s.7-.1.9-.4l18.7-19.1c.3-.3.4-.6.4-1 0-.3-.1-.7-.4-.9z"></path></svg>
				</div>
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
								<img src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-about-design-icon.svg" alt="visual legion about design icon">
								<h3><?php echo $view['icon_subtext']['design'] ?></h3>
							</a>
							<a class="slide-down" href="/#view_development">
								<img src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-about-coding.svg" alt="visual legion about coding">
								<h3><?php echo $view['icon_subtext']['coding'] ?></h3>
							</a>
							<a class="slide-right" href="/#view_seo">
								<img src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-about-digital-marketing.svg" alt="visual legion about digital marketing">
								<h3><?php echo $view['icon_subtext']['digital_marketing'] ?></h3>
							</a>
							<a class="slide-left" href="/#view_extras">
								<img src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-about-extras.svg" alt="visual legion about extras">
								<h3><?php echo $view['icon_subtext']['extras'] ?></h3>
							</a>
						</div>
					</div>
					<div class="right_content col-6"> <!-- col-4 -->
						<div class="title">
							<h2>
								<?php echo $view['title'] ?>
								<span><?php if ($view['title_copy']) echo $view['title_copy'] ?></span>
							</h2>
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
					<?php  
							$button = $view['button_copy'];
							if ($button) :
						?>
						<a class="button_alt" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
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
							<h2>
								<?php echo $view['title'] ?>
								<span><?php if ($view['title_copy']) echo $view['title_copy'] ?></span>
							</h2>
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
					<?php  
							$button = $view['button_copy'];
							if ($button) :
						?>
						<a class="button_alt" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
					<?php endif; ?>
					</div>
					<div class="right_content col-6" > <!-- col-8-->
						<div class="static-images-wrapper">
							<div class="big-wrapper">
								<img class="visual-legion-web-design-imac slide-down s-absolute" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-web-design-imac.svg" alt="visual legion web design imac">
								<img class="visual-legion-web-development-macbook-code slide-left s-absolute" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-web-development-macbook-code.svg" alt="visual legion web development macbook code">
								<img class="visual-legion-web-design-tablet-mockup slide-right s-absolute" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-web-design-tablet-mockup.svg" alt="visual legion web design tablet mockup">
							</div>
							<div class="small-wrapper">
								<img class="slide-right" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-web-design-development-group-mockup.svg" alt="visual legion web design development group mockup">
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
							<img class="visual-legion-digital-marketing slide-right" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-digital-marketing-white.svg" alt="visual legion digital marketing white">
						</div>
					</div>
					<div class="right_content col-6"> <!-- col-4 -->
						<div class="title">
							<h2>
								<?php echo $view['title'] ?>
								<span><?php if ($view['title_copy']) echo $view['title_copy'] ?></span>
							</h2>
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
					<?php  
							$button = $view['button_copy'];
							if ($button) :
						?>
						<a class="button_alt" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
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
							<h2>
								<?php echo $view['title'] ?>
								<span><?php if ($view['title_copy']) echo $view['title_copy'] ?></span>
							</h2>
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
					<?php  
							$button = $view['button_copy'];
							if ($button) :
						?>
						<a class="button_alt" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
					<?php endif; ?>
					</div>
					<div class="right_content col-6" > <!-- col-8-->
						<div class="static-images-wrapper">
							<div class="big-wrapper">
								<img class="visual-legion-flyers-icon xtra-icon slide-down s-absolute" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-flyers-icon.svg" alt="visual legion flyers icon">
								<img class="visual-legion-camera-icon xtra-icon slide-right s-absolute" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-camera-icon.svg" alt="visual legion camera icon">
								<img class="visual-legion-cart-ecommerce-icon xtra-icon slide-left s-absolute" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-cart-ecommerce-icon.svg" alt="visual legion cart ecommerce icon">
								<img class="visual-legion-tools-maintenance-icon xtra-icon slide-right s-absolute" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-tools-maintenance-icon.svg" alt="visual legion tools maintenance ic" >
							</div>
							<div class="small-wrapper">
								<img class="slide-right" src="https://visual-legion.com/wp-content/uploads/2018/10/visual-legion-extra-icons-group.svg" alt="visual legion extra icons group">
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php
			$view = get_field('view_contact');
			// var_dump($view);	
			if( $view ): 
		?>
			<section id="view_contact"  class="section view_contact section-8">
				<div class="content_wrapper">
					<div class="left_content col-6"> <!-- col-4 -->
						<div class="title">
							<h2>
								<?php echo $view['title'] ?>
								<span><?php if ($view['title_copy']) echo $view['title_copy'] ?></span>
							</h2>
						</div>
						<div class="details">
							<p><?php echo $view['content'] ?></p>
						</div>
					</div>
					<div class="right_content col-6" > <!-- col-8-->
						<?php require_once "modules/form.php"; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

		<section id="view_footer"  class="section view_footer section-9">
				
			</section>

	</main>

<?php get_footer(); ?>
