<?php
class Bavotasan_Documentation {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'load-themes.php', array( $this, 'activation_admin_notice' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.0.3
	 */
	public function activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
			add_action( 'admin_notices', array( $this, 'welcome_admin_notice' ), 99 );
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.0.3
	 */
	public function welcome_admin_notice() {
		?>
		<div class="updated fade">
			<p><?php echo sprintf( esc_html__( 'Thanks for choosing %1$s! You can learn how to use the available theme options on the %2$sabout page%3$s.', 'arcade-basic' ), BAVOTASAN_THEME_NAME, '<a href="' . esc_url( admin_url( 'themes.php?page=bavotasan_documentation' ) ) . '">', '</a>' ); ?></p>

			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=bavotasan_documentation' ) ); ?>" class="button" style="text-decoration: none;"><?php printf( __( 'Learn more about %s', 'arcade-basic' ), BAVOTASAN_THEME_NAME ); ?></a></p>
		</div>
		<?php
	}

	/**
	 * Add a 'Documentation' menu item to the Appearance panel
	 *
	 * This function is attached to the 'admin_menu' action hook.
	 *
	 * @since 1.0.0
	 */
	public function admin_menu() {
		add_theme_page( sprintf( __( 'Welcome to %1$s %2$s', 'arcade-basic' ), BAVOTASAN_THEME_NAME, BAVOTASAN_THEME_VERSION ), sprintf( __( 'About %s', 'arcade-basic' ), BAVOTASAN_THEME_NAME ), 'edit_theme_options', 'bavotasan_documentation', array( $this, 'bavotasan_documentation' ) );
	}

	public function bavotasan_documentation() {
		?>
		<style>
		.featured-image {
			margin: 20px auto !important;
		}

		.about-wrap .headline-feature h2 {
			text-align: center;
		}

		.about-wrap .dfw h3 {
			text-align: left;
		}

		.changelog.headline-feature.dfw {
			max-width: 68%;
		}

		.changelog.headline-feature.dfw {
			margin-left: auto;
			margin-right: auto;
		}

		.about-wrap ul {
			padding-left: 60px;
			list-style: disc;
			margin-bottom: 20px;
		}

		.about-wrap .theme-badge {
			position: absolute;
			top: 0;
			right: 0;
		}

		.about-wrap .headline-feature p {
		    text-align: left;
		    margin: 1.25em 0;
		}

		.about-wrap .feature-section {
			border: 0;
			padding: 0;
		}

		@media only screen and (max-width: 768px) {
			.changelog.headline-feature.dfw {
				max-width: 100%;
			}

			.about-wrap .theme-badge {
				display: none;
			}
		}
		</style>
		<div class="wrap about-wrap" id="custom-background">
			<h1><?php echo get_admin_page_title(); ?></h1>

			<div class="about-text">
				<?php printf( __( 'Read through the following documentation to learn more about <em>%s</em> and how to use the available theme options.', 'arcade-basic' ), BAVOTASAN_THEME_NAME ); ?>
			</div>
			<div class="theme-badge">
				<img src="<?php echo BAVOTASAN_THEME_URL; ?>/library/images/screenshot_sml.jpg" />
			</div>

			<h2 class="nav-tab-wrapper">
				<a href="<?php echo admin_url( 'themes.php?page=bavotasan_documentation' ); ?>" class="nav-tab nav-tab-active"><?php _e( 'Documentation', 'arcade-basic' ); ?></a>
				<a href="<?php echo admin_url( 'themes.php?page=bavotasan_preview_pro' ); ?>" class="nav-tab"><?php _e( 'Upgrade', 'arcade-basic' ); ?></a>
			</h2>

			<div class="changelog headline-feature dfw">
				<h2><?php _e( 'The Customizer', 'arcade-basic' ); ?></h2>

				<div class="featured-image dfw-container">
					<img src="<?php echo BAVOTASAN_THEME_URL; ?>/library/images/customizer.jpg" />
				</div>

				<p><?php printf( __( 'All theme options for <em>%1$s</em> are controlled under %2$sAppearance &rarr; Customize%3$s. From there, you can modify layout, custom menus, and more.', 'arcade-basic' ), BAVOTASAN_THEME_NAME, '<a href="' . admin_url( 'customize.php' ) . '">', '</a>' ); ?></p>

				<h3><?php _e( 'Site Title Arc', 'arcade-basic' ); ?></h3>
				<p><?php printf( __( '<em>%s</em> uses Arctext.js to create a cool curved effect on your site title. The space and rotation for each letter is calculated using the Arc Radius and the width of the site title. If you don&rsquo;t want your site title to arc, leave the field blank.', 'arcade-basic' ), BAVOTASAN_THEME_NAME ); ?></p>

				<h3><?php _e( 'Site &amp; Main Content Width', 'arcade-basic' ); ?></h3>

				<p><?php _e( 'There are two width options for your site: 1200px &amp; 992px. You can select the width of your main content, based on a 12 column grid. Resizing your main content will also resize your sidebar.', 'arcade-basic' ); ?></p>

				<h3><?php _e( 'Sidebar Layout', 'arcade-basic' ); ?></h3>

				<p><?php _e( 'With the sidebar layout option, you can decide whether to display your sidebar on the left or right of your main content.', 'arcade-basic' ); ?></p>
			</div>
			<hr />

			<div class="changelog headline-feature dfw">
				<h2><?php _e( 'Custom Menus', 'arcade-basic' ); ?></h2>

				<p><?php printf( __( '<em>%s</em> includes one Custom Menu locations: the Primary top menu.', 'arcade-basic' ), BAVOTASAN_THEME_NAME ); ?></p>

				<p><?php printf( __( 'To add a navigation menu to the header, go to %1$sAppearance &rarr; Menus%2$s. By default, a list of categories will appear in this location if no custom menu is set.', 'arcade-basic' ), '<a href="' . admin_url( 'nav-menus.php' ) . '">', '</a>' ); ?></p>

				<p><?php _e( 'Clicking on a top-level link in the primary navigation will open up the first dropdown list of sub-menu links.', 'arcade-basic' ); ?></p>

			</div>
			<hr />

			<div class="changelog headline-feature dfw">
				<h2><?php _e( 'Jumbo Headline', 'arcade-basic' ); ?></h2>

				<div class="featured-image dfw-container">
					<img src="<?php echo BAVOTASAN_THEME_URL; ?>/library/images/jumbo-headline.jpg" />
				</div>

				<p><?php printf( __( 'The Jumbo Headline is a widgetized area on the home page designed for a Text widget. Go to %1$sAppearance &rarr; Widgets%2$s to add the widget and customize the text.', 'arcade-basic' ), '<a href="' . admin_url( 'widgets.php' ) . '">', '</a>' ); ?></p>
			</div>
			<hr />

			<div class="changelog headline-feature dfw">
				<h2><?php _e( 'Home Page Top Area', 'arcade-basic' ); ?></h2>

				<div class="featured-image dfw-container">
					<img src="<?php echo BAVOTASAN_THEME_URL; ?>/library/images/home-page-widgets.jpg" />
				</div>

				<p><?php printf( __( 'The section where the four widgets appear on the homepage will only display once a widget is added to the Homepage Top Area in %1$sAppearance &rarr; Widgets%2$s. The demo uses the custom Icon & Text widget that comes with <em>%3$s</em> to display an icon accompanied by text. You can even have the icon and text link to a page or a post, by adding a URL in the field provided.', 'arcade-basic' ), '<a href="' . admin_url( 'widgets.php' ) . '">', '</a>', BAVOTASAN_THEME_NAME ); ?></p>
			</div>
			<hr />

			<div class="changelog headline-feature dfw">
				<h2><?php _e( 'Post Block Page Template', 'arcade-basic' ); ?></h2>

				<div class="featured-image dfw-container">
					<img src="<?php echo BAVOTASAN_THEME_URL; ?>/library/images/post-block.jpg" />
				</div>

				<p><?php _e( 'On the homepage of the demo, the lower section is comprised of four posts displayed in a grid block. You can create this look on your homepage by creating a static front page and assigning the Post Block page template to it.', 'arcade-basic' ); ?></p>
			</div>
			<hr />

			<div class="changelog headline-feature dfw">
				<h2><?php _e( 'Custom Header Image', 'arcade-basic' ); ?></h2>

				<p><?php _e( 'You have an option to display a custom header image on each of your posts and pages, through the Custom Header Image panel. Click <strong>Set Image</strong> to open the media library and select an image or upload a new one. Click <strong>Update</strong> or <strong>Publish</strong> when you&rsquo;re done.', 'arcade-basic' ); ?></p>

				<div class="featured-image dfw-container">
					<img src="<?php echo BAVOTASAN_THEME_URL; ?>/library/images/custom-header.jpg" />
				</div>

				<p><?php _e( 'If you don&rsquo;t set a custom header on a page or post, your default header image will be displayed instead, if you selected one.', 'arcade-basic' ); ?></p>
			</div>
			<hr />

			<div class="changelog headline-feature dfw">
				<h2><?php _e( 'Jetpack', 'arcade-basic' ); ?></h2>

				<div class="featured-image dfw-container">
					<img src="<?php echo BAVOTASAN_THEME_URL; ?>/library/images/jetpack.jpg" />
				</div>

				<h3><?php _e( 'Infinite Scroll', 'arcade-basic' ); ?></h3>

				<p><?php printf( __( '%1$sJetpack&rsquo;s Infinite Scroll%2$s allows your visitors to view all your posts without having to click through to the next page. As they scroll, new posts will be added. To activate go to %3$sJetpack &rarr; Settings%4$s. ', 'arcade-basic' ), '<a href="//jetpack.me/support/infinite-scroll/">', '</a>', '<a href="' . admin_url( 'admin.php?page=jetpack_modules' ) . '">', '</a>' ); ?></p>

				<h3><?php _e( 'Tiled Galleries', 'arcade-basic' ); ?></h3>

				<p><?php printf( __( '%1$sJetpack&rsquo;s Tiled Galleries%2%s will display your images in a beautiful mosaic layout. Go to %3$sJetpack &rarr; Settings%4$s to turn it on. ', 'arcade-basic' ), '<a href="//jetpack.me/support/tiled-galleries/">', '</a>', '<a href="' . admin_url( 'admin.php?page=jetpack_modules' ) . '">', '</a>' ); ?></p>

				<h3><?php _e( 'Carousel', 'arcade-basic' ); ?></h3>

				<p><?php printf( __( 'With %1$sJetpack&rsquo;s Carousel%2$s, clicking on one of your gallery images will open up a featured lightbox slideshow. Turn it on by going to %3$sJetpack &rarr; Settings%4$s. ', 'arcade-basic' ), '<a href="//jetpack.me/support/carousel/">', '</a>', '<a href="' . admin_url( 'admin.php?page=jetpack_modules' ) . '">', '</a>' ); ?></p>
			</div>
			<hr />

			<div class="changelog headline-feature dfw">
				<h2><?php _e( 'Pull Quotes', 'arcade-basic' ); ?></h2>

				<div class="featured-image dfw-container">
					<img src="<?php echo BAVOTASAN_THEME_URL; ?>/library/images/pull-quotes.jpg" />
				</div>

				<p><?php _e( 'You can easily include a pull quote within your text by using the following code within the Text/HTML editor:', 'arcade-basic' ); ?></p>

				<p><code><?php _e( '&lt;blockquote class="pullquote"&gt;This is a pull quote that will appear within your text.&lt;/blockquote&gt;', 'arcade-basic' ); ?></code></p>
				<p><?php _e( 'You can also align it to the right with this code:', 'arcade-basic' ); ?></p>

				<p><code><?php _e( '&lt;blockquote class="pullquote alignright"&gt;This is a pull quote that will appear within your text.&lt;/blockquote&gt;', 'arcade-basic' ); ?></code></p>
			</div>
			<hr />

			<p><?php printf( __( 'For more information, check out the %1$sDocumentation &amp; FAQs%2$s section on my site.', 'arcade-basic' ), '<a href="//themes.bavotasan.com/documentation/" target="_blank">', '</a>' ); ?></p>
		</div>
		<?php
	}
}
$bavotasan_documentation = new Bavotasan_Documentation;