App.Player = Ember.Object.extend({

    createAudioElement: function (source) {
        var audioElement = document.createElement('audio');
        var sourceElement = document.createElement('source');
        sourceElement.src = '/bundles/jpemberjs/audio/' + source;
        sourceElement.type = 'audio/mpeg';
        audioElement.appendChild(sourceElement);
        return audioElement;
    },

    radioAction: function (liElement) {
        liElement.addClass('radio_selected');
        var $radioData = $('#radio_data');
        $radioData.empty();
        $radioData.append(Player.createAudioElement(liElement.attr('data-track')));
        var $audioPlayer = $('audio');
        $audioPlayer.trigger('load');
        $audioPlayer.trigger('play');
        $radioData.append('<button id="stop">Stop</button>');
        $radioData.append('<button id="pause">Pause</button>');
        $radioData.append('<button id="play">Play</button>');
        $('#stop').click(function () {
            $audioPlayer.trigger('pause');
            $audioPlayer.prop("currentTime", 0);
        });
        $('#pause').click(function () {
            $audioPlayer.trigger('pause');
        });
        $('#play').click(function () {
            $audioPlayer.trigger('play');
        });
        $radioData.append('<p>Now playing ' + liElement.attr('data-name') + '</p>');
    },

    bindRadioActions: function () {
        var $radios = $('.radio');
        $radios.on('click', function () {
            $radios.each(function () {
                if ($(this).hasClass('radio_selected')) {
                    $(this).removeClass('radio_selected');
                }
            });
            Player.radioAction($(this));
        });
    },

    displayRadios: function (data) {
        var html = '';
        html = '<ul>';
        var data = JSON.parse(data);
        var radios = data.data;
        var i;
        var liElement = '';
        for (i in radios) {
            if (radios.hasOwnProperty(i)) {
            liElement = '<li class="radio" data-slug="' + radios[i].slug + '" data-name="' + radios[i].name + '" data-track="' + radios[i].track + '"><img src="/bundles/jpemberjs/images/radios/' + radios[i].image + '" alt="' + radios[i].slug + '" /></li>';
            html += liElement;
            }
        }
        html += '</ul>';
        $('#radios').html(html);
        Player.bindRadioActions();
    },

    getRadiosFromGame: function (game) {
        $.ajax({
            url: '/gta/game/' + game,
            type: 'GET'
        }).done(function (data) {
            Player.displayRadios(data);
        });
    },

    gameAction: function (liElement) {
        liElement.addClass('game_selected');
        Player.getRadiosFromGame(liElement.attr('data-slug'));
    },

    bindGameActions: function () {
        $games = $('.game');
        $games.on('click', function () {
            $games.each(function () {
                if ($(this).hasClass('game_selected')) {
                    $(this).removeClass('game_selected');
                }
            });
            $('#radios').html('<p>Récupération de la liste des radios en cours...</p>');
            Player.gameAction($(this));
        });
    },

    displayGames: function (data) {
        var html = '';
        html = '<ul>';
        var data = JSON.parse(data);
        var games = data.data;
        var i;
        var liElement = '';
        for (i in games) {
            if (games.hasOwnProperty(i)) {
                liElement = '<li class="game" data-slug="' + games[i].slug + '"><img src="/bundles/jpemberjs/images/games/' + games[i].image + '" alt="' + games[i].slug + '" /></li>';
                html += liElement;
            }
        }
        html += '</ul>';
        $('#games').html(html);
        Player.bindGameActions();
    },

    init: function () {
        $.ajax({
            url: '/gta/games',
            type: 'GET'
        }).done(function (data) {
            Player.displayGames(data);
        });
    }

});