<?php ?>

<div class="contact_form_wrapper">
  <form id="contactform" action="<?php the_permalink(); ?>" method="post">
	   <div>
			<label for="name">Name</label>
			<input type="text" name="name" id="name" size="30" tabindex="1" required="required"/>
			<span class="error"></span>
		</div>
		<div>
			<label for="email">Email address</label>
			<input type="email" name="email" id="email" size="30" tabindex="2"  required="required"/>
			<span class="error"></span>
		</div>
		<div>
			<label for="message">Message</label>
			<textarea  name="message" id="message" tabindex="3" required="required"></textarea>
			<span class="error"></span>
		</div>
		<!-- <div>
			<input data-validation="recaptcha" data-validation-recaptcha-sitekey="6LcC9mIUAAAAAJyyiuQ-DhBnlnpwAZR5mJT-cnUX">
		</div> -->
		<div>
	    <input type="hidden" name="action" value="contactform_action" />
			<?php echo wp_nonce_field('contactform_action', '_acf_nonce', true, false) ?>
			<input type="button" class="button" value="Submit" id="contactbutton" tabindex="4" />
		</div>
	  <div id="contact-msg"></div>
  </form>
</div>

