<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package angular-material-theme
 */

?>

	</md-content><!-- #content -->

	<md-toolbar class="md-accent md-tall">
		<div id="footer_content" layout="row" layout-align="space-between center">
			<div layout="row" layout-align="start center">
				<md-button href="<?php echo esc_url(__('https://wordpress.org/', 'angular-material')); ?>"><?php printf(esc_html__('Proudly powered by %s', 'angular-material'), 'WordPress'); ?></md-button>
			</div>
			<div layout="row" layout-align="end center">
				<span style="font-size: .8em;">angular-material by</span><md-button href="http://jamessweeney.rocks" rel="designer">James Sweeney III</md-button>
			</div>
		</div><!-- .site-info -->
	</md-toolbar><!-- #colophon -->
</div><!-- #page -->

<!-- Angular Material requires Angular.js Libraries -->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-messages.min.js"></script>

<!-- Angular Material Library -->
<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>

<!-- Your application bootstrap  -->
<script type="text/javascript">
	/**
	 * You must include the dependency on 'ngMaterial'
	 */
	angular.module('MaterialThemeApp', ['ngMaterial']).controller('MenuCtrl', function(){
		var originatorEv;
		this.openMenu = function($mdOpenMenu, ev) {
			originatorEv = ev;
			$mdOpenMenu(ev);
		};
	});
</script>
<?php wp_footer(); ?>

</body>
</html>
