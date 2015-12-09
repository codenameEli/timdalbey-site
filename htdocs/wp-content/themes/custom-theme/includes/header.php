<?php

remove_action( 'genesis_header', 'genesis_do_header' );

add_action( 'genesis_header', 'ce_do_header' );

function ce_do_header() {

	?>
	<header class="site-header container" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<div class="row">
			<div class="col-md-8">
				<div class="site-logo">
					<h1><a href="<?php echo site_url(); ?>">Tim Dalbey</a></h1>
				</div>
				<div class="site-description">
					<span>A geek @ heart with a pay-it-forward mindset</span>
				</div>
				<h4>Smart. Creative. Self-Taught. Efficient.</h4>
			</div>
			<div class="col-md-3 col-md-offset-1">
				<a class="contact-link phone-number" href="tel:17176824491">717.682.4491</a>
				<a class="contact-link email" href="mailto:timdalbey13@gmail.com">timdalbey13@gmail.com</a>
				<a class="contact-link website" href="<?php echo site_url(); ?>">timdalbey.com</a>
				<a class="contact-link social-icon fa fa-github github" href="https://github.com/codenameEli">Github</a>
				<a class="contact-link social-icon fa fa-twitter twitter" href="https://twitter.com/timdalbey">Twitter</a>
				<a class="contact-link social-icon fa fa-linkedin linkedin" href="https://github.com/codenameEli">LinkedIn</a>
			</div>
		</div>
	</header>
	<?php
}
