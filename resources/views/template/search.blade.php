<div class="search-container">
    <input name="Search" id="Search" type="search" placeholder="SEARCH BY NAME"> 
	<a href="/logout"><i class="fas fa-sign-out-alt"></i></a>
</div>
<script type="text/javascript">
	jQuery(document).ready(function ($) {

			$("#Search").keyup(function(){
				var selectSize = $(this).val();

			  filter(selectSize);
			});
			function filter(e) {
			    // var regex = new RegExp('\\b\\w*' + e.toLowerCase() + '\\w*\\b');
			    var regex = new RegExp('\\b\\w*' + e + '\\w*\\b');
			    		$('.toHide').hide().filter(function () {
			        return regex.test($(this).data('size'))
			    }).show();

					$('.toHide').hide().filter(function () {

					return regex.test($(this).data('size'))
			}).show();
			}

	});
</script>
