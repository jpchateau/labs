var displayRadios = function(data) {
	var html = '';
	html = '<ul>';
	data = JSON.parse(data);
    var radios = data.data;
    var i;
	for (i in radios) {
		var liElement = '';
		liElement = '<li class="radio" data-slug="' + radios[i].slug + '"><img src="/bundles/jpemberjs/images/radios/' + radios[i].image + '" alt="' + radios[i].slug + '" /></li>';
		html += liElement;
	}
	html += '</ul>';
	$('#radios').html(html);
};

var getRadiosFromGame = function(game) {
	$.ajax({
        url: '/gta/game/' + game,
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
	data = JSON.parse(data);
	var games = data.data;
	var i;
	for (i in games) {
		var liElement = '';
		liElement = '<li class="game" data-slug="' + games[i].slug + '"><img src="/bundles/jpemberjs/images/games/' + games[i].image + '" alt="' + games[i].slug + '" /></li>';
		html += liElement;
	}
	html += '</ul>';
	$('#games').html(html);
	bindGameActions();
};


$(document).ready(function(){
	$.ajax({
        url: '/gta/games',
        type: 'GET'
    }).done(function(data){
    	displayGames(data);
    });

});
