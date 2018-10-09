<?php ?>

<div class="contact_form_wrapper">
  <form class="contact_form" action="<?php the_permalink(); ?>" method="post">
	   <div class="input_group">
			<input type="text" name="name" id="name" size="30" tabindex="1" required="required"/>
			<span class="highlight"></span>
    	<span class="bar"></span>
			<label for="name">Name</label>
			<span class="error"></span>
		</div>
		<div class="input_group">
			<input type="email" name="email" id="email" size="30" tabindex="2"  required="required"/>
			<span class="highlight"></span>
    	<span class="bar"></span>
			<label for="email">Email address</label>
			<span class="error"></span>
		</div>
		<div class="input_group">
			<textarea  name="message" id="message" tabindex="3" required="required"></textarea>
			<span class="highlight"></span>
    	<span class="bar textarea_bar"></span>
			<label for="message">Message</label>
			<span class="error"></span>
		</div>
		<!-- <div class="input_group">
			<input data-validation="recaptcha" data-validation-recaptcha-sitekey="6LcC9mIUAAAAAJyyiuQ-DhBnlnpwAZR5mJT-cnUX">
		</div> -->
		<div class="input_group">
	    <input type="hidden" name="action" value="contact_form_action" />
			<?php echo wp_nonce_field('contact_form_action', '_acf_nonce', true, false) ?>
			<div class="contact_form_button_wrapper">
				<!-- <div class="btn_background"></div> -->
				<div class="contact_form_button">Send Message</div>
				<input type="button" class="button_form tdny_submit_contact_form" value="Send Message" tabindex="4" />
			</div>
		</div>
	  <div class="contact-msg"></div>
  </form>
</div>

