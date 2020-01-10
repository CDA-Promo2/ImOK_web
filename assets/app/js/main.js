/**
 * GESTION DU MENU
 */
//on window load or resize, hide or show the mainNavigation
$(window).on('load resize',function(){
	if($(window).width()>=768){
		$('#mainNavigation').css('left','0');
	}else{
		$('#mainNavigation').css('left','-200px');
	}
});
//on togglers click, hide or show the menu
$(function(){
	$('.navigation-open, .navigation-close').click(function(){
		var navPosition = ($('#mainNavigation').position().left == 0) ? -200 : 0;
		$('#mainNavigation').animate({'left':navPosition});

	});
});

/**
 * AUTOCOMPLETION VILLE
 */
$(function(){
	$('input.typeahead').typeahead({
		delay: 100,
		items: 30,
		source:  function (query, process) {
			let url = new URL(window.location.href);
			let split = url.pathname.split('/');
			let path = '/' + split[1] + '/' + split[2] + '/search';
			return $.get(path, { query: query }, function (data) {
				// var url = new URL(window.location.href);
				// var split = url.pathname.split('/');
				// console.log(split);
				data = $.parseJSON(data);
				return process(data);
			});
		},
		displayText: function (item) {
			return item.name + ' (' + item.zip_code + ')';
		},
		afterSelect: function (data) {
			$("#id_cities").val(data.id);
		}
	});
});
