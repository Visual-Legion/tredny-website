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
					<div class="right_content col-8" >

						<div class="md-imac md-glare">
					    <div class="md-body">
					        <div class="md-top">
					            <div class="md-camera"></div>
					            <div class="md-screen">
					            	 <video width="300" height="200" controls="" style="position: absolute;left: 0;top: 0;right: 0;bottom: 0;width: 100%;height: 100%;">
	                    <source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">
	                </video>
					            </div>
					        </div>
					    </div>

					    <div class="md-base">
					        <div class="md-stand"></div>
					        <div class="md-foot"></div>
					    </div>
					</div>

						<!-- <svg id="Group_23" data-name="Group 23" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 720 590">
						  <defs>
						    <style>
						      .cls-1 {
						        fill: #181a25;
						      }

						      .cls-2 {
						        fill: #fbfbfb;
						      }

						      .cls-3, .cls-6 {
						        fill: #fff;
						      }

						      .cls-4 {
						        fill: #f9f9f9;
						      }

						      .cls-5 {
						        fill: #f5f5f5;
						      }

						      .cls-6 {
						        opacity: 0.1;
						      }
						    </style>
						  </defs>
						  <path id="Path_6" data-name="Path 6" class="cls-1" d="M933.175,160H242.664A14.761,14.761,0,0,0,228,174.75V599.42H948V174.75A15.117,15.117,0,0,0,933.175,160Zm-7.413,411.7H249.916V190.31H925.762Z" transform="translate(-228 -160)"/>
						  <path id="Path_7" data-name="Path 7" class="cls-2" d="M228,431.2v48.14a14.761,14.761,0,0,0,14.664,14.75h690.51a14.761,14.761,0,0,0,14.664-14.75V431.2Z" transform="translate(-228 8.382)"/>
						  <ellipse id="Ellipse_2" data-name="Ellipse 2" class="cls-2" cx="4.029" cy="4.052" rx="4.029" ry="4.052" transform="translate(355.81 11.184)"/>
						  <foreignObject x="22" y="30" width="676" height="380">
	                <video width="300" height="200" controls="" style="position: absolute;left: 0;top: 0;right: 0;bottom: 0;width: 100%;height: 100%;">
	                    <source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">
	                </video>
	            </foreignObject>
						  <path id="Path_8" data-name="Path 8" class="cls-2" d="M613.879,516H382.313c-4.029,0-7.413,2.917-7.413,6.484v6.483H621.292v-6.483C621.292,519.08,617.908,516,613.879,516Z" transform="translate(-138.177 61.033)"/>
						  <path id="Path_9" data-name="Path 9" class="cls-4" d="M410.381,469.9,393.3,544.623H580.39L563.309,469.9Z" transform="translate(-126.926 32.411)"/>
						  <path id="Path_10" data-name="Path 10" class="cls-5" d="M556.828,469.9H403.9l74.288,74.723h95.721Z" transform="translate(-120.444 32.411)"/>
						  <path id="Path_11" data-name="Path 11" class="cls-6" d="M228,599.163h0Z" transform="translate(-228 -159.743)"/>
						</svg> -->



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
						<a class="button_black" href="<?php echo $button['link'] ?>"><?php echo $button['text'] ?></a>
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
