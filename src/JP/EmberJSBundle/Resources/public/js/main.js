var displayRadios = function(data) {
	var html = '';
	html = '<ul>';
	for (i in data) {
		var liElement = '';
		liElement = '<li class="radio" data-slug="' + data[i].slug + '"><img src="/img/radios/' + data[i].image + '" alt="' + data[i].slug + '" /></li>';
		html += liElement;
	}
	html += '</ul>';
	$('#radios').html(html);
};

var getRadiosFromGame = function(game) {
	$.ajax({
        url: '/radios.php?game=' + game,
        type: 'GET'
    }).done(function(data){
    	displayRadios(data);
    });
};

var gameAction = function(liElement) {
	//alert(liElement.attr('data-slug'));
	liElement.addClass('game_selected');
	getRadiosFromGame(liElement.attr('data-slug'));
};

var bindGameActions = function() {
	$games = $('.game');
	$games.on('click', function() {
		$games.each(function(){
			if ($(this).hasClass('game_selected')) {
				$(this).removeClass('game_selected');
			}
		});
		$('#radios').html('<p>Récupération de la liste des radios en cours...</p>');
		gameAction($(this));
	});
};

var displayGames = function(data) {
	var html = '';
	html = '<ul>';
	for (i in data) {
		var liElement = '';
		liElement = '<li class="game" data-slug="' + data[i].slug + '"><img src="/img/' + data[i].image + '" alt="' + data[i].slug + '" /></li>';
		html += liElement;
	}
	html += '</ul>';
	$('#games').html(html);
	bindGameActions();
};


$(document).ready(function(){
	$.ajax({
        url: '/games.php',
        type: 'GET'
    }).done(function(data){
    	displayGames(data);
    });

});
