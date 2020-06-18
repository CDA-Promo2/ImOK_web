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
 **/
$(document).ready(function() {
	const citySearch = document.getElementById('city-search')
	const cityHelper = document.getElementById('city-helper')
	const cityId = document.getElementById('city-id')

	function updateCityInput(e) {
		citySearch.value = e.target.innerHTML
		cityId.value = e.target.getAttribute('data-city')
		cityHelper.innerHTML = ''
	}

	citySearch.onkeyup = () => {
		let value = citySearch.value
		if (value.length > 1) {
			fetch(base_url + '/cities/search?term=' + value)
				.then(resp => resp.json())
				.then(data => {
					cityHelper.innerHTML = '<ul>' + data.map(city =>
						`<li data-city="${city.id}">${city.name} (${city.zip_code})</li>`
					).join('') + '</ul>'
					for (let city of cityHelper.getElementsByTagName('li')) {
						city.addEventListener('click', (e) => {
							updateCityInput(e)
						})
					}
				})
		}
	}
});

/**
 * 	RECHERCHE DE BIENS
 */
$(document).ready(function () {

	const inputSearch = document.getElementById('search-estate');
	const estateList = document.getElementById('estate-card');

	inputSearch.onkeyup = () => {
		let value = inputSearch.value
		fetch(base_url + 'estate/searchEstate?term=' + value)
			.then(resp => resp.json())
			.then(data => {
				estateList.innerHTML = ''
				for (const estate of data) {
					estateList.innerHTML +=
						`<div class="col-11 mb-2">
						<div class="card">
							<a class="link-wrapper" href="estate/details/${estate.id}"></a>
							<img class="card-img-top" src="https://picsum.photos/300/200?random=${ Math.floor(Math.random() * 21)}" alt="Card image cap">
							<div class="card-body">
								<p class="small mb-0">Type de bien : ${estate.estate_type}</p>
								<p class="small mb-0">${estate.rooms_numbers ? estate.rooms_numbers : '-'} pièce(s)</p>
								<p class="small mb-0">Ville : ${estate.city ? estate.city : '-'}</p>
								<p class="small mb-0">Prix : ${estate.price ? estate.price : '-'} €</p>
							</div>
						</div>
					</div>`
				}
			})
	}

});

/**
 * MENU CREATION DES BIENS
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

/**
 * UPLOAD TEMPORAIRE IMAGE
 */
$(document).ready(function()
{
	// $('#image-upload').change(function (e)
	// {
	// 	let imageData = document.getElementById('image-upload');
	// 	console.log(imageData.files)
	//
	// 	fetch('http://imok.local.fr/estate/tempUpload/100', {
	// 		method: 'POST',
	// 		body: JSON.stringify({
	// 			imageData: imageData.files
	// 		})
	// 	})
	// 		.then(response => response.json())
	// 		.then(json => console.log(json))
	// });
});

/**
 * SUPPRESSION IMAGE TEMPORAIRE
 */
$('body').on('click', '.deleteImage', function (e)
{
	console.log($(this).attr("data-target"));
});

/**
 * Gestion des facilities
 */
function show_facilities() {

	// On récup les facilities du bien
	var facilitiesList = $('#facilities_array').val();
	var facilitiesArray = facilitiesList.split(',');

	for (const elem of facilitiesArray) {
		let append = 	`<div class="d-flex justify-content-between border-bottom px-4 pb-2 pt-3"> 
									<p class="mb-0 facilityName">${elem}</p> 
									<div> 
										<i class="fas fa-times-circle btn btn-danger deleteFacility"></i> 
									</div> 
								</div>`;

		$('#facilities-list').append(append);

		$('#facilities-select option:contains(' + elem + ')').attr({disabled: true });
	}
}

$(document).ready(function(){

	// Si nous modifions un bien, on récupère et on affiche les facilities déjà présentes
	if ($('#facilities_array').val()) {
		show_facilities();

		var facilitiesValue = $('#facilities_array').val();
		var facilitiesList = facilitiesValue.split(',');

		// Sinon on commence avec une liste vide
	} else {
		var facilitiesList = [];
	}

	$('#facilities-select option').click(function(e){

		//on recupere la valeur
		if(e.target.value != 0){
			$(this).attr({ disabled : true, selected : false });
			$('#facilities-select option').eq(0).attr('selected',true);

			facilitiesList.push(e.target.text);

			let append = 	`<div class="d-flex justify-content-between border-bottom px-4 pb-2 pt-3"> 
								<p class="mb-0 facilityName">${e.target.text}</p> 
								<div> 
									<i class="fas fa-times-circle btn btn-danger deleteFacility"></i> 
								</div> 
							</div>`;

			$('#facilities-list').append(append);

			$('#facilities_array').val(facilitiesList.toString());
		}
	});

	$('body').on('click', '.deleteFacility', function (e)
	{
		// On retire l'élément du DOM
		$(this).parent().parent().remove();

		// On le supprime du tableau des facilities
		let facilityName = $(this).parent().parent().find('p').html();
		const facilityIndex = facilitiesList.indexOf(facilityName);
		facilitiesList.splice(facilityIndex, 1);

		// Et on le rends de nouveau disponible dans le menu déroulant
		$('#facilities-select option:contains(' + facilityName + ')').attr({disabled: false });

		$('#facilities_array').val(facilitiesList.toString());
	});
});

/**
 * FIN DE CREATION DES BIENS
 */


/**
 * CONFIGURATION DU WYSIWYG
 */
$(document).ready(function() {
	$.trumbowyg.svgPath = base_url + '/assets/img/icons.svg';
	$('#description').trumbowyg({
		btns: [
			['undo', 'redo'], // Only supported in Blink browsers
			['strong', 'em', 'underline'],
			['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
			['horizontalRule']
		]
	});
});

/**
 *	GESTION DES PIECES
 */
$(document).ready(function()
{
	// Correspond on nombre de pièce présente sur le bien, permets de cibler les biens en cas de suppression / modification
	var roomNumber = 0;
	var estateRooms = $('#room_string').val();

	// S'il y a déja des pièces (récupérées par un $_POST ou en cas d'update), on les affiche
	if (estateRooms)
	{
		// On change le JSON en tableau d'objet
		var estateJson = JSON.parse(estateRooms);

		for(let room of estateJson)
		{
			let append = 	`<div class="d-flex justify-content-between border-bottom px-4 pb-2 pt-3"> 
								<p class="mb-0 estateRoom" id="${roomNumber}">${room.room_types}</p> 
								<div> 
									<i class="fas fa-edit btn btn-primary editRoom mr-2" data-target="${roomNumber}"></i>
									<i class="fas fa-times-circle btn btn-danger deleteRoom" data-target="${roomNumber}"></i> 
								</div> 
							</div>`;

			$('#room_list').append(append);

			roomNumber++;
		}
	}
	// S'il y avait déjà des pièces
	estateRooms = estateRooms ? JSON.parse($('#room_string').val()) : [];

	$('#add_room').click(function()
	{
		// On récupère le nom de la pièce, on l'utilisera dans l'affichage
		let roomType = $('#room_types').val();

		// En cas de modification d'une pièce in récupère l'id de la room
		var room_id = $('#room_id').val();

		// On réalise un tableau avec les valeurs de la pièce
		let roomCarac = {
			id: room_id ? +room_id : roomNumber,
			room_types: roomType,
			room_size: +$('#room_size').val(),
			room_carrezSize: +$('#room_carrezSize').val(),
			windows_types: $('#windows_types').val(),
			wall_coverings: $('#wall_coverings').val(),
			ground_coverings: $('#ground_coverings').val()
		};

		// Si un id est présent dans l'input hidden room_id alors c'est que l'on modifie une pièce
		if (room_id) {
			// On parcours le JSON afin de retrouver la bonne pièce
			for(let room in estateRooms) {
				if (estateRooms[room].id == room_id){
					// Puis on modifie le JSON avec les nouvelles valeurs
					estateRooms[room] = roomCarac;
					break;
				}
			}
			// On modifie l'affichage du bouton
			$('#add_room').removeClass( "btn btn-info" )
				.addClass( "btn btn-primary" )
				.html( "<i class=\"fa fa-pen\"></i> Ajouter une pièce" );
			// On met à jour le nom de la pièce
			$('#'+room_id).html(roomType);
			// Puis on réinitialise l'id de la pièce que le l'on modifie
			$('#room_id').val('');
		} else {
			// Sinon on ajoute la nouvelle pièce
			estateRooms.push(roomCarac);

			let append = 	`<div class="d-flex justify-content-between border-bottom px-4 pb-2 pt-3"> 
								<p class="mb-0 estateRoom" id="${roomNumber}">${roomType}</p> 
								<div> 
									<i class="fas fa-edit btn btn-primary editRoom mr-2" data-target="${roomNumber}"></i>
									<i class="fas fa-times-circle btn btn-danger deleteRoom" data-target="${roomNumber}"></i> 
								</div> 
							</div>`;

			$('#room_list').append(append);
			roomNumber++;
		}
		// Puis on vide le formulaire
		clearRoomForm();

		// On mets à jour l'input contenant les pièces du bien avec la version string du JSON
		$('#room_string').val(JSON.stringify(estateRooms));
	});

	// Sur le body on déclenche la fonction en cliquant sur l'élément ayant la classe 'estateRoom'
	$('body').on('click', '.editRoom', function ()
	{
		// On récupère l'id de la pièce que l'on insert dans l'input hidden
		let targetId = $(this).attr('data-target');
		$('#room_id').val(targetId);

		// On modifie le bouton pour montrer que l'on modifie une pièce déjà existante
		$('#add_room').removeClass( "btn btn-primary" )
			.addClass( "btn btn-info modify" )
			.html( "<i class=\"fa fa-pen\"></i> Modifier la pièce" );

		// On parcours le JSON afin de retrouver la bonne pièce
		for(let room in estateRooms)
		{
			if (estateRooms[room].id == targetId)
			{
				// On récupère les valeurs de la pièce dans le tableau de pièce et on les affiche
				$('#room_types').val(estateRooms[room]['room_types']);
				$('#room_size').val(estateRooms[room]['room_size']);
				$('#room_carrezSize').val(estateRooms[room]['room_carrezSize']);
				$('#windows_types').val(estateRooms[room]['windows_types']);
				$('#wall_coverings').val(estateRooms[room]['wall_coverings']);
				$('#ground_coverings').val(estateRooms[room]['ground_coverings']);

				break;
			}
		}
	});
	// Sur le body on déclenche la fonction en cliquant sur l'élément ayant la classe 'estateRoom'
	$('body').on('click', '.deleteRoom', function ()
	{
		// On récupère l'id de la pièce que l'on veux supprimer
		let targetId = $(this).attr('data-target');

		let choice = confirm('Supprimer cette pièce ?')
		if (choice == true)
		{
			for(let room in estateRooms)
			{
				if (estateRooms[room].id == targetId)
				{
					estateRooms.splice(room,1);
					break;
				}
			}
			// On nettoie le tableau du undefined crée par la suppression de l'élément
			estateRooms.filter(function(x) {
				return x !== undefined;
			});
			// On enlève l'élem du DOM
			$('#'+ targetId).parent().remove();
			// Si le formulaire était sur la pièce que l'on a supprimée, on le vide et on change le bouton
			if (targetId == $('#room_id').val())
			{
				clearRoomForm();
				$('#add_room').removeClass( "btn btn-info" )
					.addClass( "btn btn-primary" )
					.html( "<i class=\"fa fa-pen\"></i> Ajouter une pièce" );
				$('#room_id').val('');
			}
		}
		// Enfin, on mets à jour l'input contenant les pièces du bien avec la version string du JSON
		$('#room_string').val(JSON.stringify(estateRooms));
	});

	function clearRoomForm() {
		$('#room_types').val('');
		$('#room_size').val('');
		$('#room_carrezSize').val('');
		$('#windows_types').val('');
		$('#wall_coverings').val('');
		$('#ground_coverings').val('');
	}
});



/**
 * OPEN STREET MAP
 */
$(function(){
	//FOR EACH MAP
	$('[data-map]').each(function(){
		//GET THE MAP ID AND BASIC DATA (LAT, LON, ZOOM-LEVEL)
		const id = $(this).attr('id');
		let pos = JSON.parse( $(this).attr('data-map') );

		//INIT MAP
		const currentMap = L.map(id).setView([pos[0], pos[1]], pos[2]);
		L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png').addTo(currentMap);

		//FIND AND INIT MARKERS
		$(this).find('.marker').each(function(){
			let address = $(this).attr('data-address');
			let zipcode = $(this).attr('data-zipcode');
			let content = $(this).html();
			let focus = $(this).hasClass('focus');

			$.get(`https://api-adresse.data.gouv.fr/search/?q=${address}&postcode=${zipcode}` , false, (data) => {
				if(data.features.length > 0){
					let pos = data.features[0].geometry.coordinates.reverse();
					let marker = L.marker(pos).addTo(currentMap);
					marker.bindPopup(content);
					if(focus){
						currentMap.zoomIn(8).setView([pos[0],pos[1]]);
					}
				}
			}, 'JSON');

		});
	});
});


