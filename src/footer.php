			<!-- footer -->
			<?php 
				$footer = get_field('footer','option');
			?>

			<footer class="footer" role="contentinfo">
				<div class="footer_wrapper">
					<!-- <img src="<?php //echo $footer['image']; ?>"> -->
					<!-- <div class="text_wrapper">
						<div class="wys"><?php //echo $footer['wysiwyg']; ?></div>
						<div class="icons_wrapper">
							<a href="<?php //echo $footer['facebook_url']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="<?php //echo $footer['twitter_url']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
						</div>
					</div> -->
				</div>
				<!-- copyright -->
				<div class="copyright">
					<div class="line"></div>
					<p>Designed and developed by <a href="https://tredny.com">Tredny</a></p>
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
