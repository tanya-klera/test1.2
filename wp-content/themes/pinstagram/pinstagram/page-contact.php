<?php
/*
Template Name: Contact Form
*/
?>


<?php $mts_options = get_option('pinstagram');

$nameError = '';
$emailError = '';
$commentError = '';

//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = __('You forgot to enter your name.','mythemeshop');
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = __('You forgot to enter your email address.','mythemeshop');
			$hasError = true;
		} else if (!preg_match("#^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$#i", trim($_POST['email']))) {
			$emailError = __('You entered an invalid email address.','mythemeshop');
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		//Check to make sure message is entered	
		if(trim($_POST['comments']) === '') {
			$commentError = __('You forgot to enter your message.','mythemeshop');
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		if(!isset($hasError)) {
			$emailTo = get_option( 'admin_email' );
			$subject = '[Contact Form] From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $emailTo;
			
			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}
	}
} ?>


<?php get_header(); ?>
<div id="page" class="single">
	<article class="article">
		<div id="content_box" >
			<div class="post" >
				<div class="single_post" >
					<div class="single_page">
						<?php if(isset($emailSent) && $emailSent == true) { ?>
							<div class="thanks">
								<h1><?php _e('Thanks','mythemeshop'); ?>, <?php echo $name; ?></h1>
								<p><?php _e('Your email was successfully sent.','mythemeshop'); ?></p>
							</div>
						<?php } else { ?>
							<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<header>
									<h1 class="title"><?php the_title(); ?></h1>
								</header>
								<?php the_content(); ?>
								<?php if(isset($hasError) || isset($captchaError)) { ?>
									<p class="error"><?php _e('There was an error submitting the form.','mythemeshop'); ?><p>
								<?php } ?>
								<form action="<?php the_permalink(); ?>" class="contactform" method="post">
									<p><label for="contactName"><?php _e('Name:', 'mythemeshop') ?></label>
										<input type="text" name="contactName" id="author" size="32" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" /><br>
										<?php if($nameError != '') { ?>
											<span class="error"><?php echo $nameError; ?></span> 
										<?php } ?>
									</p>
									
									<p><label for="email"><?php _e('Email:', 'mythemeshop') ?></label>
										<input type="text" name="email" id="email" size="32" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email" /><br>
										<?php if($emailError != '') { ?>
											<span class="error"><?php echo $emailError; ?></span>
										<?php } ?>
									</p>
									
									<p id="commentform" class="textarea"><label for="commentsText"><?php _e('Message:', 'mythemeshop') ?></label>
										<textarea name="comments" id="comment" rows="10" cols="60" class="requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea><br>
										<?php if($commentError != '') { ?>
											<span class="error"><?php echo $commentError; ?></span> 
										<?php } ?>
									</p>
									<p class="screenReader"><label for="checking" class="screenReader"><?php _e('If you want to submit this form, do not enter anything in this field', 'mythemeshop') ?></label><input type="text" rows="1" cols="1" style="width: 11px;" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></p>
									<p><input type="hidden" name="submitted" id="submitted" value="true" />
										<button id="submit" class="contact-submit" type="submit">
											<span class="left"><?php _e('Send Email', 'mythemeshop') ?></span>
										</button>
									</p>
								</form>
								<?php endwhile; ?>
							<?php endif; ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</article>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>