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
						<a href="/"><img src="<?php echo $footer['image']; ?>"></a>
					</div>
					<div class="text_wrapper">
						<div class="wys"><?php echo $footer['wysiwyg_right']; ?></div>
						<div class="icons_wrapper">
							<a href="https://www.facebook.com/Tredny-1079782122159629/?ref=br_rs"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
							<a href="https://twitter.com/trednyofficial"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
							<a href="https://www.instagram.com/trednyofficial/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
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
		<?php include 'cookie.php'; ?>

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
