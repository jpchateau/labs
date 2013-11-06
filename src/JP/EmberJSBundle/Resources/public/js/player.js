'use strict';

App.Player = Ember.Object.extend({

    createAudioElement: function (source) {
        var audioElement = document.createElement('audio'),
            sourceElement = document.createElement('source');
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
        $('#play').click(function () {
            $audioPlayer.trigger('play');
        });
        $('#stop').click(function () {
            $audioPlayer.trigger('pause');
            $audioPlayer.prop("currentTime", 0);
        });
        $('#pause').click(function () {
            $audioPlayer.trigger('pause');
        });
        $('#volume-up').click(function () {
            var volume = $audioPlayer.prop("volume");
            if (volume < 1) {
                volume = volume + 0.1;
            }
            $audioPlayer.prop("volume", volume);
            $('#player-volume').html(volume);
        });
        $('#volume-down').click(function () {
            var volume = $audioPlayer.prop("volume");
            if (volume > 0) {
                volume = volume - 0.1;
            }
            $audioPlayer.prop("volume", volume);
            $('#player-volume').html(volume);
        });
        $('#radio-name').html(liElement.attr('data-name') + ' (' + liElement.attr('data-category') + ')');
        $('#radio-duration').html(liElement.attr('data-duration'));
    },

    bindRadioActions: function () {
        var $radios = $('.radio');
        $radios.on('click', function () {
            $radios.each(function () {
                if ($(this).hasClass('radio_selected')) {
                    $(this).removeClass('radio_selected');
                }
            });
            $('#radio-name').empty();
            $('#radio-duration').empty();
            Player.radioAction($(this));
        });
    },

    displayRadios: function (data) {
        var html = '',
            data = JSON.parse(data);
        var radios = data.data;
        if (radios.length >= 1) {
            html = '<ul>';
            var i, liElement = '';
            for (i in radios) {
                if (radios.hasOwnProperty(i)) {
                    liElement = '<li class="radio" data-category="' + radios[i].category + '" data-slug="' + radios[i].slug + '" data-name="' + radios[i].name + '" data-track="' + radios[i].track + '" data-duration="' + radios[i].duration + '"><img src="/bundles/jpemberjs/images/radios/' + radios[i].image + '" alt="' + radios[i].slug + '" /></li>';
                    html += liElement;
                }
            }
            html += '</ul>';
        } else {
            html = '<p>Pas de radio disponible</p>';
        }
        $('#radios').html(html);
        if (radios.length >= 1) {
            Player.bindRadioActions();
        }
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
        var $games = $('.game');
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
        var html = '<ul>',
            data = JSON.parse(data);
        var games = data.data,
            i,
            liElement = '';
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