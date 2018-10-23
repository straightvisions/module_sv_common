jQuery(function(){
  jQuery('[data-toggle="tooltip"]').tooltip();
  // fix all modals within positioned containers
  jQuery('body').append($('.modal'));
});
jQuery(document).on('click', '[data-toggle="lightbox"]', function(event) {
	event.preventDefault();
	jQuery(this).ekkoLightbox();
});
jQuery(document).on('click', 'a.disabled', function(event) {
    event.preventDefault();
});
jQuery(document).ready(function(){
	// alertify config
	if(typeof alertify !== 'undefined'){
		alertify.defaults.transition = "slide";
		alertify.defaults.theme.ok = "btn btn-primary";
		alertify.defaults.theme.cancel = "btn btn-danger";
		alertify.defaults.theme.input = "form-control";
	}else{
		console.log('error:	alertify not found');
	}
    // initiate filter dropdown
    if(jQuery('.dropdown-toggle').length > 0){
		jQuery('.dropdown-toggle').dropdown();
    }
});