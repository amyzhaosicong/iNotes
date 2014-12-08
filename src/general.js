$(document).ready(function() {
	$('#page-content-wrapper').load('notes_list.php');
	$('#sidebar-wrapper ul li a').click(function(){
		var cid = $(this).attr('href');
		if (!isNaN(cid)) {
			$('#page-content-wrapper').load('notes_list.php?category_id='+cid);
			return false;
		}  else {
			return true;
		}
		

	} );

});

