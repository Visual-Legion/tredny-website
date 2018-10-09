			<!-- footer -->
			<?php 
				$footer = get_field('footer','option');
			?>

			<footer class="footer" role="contentinfo">
				<div class="footer_wrapper">
					<div class="text_wrapper">
						<div class="wys "><?php echo $footer['wysiwyg_left']; ?></div>
					</div>
					<div class="logo_wraper">
						<!-- <a href="/"><img src="<?php //echo $footer['image']; ?>"></a> -->
						<a href="/">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 viewBox="0 0 1028.3 338.5" xml:space="preserve" width="320" fill="#ffffff">
								<rect x="503.7" y="5.5" width="1" height="333"/>
								<g>
									<path d="M510,284.2v-27l23.9-4.6v-161L510,87V59.9h23.9h45h24V87l-24,4.6v158.1h63.3l2.2-28.2h34.4v62.7H510z"/>
								</g>
								<g>
									<path d="M329.6,284.2v-62.7H364l2.2,28.2h63.3V91.6l-24-4.6V59.9h24h45h23.9V87l-23.9,4.6v161l23.9,4.6v27H329.6z"/>
								</g>
								<rect x="490.2" y="141.3" width="27.7" height="27.7"/>
								<path d="M518.4,169.5h-28.7v-28.7h28.7V169.5z M490.7,168.5h26.7v-26.7h-26.7V168.5z"/>
								</svg>
						</a>
					</div>
					<div class="text_wrapper">
						<div class="wys"><?php echo $footer['wysiwyg_right']; ?></div>
						<div class="icons_wrapper">
							<a href="https://www.linkedin.com/company/visual-legion/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
							<a href="https://www.facebook.com/visuallegionofficial/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
							<a href="https://twitter.com/visual_legion"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
							<a href="https://www.instagram.com/visual_legion/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<!-- copyright -->
				<div class="copyright">
					<!-- <div class="line"></div> -->
					<p><?php echo $footer['bottom_text']; ?></p>
				</div>
				<!-- /copyright -->
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->
		<?php //include 'cookie.php'; ?>

		<?php wp_footer(); ?>

	</body>
</html>
