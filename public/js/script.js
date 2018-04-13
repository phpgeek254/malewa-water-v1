$(function(){
	$('.button-collapse').sideNav();
	$('.collapsible').collapsible();
	$('.modal').modal();
	$('.select').material_select();
	$('#print_order').click(function () {
		window.print();
	});

	var message = $('.message').html();
	if (message != null) {
		Materialize.toast(message, 4000);
	}

	 $('ul.tabs').tabs();
});