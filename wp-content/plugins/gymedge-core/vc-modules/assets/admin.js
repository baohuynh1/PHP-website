(function ($) {

	function gymedge_admin_script() {
		$('.gymedge_multi_select').select2({
			multiple: true,
		});
	}

	$(document).ready(function () {
		gymedge_admin_script();
	});

})
(jQuery);