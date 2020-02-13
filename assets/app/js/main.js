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

/**
 * GESTION DU CREATE DES RDV
 */


/**
 * CREATION DES BIENS
 */

//si on clique sur un bouton next ou previous
$('.next, .previous').click(function(){

	var parent = $(this).attr('data-parent');
	var target = $(this).attr('data-target');

	//on doit vérifier que les inputs sont valides
	var inputs = $(parent).find('input, select');
	var valid = true;
	//on boucle sur chanque input de la page
	for (input of inputs){
		if($(input).hasClass('invalid')){
			valid = false;
		}
	}
	//si toutes les verif sont ok, on peut changer de page
	if(valid == true){
		//on recupère l'onglet cible, on cache tous les onglets sauf l'onglet cible
		$('.card.tab').hide();
		$(target).show();
	}
})

$(document).ready(function(){
	update_energyScale();
	update_gasScale();

	$('#energy_consumption').on('keyup',update_energyScale);
	$('#gas_emission').on('keyup',update_gasScale);
});

function update_energyScale(){
	var val = $('#energy_consumption').val();
	var range = between(val,0,50) ? 0 : 7;
	var range = between(val,51,90) ? 1 : range;
	var range = between(val,91,150) ? 2 : range;
	var range = between(val,151,230) ? 3 : range;
	var range = between(val,231,330) ? 4 : range;
	var range = between(val,331,450) ? 5 : range;
	var range = val>450 ? 6 : range;

	$('.energyScale li').removeClass('selected');
	$('.energyScale li').eq(range).addClass('selected');
}

function update_gasScale(){
	var val = $('#gas_emission').val();
	var range = between(val,0,5) ? 0 : 7;
	var range = between(val,6,10) ? 1 : range;
	var range = between(val,11,20) ? 2 : range;
	var range = between(val,21,35) ? 3 : range;
	var range = between(val,36,55) ? 4 : range;
	var range = between(val,56,80) ? 5 : range;
	var range = val>80 ? 6 : range;

	$('.gasScale li').removeClass('selected');
	$('.gasScale li').eq(range).addClass('selected');
}


function between(x,min,max){
	if(isNaN(x) || x == ""){
		return false;
	}
	return (x>=min && x<=max);
}


$('#image-upload').change(function(e){

	var html = '';

	var files = e.target.files;
	for (file of files){
		var src = URL.createObjectURL(file);
		html += '<div class="col-md-6 p-3"><div class="thumbnail-image" style="background-image: url('+src+');"></div></div>';
	}

	$('#image-preview').html(html);

})

$('#facilities-select option').click(function(e){
	//on recupere la valeur
	if(e.target.value !=0){
		$(this).attr({ hidden : true, selected : false });
		$('#facilities-select option').eq(0).attr('selected',true)
	}

	//on cree le JSON

	console.log(e.target.text);
})



/**
 * FIN DE CREATION DES BIENS
 */
