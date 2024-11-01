	/**
	 * @ Function For Sobex Toast To Hide
	 */
	jQuery(document).ready(function($) {
		$("body").on('click', '.sobex-toast-close', function() {
			var parent = $(this).closest('.sobex-toast');
			$(parent).animate({
				opacity: 0, // animate slideUp
				marginRight: '-200px'
			}, 'slow', 'linear', function() {
				$(this).remove();
			});
		})
	});