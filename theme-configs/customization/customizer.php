<?php
/**
 * Basic Customizer
 *
 * This is used to allow users customize primary font, heading font and accent color.
 *
 * Use: http://rvision.ws/cssextractor/
 *
 *
 */

// Customizer Output
function ivan_customizer_output() {

	$output = '';

	ob_start();

	// Add to  Cart Background
	$add_cart_background = ivan_get_option('add-to-cart-bg');
	$add_cart_bg_hover	=	ivan_get_option('add-to-cart-bg-hover');
	$view_cart_bg	=	ivan_get_option('view-cart-bg');
	$view_cart_bg_hover = ivan_get_option('view-cart-bg-hover');

	if($add_cart_background != '' || $add_cart_bg_hover != '' || $view_cart_bg != '' || $view_cart_bg_hover != '') :
	?>

	.button.add_to_cart_button.product_type_simple.added { background: <?php echo esc_attr($add_cart_background); ?> !important; border-color: <?php echo esc_attr($add_cart_background); ?> !important; }
	.button.add_to_cart_button.product_type_simple.added:hover {
		background: <?php echo esc_attr($add_cart_bg_hover); ?> !important;
		border-color: <?php echo esc_attr($add_cart_bg_hover); ?> !important;
	}
	.summary.entry-summary a.added_to_cart.wc-forward {
		background: <?php echo esc_attr($view_cart_bg); ?> !important;
		border-color: <?php echo esc_attr($view_cart_bg); ?> !important;
	}
	.summary.entry-summary a.added_to_cart.wc-forward:hover,
	a.button.wc-forward:hover {
		background: <?php echo esc_attr($view_cart_bg_hover); ?> !important;
		border-color: <?php echo esc_attr($view_cart_bg_hover); ?> !important;
	}
	<?php 
	endif;

	// Menu Hover Link Color
	$menu_hover_link = ivan_get_option('menu-hover-link-color');
	if($menu_hover_link != ''): 
	?>

	.header .mega_main_menu.light-submenu .default_dropdown > ul .item_link:hover, 
	.header .mega_main_menu.light-submenu .default_dropdown li > ul .item_link:hover, 
	.header .mega_main_menu.light-submenu .multicolumn_dropdown > ul .item_link:hover, 
	.header .mega_main_menu .default_dropdown > ul .item_link:hover, 
	.header .mega_main_menu .default_dropdown li > ul .item_link:hover, 
	.header .mega_main_menu.light-submenu .widgets_dropdown > ul .item_link:hover,
	.header.style6 .mega_main_menu .mega_main_menu_ul > li:hover > .item_link,
	.header.style6 .menu > li > a.item_link:hover .link_text {
		color:<?php echo esc_attr($menu_hover_link); ?> !important;
	}

	<?php
	endif;

	// Link Color
	$linkColor = ivan_get_option('ivan-link-color');

	if($linkColor != '') :
	?>
		
	a,
	.btn-link,
	a.jm-post-like:hover,
	a.jm-post-like:active,
	a.jm-post-like:focus,
	a.liked:hover,
	a.liked:active,
	a.liked:focus,
	.widget_recent_entries a:hover
	{
	  color: <?php echo esc_attr($linkColor); ?>;
	}

	.post .share-icons a:hover,
	.woocommerce table.cart a.remove:hover,
	.woocommerce-page table.cart a.remove:hover,
	.woocommerce-wishlist .share-icons a:hover,
	.woocommerce div.product div.summary .share-icons a:hover,
	.woocommerce-page div.product div.summary .share-icons a:hover,
	.woocommerce div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover,
	.woocommerce-page div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover {
	  color: <?php echo esc_attr($linkColor); ?>;
	  border-color: <?php echo esc_attr($linkColor); ?>;
	}

	.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
	.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a {
	  color: <?php echo esc_attr($linkColor); ?>;
	  border-top-color: <?php echo esc_attr($linkColor); ?>;
	}

	<?php
	endif;

	// Custom Accent BG
	$accentBG = ivan_get_option('ivan-custom-accent');
	$accentColor = '#fed841'; // Default
		if( '' != ivan_get_option('ivan-custom-accent-color') )
		$accentColor = ivan_get_option('ivan-custom-accent-color');


	if($accentBG != '') :
	?>

	.ivan-staff-wrapper .social-icons a:hover,
	.ivan-call-action.primary-bg.with-icon .call-action-icon i,
	.ivan-button.outline:hover,
	.ivan-pricing-table.default.dark-bg .signup:hover,
	.ivan-pricing-table.default.black-bg .signup:hover,
	.ivan-pricing-table.big-price .top-section .adquire-plan .signup:hover,
	.ivan-pricing-table.description-support .bottom-section .signup:hover,
	.ivan-pricing-table.subtitle.dark-bg .signup:hover,
	.ivan-pricing-table.subtitle.black-bg .signup:hover,
	.ivan-pricing-table.small-desc.dark-bg .signup:hover,
	.ivan-pricing-table.small-desc.black-bg .signup:hover,
	.marker-icon.ivan-gmap-marker,
	.ivan-title-wrapper.primary-bg .icon-above i,
	.ivan-title-wrapper.primary-bg strong,
	.ivan-title-wrapper.primary-bg a,
	.ivan-title-wrapper.primary-bg a:hover,
	.ivan-service .main-icon,
	.ivan-service.primary-bg .fa-stack .main-icon,
	.ivan-icon-box.primary-bg .icon-box-holder .main-icon,
	.ivan-icon-wrapper .primary-bg .ivan-icon,
	.ivan-icon-wrapper .primary-bg a:hover,
	.ivan-icon-wrapper .primary-bg .ivan-font-stack .stack-holder,
	.ivan-icon-wrapper .primary-bg .ivan-font-stack.with-link:hover .stack-holder,
	.ivan-icon-list.primary-bg i,
	.ivan-list.primary-bg.number ul > li:before,
	a:hover,
	a:focus,
	.btn-primary .badge,
	.btn-link:hover,
	.btn-link:focus,
	.post .entry-title a:hover,
	#comments .comment-body .comment-reply-link:hover,
	.ivan-vc-filters a:hover,
	.ivan-vc-filters a.current,
	.latest-post a:hover, 
	.latest-post .read-more,
	.header.iv-layout .mega_main_menu .default_dropdown > ul .item_link:hover,
	.header.iv-layout .mega_main_menu .default_dropdown li > ul .item_link:hover,
	.header.iv-layout.transparent-bg.dark.style6 .mega_main_menu .default_dropdown > ul .item_link:hover,
	.header.iv-layout .mega_main_menu .multicolumn_dropdown > ul .item_link:hover,
	.ivan-icon-box:hover .icon-box-holder .main-icon,
	.header.style6.stuck ul li ul a.item_link:hover,
	.header.style6.stuck ul li ul a.item_link:hover .link_text,
	.woo-cart .total .amount,
	.ivan-posts .ivan-post.default-style .entry .post-read-more,
	.ivan-posts .ivan-post.default-style .entry h3 a:hover,
	.header .mega_main_menu .mega_main_menu_ul > li:hover > .item_link,
	.pricing-table.featured .top-section .plan-infos .price,
	.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,
	.paging-navigation a.current, .paging-navigation span.current,
	.woocommerce div.product div.summary span.price, .woocommerce-page div.product div.summary span.price, .woocommerce div.product div.summary p.price, .woocommerce-page div.product div.summary p.price,
	a,
	.post .share-icons a:hover, .woocommerce .content-wrapper table.cart a.remove:hover, .content-wrapper .woocommerce table.cart a.remove:hover, .woocommerce-page .content-wrapper table.cart a.remove:hover, .content-wrapper .woocommerce-page table.cart a.remove:hover, .content-wrapper .woocommerce-wishlist .share-icons a:hover, .woocommerce-wishlist .content-wrapper .share-icons a:hover, .content-wrapper .woocommerce div.product div.summary .share-icons a:hover, .woocommerce .content-wrapper div.product div.summary .share-icons a:hover, .content-wrapper .woocommerce-page div.product div.summary .share-icons a:hover, .content-wrapper .woocommerce-page .content-wrapper div.product div.summary .share-icons a:hover, .content-wrapper .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce .content-wrapper div.product .woocommerce-tabs ul.tabs li.active a, .content-wrapper .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page .content-wrapper div.product .woocommerce-tabs ul.tabs li.active a, .content-wrapper .woocommerce div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover, .woocommerce .content-wrapper div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover, .content-wrapper .woocommerce-page div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover, .woocommerce-page .content-wrapper div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover,
	.woocommerce table.cart .product-name a:hover, .woocommerce-page table.cart .product-name a:hover,
	.blog-large .entry-meta a,
	.blog-masonry.style-simple .entry-meta a,
	.sidebar .widget:not(.widget_nav_menu) a:not(.button):not(.ivan-button):not([class^=tag-link]):hover, .content-wrapper .wpb_widgetised_column .widget:not(.widget_nav_menu) a:not(.button):not(.ivan-button):not([class^=tag-link]):hover,
	.header.iv-layout.style7 .mega_main_menu .default_dropdown > ul .item_link:hover, .header.style7 .menu-items .dl-back a:hover, .header.style7 .menu-items a:hover, .header.style7 .menu-items a:hover .link_text,
	.ivan-title-wrapper .title-wrapper .sub, .subtitle,
	.woo-cart .basket-wrapper .header-cart-total .amount,
	.iv-layout.footer a:hover,
	.ivan-counter-wrapper .counter-wrapper .sub,
	.header .mega_main_menu .default_dropdown > ul li.current-menu-item > .item_link, .header .mega_main_menu .default_dropdown li > ul li.current-menu-item > .item_link, .header .mega_main_menu .multicolumn_dropdown > ul li.current-menu-item > .item_link, .header .mega_main_menu .widgets_dropdown > ul li.current-menu-item > .item_link,
	.return-to-shop .button,
	.ivan-staff-wrapper .job-title,
	.ivan-promo-box p,
	.ivan-promo-box .promo-box-icon,
	label,
	.ivan-progress .progress-title-counter,
	.iv-layout.title-wrapper p,
	.ivan-projects .entry-inner .categories,
	.blog-masonry.style-simple .format-quote .quote-mark,
	.blog-masonry.style-simple .format-quote .quote-main cite,
	.blog-masonry.style-simple .format-status .status-main a,
	.blog-masonry.style-simple .format-link .link-mark,
	.single-post .format-link .link-mark,
	.single-post .format-status .status-main a,
	.single-post .format-quote .quote-mark,
	.single-post .format-quote .quote-main cite,
	.iv-layout.footer .textwidget a,
	.iv-layout.header .woo-cart .cart_list li a:hover,
	.iv-layout.header.light .inner-form a:hover, .iv-layout.header.dark .inner-form a:hover,
	.accent-color,
	.ivan-staff-wrapper .in-flip-holder .social-icons a,
	.bottom-footer .mega_main_menu .mega_main_menu_ul > li:hover > .item_link,
	.iv-mobile-menu-wrapper.iv-overlay-menu-wrapper .menu-item-has-children ul a:hover, .iv-mobile-menu-wrapper.iv-overlay-menu-wrapper .menu-item-has-children ul .item_link:hover,
	.ivan-button.light-bg,
	.woocommerce-page .content-wrapper a.button.alt:hover,
	.woocommerce a.button.alt:hover, .woocommerce-page a.button.alt:hover {
	  color: <?php echo esc_attr($accentBG); ?>;
	}
	
	.underline-text-color {
		background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 80%, <?php echo esc_attr($accentBG); ?> 80%);
	}
	
	button[type="submit"], input[type="submit"], .ivan-button {
		color: #fff;
	}

	.ivan-button.outline:hover hr,
	.ivan-button.no-border:hover,
	.ivan-button.primary-bg,
	.ivan-projects .ivan-project.hide-entry .entry,
	.ivan-projects .ivan-project.outer-square .entry,
	.ivan-projects .ivan-project.lateral-cover .entry,
	.ivan-projects .ivan-project.smooth-cover .entry,
	.ivan-testimonial.primary-bg.boxed-left .testimonial-content,
	.ivan-service .fa-stack,
	.ivan-service.primary-bg,
	.ivan-progress.primary-bg .ivan-progress-inner,
	.ivan-icon-box.primary-bg .icon-box-holder .fa-stack,
	.ivan-icon-boxed-holder.primary-bg .ivan-icon-boxed-icon-inner .fa-stack,
	.ivan-icon-wrapper .primary-bg .ivan-font-stack-square,
	.ivan-icon-list.primary-bg.circle i,
	.ivan-list.primary-bg.number.circle-in ul > li:before,
	.ivan-list.primary-bg.circle ul > li:before,
	.ivan-quote.primary-bg blockquote,
	.ivan-tabs-wrap .wpb_tour_tabs_wrapper.iv-tabs.iv-boxed .wpb_tabs_nav li.ui-tabs-active a,
	.ivan-vc-separator.primary-bg,
	.btn:hover,
	.button:hover,
	button:hover,
	input[type="submit"]:hover,
	.btn:focus,
	.button:focus,
	button:focus,
	input[type="submit"]:focus,
	.btn:active,
	.button:active,
	button:active,
	input[type="submit"]:active,
	.btn.active,
	.button.active,
	button.active,
	input[type="submit"].active,
	.open .dropdown-toggle.btn,
	.open .dropdown-toggle.button,
	.open .dropdown-togglebutton,
	.open .dropdown-toggleinput[type="submit"],
	.btn-default:hover,
	.btn-default:focus,
	.btn-default:active,
	.btn-default.active,
	.open .dropdown-toggle.btn-default,
	.btn-primary,
	.btn-primary:hover,
	.btn-primary:focus,
	.btn-primary:active,
	.btn-primary.active,
	.open .dropdown-toggle.btn-primary,
	.btn-primary.disabled,
	.btn-primary[disabled],
	fieldset[disabled] .btn-primary,
	.btn-primary.disabled:hover,
	.btn-primary[disabled]:hover,
	fieldset[disabled] .btn-primary:hover,
	.btn-primary.disabled:focus,
	.btn-primary[disabled]:focus,
	fieldset[disabled] .btn-primary:focus,
	.btn-primary.disabled:active,
	.btn-primary[disabled]:active,
	fieldset[disabled] .btn-primary:active,
	.btn-primary.disabled.active,
	.btn-primary[disabled].active,
	fieldset[disabled] .btn-primary.active,
	.page-links a:hover span,
	.sidebar .widget.widget_tag_cloud a:hover,
	.content-wrapper .wpb_widgetised_column .widget.widget_tag_cloud a:hover,
	.ivan-pricing-table.default.primary-bg,
	.ivan-pricing-table.subtitle .featured-table-text,
	.ivan-pricing-table.subtitle.primary-bg,
	.ivan-pricing-table.small-desc .featured-table-text,
	.ivan-pricing-table.small-desc.primary-bg,
	.ivan-projects .ivan-project.cover-entry .entry .read-more a:hover,
	.ivan-projects .ivan-project.soft-cover .entry .read-more a:hover,
	.ivan-icon-wrapper .primary-bg .ivan-font-stack-square.with-link:hover,
	.wpb_toggle.iv-toggle.boxed-arrow.wpb_toggle_title_active,
	.ivan_acc_holder.iv-accordion.with-arrow .ui-state-active,
	.iv-social-icon.circle:hover,
	.iv-social-icon.square:hover,
	.iv-mobile-menu-wrapper .current-menu-item > a,
	.iv-layout.top-header input[type="submit"]:hover,
	.iv-layout.top-header .woo-cart .buttons a:hover,
	.iv-layout.top-header .login-ajax .lwa input[type="submit"]:hover,
	.iv-layout.header input[type="submit"]:hover,
	.iv-layout.header .woo-cart .buttons a:hover,
	.iv-layout.header .login-ajax .lwa input[type="submit"]:hover,
	.iv-layout.footer .widget .iv-social-icon.circle:hover,
	.dynamic-footer .wpb_widgetised_column .widget .iv-social-icon.circle:hover,
	.iv-layout.footer .widget .iv-social-icon.square:hover,
	.dynamic-footer .wpb_widgetised_column .widget .iv-social-icon.square:hover,
	.iv-layout.bottom-footer .iv-social-icon.circle:hover,
	.iv-layout.bottom-footer .iv-social-icon.square:hover,
	#infinite-handle span:hover,
	#all-site-wrapper .mejs-controls .mejs-time-rail .mejs-time-current,
	#all-site-wrapper .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
	.page-loader-spinner > div,
	.thumbnail-hover .overlay,
	.post-nav-fixed .nl-infos,
	.tagcloud a:hover,
	.floated-contact-form .form-trigger:hover,
	.header.style6 .woo-cart.layout-alternative .basket-wrapper .basket span,
	.woo-cart.layout-alternative .basket-wrapper .basket span,
	.iv-layout.header .woo-cart .buttons a.wc-forward:hover,
	.button.use_code,
	.button.use_code:hover,
	.dt-newBtn-1,
	.latest-post:before, .latest-post:after, 
	.latest-post .post-inner:after, 
	.latest-post .post-inner:before,.header.style6 .mega_main_menu .mega_main_menu_ul > li.current-menu-ancestor > .item_link .link_text:before,
	.header.style6 .mega_main_menu .mega_main_menu_ul > li:hover > .item_link .link_text:before,
	.floated-contact-form .form-container form #ff-submit:hover,
	.ivan-counter-wrapper .counter-wrapper .sub:after,
	.ivan-progress .ivan-progress-inner,
	.ivan-progress.light-bg .ivan-progress-inner,
	.ivan-posts .ivan-post .ivan-post-inner:before,
	.page-loader-spinner span,
	.ivan-staff-wrapper .infos hr,
	.ninja-forms-form-wrap form input[type=submit],
	.pricing-table.featured .signup,
	.content-wrapper .woocommerce span.onsale, .woocommerce .content-wrapper span.onsale, .woocommerce-page .content-wrapper span.onsale, .content-wrapper .woocommerce-page span.onsale, .content-wrapper .woocommerce .widget_layered_nav_filters ul li a, .woocommerce .content-wrapper .widget_layered_nav_filters ul li a, .woocommerce-page .content-wrapper .widget_layered_nav_filters ul li a, .content-wrapper .woocommerce-page .widget_layered_nav_filters ul li a, .sticky-post-holder,
	p.demo_store, .woocommerce .content-wrapper a.button.alt, .content-wrapper .woocommerce a.button.alt, .content-wrapper .woocommerce-page a.button.alt, .woocommerce-page .content-wrapper a.button.alt, .content-wrapper .woocommerce button.button.alt, .woocommerce .content-wrapper button.button.alt, .content-wrapper .woocommerce-page button.button.alt, .woocommerce-page .content-wrapper button.button.alt, .content-wrapper .woocommerce input.button.alt, .woocommerce .content-wrapper input.button.alt, .content-wrapper .woocommerce-page input.button.alt, .woocommerce-page .content-wrapper input.button.alt, .content-wrapper .woocommerce #respond input#submit.alt, .woocommerce .content-wrapper #respond input#submit.alt, .content-wrapper .woocommerce-page #respond input#submit.alt, .woocommerce-page .content-wrapper #respond input#submit.alt, .content-wrapper .woocommerce a.button.alt:hover, .woocommerce .content-wrapper a.button.alt:hover, .content-wrapper .woocommerce-page a.button.alt:hover, .content-wrapper .woocommerce button.button.alt:hover, .woocommerce .content-wrapper button.button.alt:hover, .content-wrapper .woocommerce-page button.button.alt:hover, .woocommerce-page .content-wrapper button.button.alt:hover, .content-wrapper .woocommerce input.button.alt:hover, .woocommerce .content-wrapper input.button.alt:hover, .content-wrapper .woocommerce-page input.button.alt:hover, .woocommerce-page .content-wrapper input.button.alt:hover, .content-wrapper .woocommerce #respond input#submit.alt:hover, .woocommerce .content-wrapper #respond input#submit.alt:hover, .content-wrapper .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page .content-wrapper #respond input#submit.alt:hover, .single-post .entry-tags a:hover,
	.header.style7 .menu-items ul li .item_link .link_text:after,
	.ivan-vc-separator.small,
	.header .mega_main_menu .mega_main_menu_ul > li:hover > .item_link .link_text:before,
	#back-top:hover,
	.woo-cart .basket-wrapper .basket span, .woo-cart .basket-wrapper .basket span,
	.live-search.search-top-style .inner-wrapper .inner-form,
	body,
	.content-wrapper .button.use_code,
	#fullPage-nav span:hover, .fullPage-slidesNav span:hover,
	.ivan-promo-box .overlay.dark-overlay,
	.iv-mobile-menu-wrapper.iv-overlay-menu-wrapper a:hover, .iv-mobile-menu-wrapper.iv-overlay-menu-wrapper .item_link:hover,
	.ivan-button:hover,
	.content-wrapper .button.use_code:hover {
		background-color: <?php echo esc_attr($accentBG); ?> !important;
	}
	
	.iv-mobile-menu-wrapper.iv-overlay-menu-wrapper .iv-mobile-menu-close a:hover,
	.iv-mobile-menu-wrapper ul li ul > li > .item_link, .iv-mobile-menu-wrapper ul li ul > li > .item_link {
		background: transparent !important;
	}
	
	.button.use_code:hover,
	.woocommerce a.button.alt:hover,
	.woocommerce-page a.button.alt:hover {
		opacity: .8 !important;
	}
	
	.tstw-expanded ul li a.tstw-template-view {
		background-color: <?php echo ivan_hex2rgba($accentBG,'0.9'); ?>;
	}
	
	.ivan-projects .ivan-project .entry-default {
		background-color: <?php echo esc_attr($accentBG); ?>;
		background-color: <?php echo ivan_hex2rgba($accentBG,'0.8'); ?>;
	}
	
	.tagcloud a:hover,
	.floated-contact-form .form-trigger:hover,
	.return-to-shop .button:hover,
	.header .mega_main_menu .mega_main_menu_ul > li:hover > .item_link,
	.ivan-staff-wrapper .in-flip-holder .staff-frame,
	.ivan-projects .ivan-project.soft-cover .entry h3, .ivan-projects .ivan-project.hash-tags-cover .entry h3,
	.ivan-testimonial.boxed-left .testimonial-content,
	p.demo_store, .woocommerce .content-wrapper a.button.alt, .content-wrapper .woocommerce a.button.alt, .content-wrapper .woocommerce-page a.button.alt, .woocommerce-page .content-wrapper a.button.alt, .content-wrapper .woocommerce button.button.alt, .woocommerce .content-wrapper button.button.alt, .content-wrapper .woocommerce-page button.button.alt, .woocommerce-page .content-wrapper button.button.alt, .content-wrapper .woocommerce input.button.alt, .woocommerce .content-wrapper input.button.alt, .content-wrapper .woocommerce-page input.button.alt, .woocommerce-page .content-wrapper input.button.alt, .content-wrapper .woocommerce #respond input#submit.alt, .woocommerce .content-wrapper #respond input#submit.alt, .content-wrapper .woocommerce-page #respond input#submit.alt, .woocommerce-page .content-wrapper #respond input#submit.alt, .content-wrapper .woocommerce a.button.alt:hover, .woocommerce .content-wrapper a.button.alt:hover, .content-wrapper .woocommerce-page a.button.alt:hover, .woocommerce-page .content-wrapper a.button.alt:hover, .content-wrapper .woocommerce button.button.alt:hover, .content-wrapper .woocommerce-page button.button.alt:hover, .content-wrapper .woocommerce input.button.alt:hover, .woocommerce .content-wrapper input.button.alt:hover, .content-wrapper .woocommerce-page input.button.alt:hover, .woocommerce-page .content-wrapper input.button.alt:hover, .content-wrapper .woocommerce #respond input#submit.alt:hover, .woocommerce .content-wrapper #respond input#submit.alt:hover, .content-wrapper .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page .content-wrapper #respond input#submit.alt:hover,
	.woocommerce .cart-collaterals input:focus, .woocommerce .cart-collaterals select:focus, .woocommerce .cart-collaterals textarea:focus {
		border-color: <?php echo esc_attr($accentBG); ?> !important;
	}
	.ivan-testimonial.boxed-left .testimonial-content:after {
		border-top-color: <?php echo esc_attr($accentBG); ?> !important;
	}
	
	.ivan-button.outline {
		background-color: transparent !important;
	}

	.ivan-button.outline:hover,
	.content-wrapper .woocommerce a.button.alt:hover {
		background-color: transparent !important;
	}
	
	.iv-layout.footer .textwidget a:hover {
		color: <?php echo esc_attr($accentColor); ?> !important;
	}

	.ivan-button.outline:hover,
	.ivan-button.no-border:hover,
	.ivan-button.primary-bg,
	.ivan-button.primary-bg.outline.text-separator.with-icon .text-btn,
	.ivan-pricing-table.default.dark-bg .signup:hover,
	.ivan-pricing-table.default.black-bg .signup:hover,
	.ivan-pricing-table.big-price .top-section .adquire-plan .signup:hover,
	.ivan-pricing-table.description-support .bottom-section .signup:hover,
	.ivan-pricing-table.subtitle.dark-bg .signup:hover,
	.ivan-pricing-table.subtitle.black-bg .signup:hover,
	.ivan-pricing-table.small-desc.dark-bg .signup:hover,
	.ivan-pricing-table.small-desc.black-bg .signup:hover,
	.ivan-projects .ivan-project.cover-entry .entry .read-more a:hover,
	.ivan-projects .ivan-project.soft-cover .entry .read-more a:hover,
	.btn:hover,
	.button:hover,
	button:hover,
	input[type="submit"]:hover,
	.btn:focus,
	.button:focus,
	button:focus,
	input[type="submit"]:focus,
	.btn:active,
	.button:active,
	button:active,
	input[type="submit"]:active,
	.btn.active,
	.button.active,
	button.active,
	input[type="submit"].active,
	.open .dropdown-toggle.btn,
	.open .dropdown-toggle.button,
	.open .dropdown-togglebutton,
	.open .dropdown-toggleinput[type="submit"],
	.btn-default:hover,
	.btn-default:focus,
	.btn-default:active,
	.btn-default.active,
	.open .dropdown-toggle.btn-default,
	.btn-primary,
	.btn-primary:hover,
	.btn-primary:focus,
	.btn-primary:active,
	.btn-primary.active,
	.open .dropdown-toggle.btn-primary,
	.btn-primary.disabled,
	.btn-primary[disabled],
	fieldset[disabled] .btn-primary,
	.btn-primary.disabled:hover,
	.btn-primary[disabled]:hover,
	fieldset[disabled] .btn-primary:hover,
	.btn-primary.disabled:focus,
	.btn-primary[disabled]:focus,
	fieldset[disabled] .btn-primary:focus,
	.btn-primary.disabled:active,
	.btn-primary[disabled]:active,
	fieldset[disabled] .btn-primary:active,
	.btn-primary.disabled.active,
	.btn-primary[disabled].active,
	fieldset[disabled] .btn-primary.active,
	.iv-layout.top-header input[type="text"]:focus,
	.iv-layout.top-header input[type="email"]:focus,
	.iv-layout.top-header input[type="password"]:focus,
	.iv-layout.top-header input[type="search"]:focus,
	.iv-layout.top-header textarea:focus,
	.iv-layout.top-header input[type="submit"]:hover,
	.iv-layout.top-header .woo-cart .buttons a:hover,
	.iv-layout.top-header .login-ajax .lwa input[type="submit"]:hover,
	.iv-layout.header input[type="text"]:focus,
	.iv-layout.header input[type="email"]:focus,
	.iv-layout.header input[type="password"]:focus,
	.iv-layout.header input[type="search"]:focus,
	.iv-layout.header textarea:focus,
	.iv-layout.header input[type="submit"]:hover,
	.iv-layout.header .woo-cart .buttons a:hover,
	.iv-layout.header .login-ajax .lwa input[type="submit"]:hover,
	#infinite-handle span:hover,
	.sidebar .widget.widget_tag_cloud a:hover,
	.content-wrapper .wpb_widgetised_column .widget.widget_tag_cloud a:hover,
	.ivan-service .fa-stack,
	.ivan-icon-box.primary-bg .icon-box-holder .fa-stack,
	.ivan-icon-boxed-holder.primary-bg .ivan-icon-boxed-icon-inner .fa-stack,
	.ivan-tabs-wrap .wpb_tour_tabs_wrapper.iv-tabs.iv-boxed .wpb_tabs_nav li.ui-tabs-active a,
	.ivan-tabs-wrap .wpb_tour_tabs_wrapper.iv-tabs.iv-boxed .wpb_tab,
	.header.iv-layout .nav_menu > ul > li > ul,
	.header .mega_main_menu .default_dropdown > ul, .header .mega_main_menu .default_dropdown li > ul, .header .mega_main_menu .default_dropdown > ul, .header .mega_main_menu .multicolumn_dropdown > ul, .header .mega_main_menu .mega_main_menu_ul > li:hover > .item_link, .header .mega_main_menu.light-submenu .default_dropdown > ul, .header .mega_main_menu.light-submenu .default_dropdown li > ul, .header .mega_main_menu.light-submenu .multicolumn_dropdown > ul, .header .mega_main_menu.light-submenu .widgets_dropdown > ul,
	.woo-cart .inner-wrapper,
	.ivan-button:hover,
	.ivan-button.light-bg:hover,
	.ivan-button.primary-bg:hover,
	.post .share-icons a:hover, .woocommerce .content-wrapper table.cart a.remove:hover, .content-wrapper .woocommerce table.cart a.remove:hover, .woocommerce-page .content-wrapper table.cart a.remove:hover, .content-wrapper .woocommerce-page table.cart a.remove:hover, .content-wrapper .woocommerce-wishlist .share-icons a:hover, .woocommerce-wishlist .content-wrapper .share-icons a:hover, .content-wrapper .woocommerce div.product div.summary .share-icons a:hover, .woocommerce .content-wrapper div.product div.summary .share-icons a:hover, .content-wrapper .woocommerce-page div.product div.summary .share-icons a:hover, .content-wrapper .woocommerce-page .content-wrapper div.product div.summary .share-icons a:hover, .content-wrapper .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce .content-wrapper div.product .woocommerce-tabs ul.tabs li.active a, .content-wrapper .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page .content-wrapper div.product .woocommerce-tabs ul.tabs li.active a, .content-wrapper .woocommerce div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover, .woocommerce .content-wrapper div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover, .content-wrapper .woocommerce-page div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover, .woocommerce-page .content-wrapper div.product .woocommerce-tabs ul.tabs.tabs-vertical li a:hover,
	p.demo_store, .woocommerce .content-wrapper a.button.alt, .content-wrapper .woocommerce a.button.alt, .content-wrapper .woocommerce-page a.button.alt, .woocommerce-page .content-wrapper a.button.alt, .content-wrapper .woocommerce button.button.alt, .woocommerce .content-wrapper button.button.alt, .content-wrapper .woocommerce-page button.button.alt, .woocommerce-page .content-wrapper button.button.alt, .content-wrapper .woocommerce input.button.alt, .woocommerce .content-wrapper input.button.alt, .content-wrapper .woocommerce-page input.button.alt, .woocommerce-page .content-wrapper input.button.alt, .content-wrapper .woocommerce #respond input#submit.alt, .woocommerce .content-wrapper #respond input#submit.alt, .content-wrapper .woocommerce-page #respond input#submit.alt, .woocommerce-page .content-wrapper #respond input#submit.alt, .content-wrapper .woocommerce a.button.alt:hover, .woocommerce .content-wrapper a.button.alt:hover, .content-wrapper .woocommerce-page a.button.alt:hover, .woocommerce-page .content-wrapper a.button.alt:hover, .content-wrapper .woocommerce button.button.alt:hover, .woocommerce .content-wrapper button.button.alt:hover, .content-wrapper .woocommerce-page button.button.alt:hover, .woocommerce-page .content-wrapper button.button.alt:hover, .content-wrapper .woocommerce input.button.alt:hover, .woocommerce .content-wrapper input.button.alt:hover, .content-wrapper .woocommerce-page input.button.alt:hover, .woocommerce-page .content-wrapper input.button.alt:hover, .content-wrapper .woocommerce #respond input#submit.alt:hover, .woocommerce .content-wrapper #respond input#submit.alt:hover, .content-wrapper .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page .content-wrapper #respond input#submit.alt:hover, .single-post .entry-tags a:hover,
	.paging-navigation a.current, .paging-navigation span.current,
	.paging-navigation a:hover, .paging-navigation span:hover,
	.live-search.search-full-screen-alt-style .inner-wrapper .inner-form input[type=search]:focus,
	.ivan-projects .ivan-project.border-cover .entry .entry-inner .frame-border,
	.blog-masonry.style-simple .post.format-link,
	.blog-masonry.style-simple .post.format-quote,
	select:focus, textarea:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="color"]:focus,
	.button:hover {
		border-color: <?php echo esc_attr($accentBG); ?>;
	}
	
	.ivan-projects .ivan-project.lateral-cover .entry .frame-border {
		border-color: #1c1c1c;
	}
	
	.ivan-button.primary-bg:hover {
		background: <?php echo esc_attr($accentColor); ?> !important;
		border-color: <?php echo esc_attr($accentColor); ?> !important;
	}
	
	.ivan-button.primary-bg.outline:hover {
		background: transparent !important;
		color: <?php echo esc_attr($accentColor); ?> !important;
	}

	/* **** */
	/* Darken/Lighten */
	/* **** */

	.post-nav-fixed:hover .nl-arrow-icon,
	.ivan-button.primary-bg:hover,
	.ivan-button.primary-bg.outline hr,
	.ivan-button.primary-bg.outline:hover hr,
	.ivan-button.primary-bg.outline.icon-cover.with-icon .icon-simple {
	  background-color: <?php echo ivan_adjustColor($accentBG, -13); ?>;
	}

	.ivan-button.primary-bg.outline,
	.ivan-button.primary-bg.outline:hover {
	  color: <?php echo ivan_adjustColor($accentBG, -13); ?>;
	}

	.ivan-pricing-table.default.primary-bg .featured-table-text,
	.ivan-pricing-table.subtitle.primary-bg .featured-table-text,
	.ivan-pricing-table.small-desc.primary-bg .featured-table-text {
		color: <?php echo ivan_adjustColor($accentBG, -13); ?>;
	}

	.ivan-service.primary-bg .content-section-holder li,
	.ivan-service.primary-bg .content-section-holder p {
	  border-color: <?php echo ivan_adjustColor($accentBG, -7); ?>;
	}

	/* **** */
	/* WooCommerce Default */
	/* **** */

	::selection {
	  background-color: <?php echo esc_attr($accentBG); ?>;
	}

	::-moz-selection {
	  background-color: <?php echo esc_attr($accentBG); ?>;
	}

	p.demo_store,
	.woocommerce a.button.alt,
	.woocommerce-page a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce-page button.button.alt,
	.woocommerce input.button.alt,
	.woocommerce-page input.button.alt,
	.woocommerce #respond input#submit.alt,
	.woocommerce-page #respond input#submit.alt,
	.woocommerce a.button.alt:hover,
	.woocommerce-page a.button.alt:hover,
	.woocommerce button.button.alt:hover,
	.woocommerce-page button.button.alt:hover,
	.woocommerce input.button.alt:hover,
	.woocommerce-page input.button.alt:hover,
	.woocommerce #respond input#submit.alt:hover,
	.woocommerce-page #respond input#submit.alt:hover,
	.single-post .entry-tags a:hover {
	  background-color: <?php echo esc_attr($accentBG); ?>;
	  border-color: <?php echo esc_attr($accentBG); ?> !important;
	}

	.woocommerce span.onsale,
	.woocommerce-page span.onsale,
	.woocommerce .widget_layered_nav_filters ul li a,
	.woocommerce-page .widget_layered_nav_filters ul li a,
	.sticky-post-holder,
	.woocommerce ul.products li.product .quick-view:hover, .woocommerce-page ul.products li.product .quick-view:hover,
	.bottom-footer.two-columns .social-icons a:hover {
		background-color: <?php echo esc_attr($accentBG); ?>;
	}

	<?php
	endif;

	$accentColor = ivan_get_option('ivan-custom-accent-color');

	if($accentColor != '') :
	?>
	
	#page-loader,
	.ivan-button.primary-bg:hover {
		background: <?php echo esc_attr($accentColor); ?> !important;
	}
	
	.iv-layout.bottom-footer .custom-text a,
	.ivan-staff-wrapper .in-flip-holder .staff-frame div.job-title,
	.iv-layout.footer .textwidget a:hover {
		color: <?php echo esc_attr($accentColor); ?> !important;
	}
	
	.ivan-projects .ivan-project.cover-entry .entry-inner h3,
	.ivan-projects .ivan-project.cover-entry-alt .entry-inner h3,
	.ivan-projects .ivan-project.outer-square .entry h3,
	.ivan-projects .ivan-project.smooth-cover .entry h3,
	#fullPage-nav li .active span, .fullPage-slidesNav .active span,
	.ivan-button.primary-bg:hover {
		border-color: <?php echo esc_attr($accentColor); ?> !important;
	}
	
	.ivan-button.primary-bg.outline:hover {
		background: transparent !important;
		color: <?php echo esc_attr($accentColor); ?> !important;
	}
	
	.underline-text-color2 {
		background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 80%, <?php echo esc_attr($accentColor); ?> 80%)
	}
	
	<?php
	endif;

	// Heading Color
	$headingColor = ivan_get_option('ivan-heading-color');

	if($headingColor != '') :
	?>
		
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.woocommerce div.product div.summary span.price,
	.woocommerce-page div.product div.summary span.price,
	.woocommerce div.product div.summary p.price,
	.woocommerce-page div.product div.summary p.price,
	.woocommerce table.shop_table th,
	.woocommerce-page table.shop_table th,
	.woocommerce .cart-collaterals .cart_totals h2,
	.woocommerce-page .cart-collaterals .cart_totals h2,
	.woocommerce .coupon label,
	.woocommerce-page .coupon label,
	.woocommerce .shipping-calculator-button,
	.woocommerce-page .shipping-calculator-button {
		color: <?php echo esc_attr($headingColor); ?>;
	}

	.sidebar .widget.widget_tag_cloud a {
		color: <?php echo esc_attr($headingColor); ?>;
		border-color: <?php echo esc_attr($headingColor); ?>;
	}

	<?php
	endif;

	// Heading Weight
	$headingWeight = ivan_get_option('ivan-heading-weight');

	if($headingWeight != '') :
	?>
		
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.sidebar .widget.widget_tag_cloud a,
	.woocommerce div.product div.summary span.price,
	.woocommerce-page div.product div.summary span.price,
	.woocommerce div.product div.summary p.price,
	.woocommerce-page div.product div.summary p.price,
	.woocommerce table.shop_table th,
	.woocommerce-page table.shop_table th,
	.woocommerce .cart-collaterals .cart_totals h2,
	.woocommerce-page .cart-collaterals .cart_totals h2,
	.woocommerce .coupon label,
	.woocommerce-page .coupon label,
	.woocommerce .shipping-calculator-button,
	.woocommerce-page .shipping-calculator-button {
		font-weight: <?php echo esc_attr($headingWeight); ?>;
	}

	<?php
	endif;

	// Heading Weight Widget and Title
	$headingWidgetWeight = ivan_get_option('ivan-side-title-heading-weight');

	if($headingWidgetWeight != '') :
	?>
		
	.post .entry-title,
	.sidebar .widget .widget-title {
		font-weight: <?php echo esc_attr($headingWidgetWeight); ?>;
	}

	<?php
	endif;

	// Custom Title Wrapper Color and Height Calcs
	$titleTypo = ivan_get_option('title-wrapper-font');

	if( is_array($titleTypo) && isset($titleTypo['color']) ) {
		if( $titleTypo['color'] != '' ) : ?>

		.iv-layout.title-wrapper a, .iv-layout.title-wrapper a:hover {
			color: <?php echo esc_attr($titleTypo['color']); ?>;
		}

		<?php
		endif;
	}

	// Remove aside border of header
	if( ivan_get_option('aside-header-remove-border') == true ) :
	?>
		.ivan-m-l-aside.ivan-m-l-aside-left .ivan-main-layout-aside-left {
			border-right: none;
		}

		.ivan-m-l-aside.ivan-m-l-aside-right .ivan-main-layout-aside-right {
			border-left: none;
		}
	<?php
	endif;

	$output = ob_get_contents();
	ob_end_clean();
	// Check if can print something...
	if('' != $output) :
		echo '<style type="text/css">' . $output . '</style>';
	endif;// end main check

}
add_action('wp_head', 'ivan_customizer_output', 210);

function ivan_adjustColor($hex, $steps) { // 2.55 = 1 %
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Format the hex color string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Get decimal values
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));

    // Adjust number of steps and keep it inside 0 to 255
    $r = max(0,min(255,$r + $steps));
    $g = max(0,min(255,$g + $steps));  
    $b = max(0,min(255,$b + $steps));

    $r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
    $g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
    $b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

    return '#'.$r_hex.$g_hex.$b_hex;
}