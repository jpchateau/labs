<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GTA Music Radio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/bundles/jpemberjs/css/normalize.css">
        <link rel="stylesheet" href="/bundles/jpemberjs/css/main.css">
    </head>
    <body>

        <header>
        	<h1>GTA Music Radio</h1>
        </header>

        <script type="text/x-handlebars">
        <div class="navigation">
          <ul class="nav">
            <li>{{#link-to 'player'}}Player{{/link-to}}</li>
            <li>{{#link-to 'config'}}Config{{/link-to}}</li>
          </ul>
        </div>

        <div id="content">
          {{outlet}}
        </div>
        </script>

		<script type="text/x-handlebars" id="config">
        <div class="config">
        <p>Paramètres du player</p>
        </div>
        </script>

        <script type="text/x-handlebars" id="player">
            <div id="games">
        		<p>Récupération de la liste des jeux en cours...</p>
        	</div>

        	<div id="radios">
        		<p>Veuillez sélectionner un jeu</p>
        	</div>

        	<div id="radio_data">
        		<p>Veuillez sélectionner une radio</p>
        		<audio controls>
	        	<source src="/bundles/jpemberjs/audio/flashback-fm.mp3" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
        	</div>
        </script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/bundles/jpemberjs/js/vendor/jquery-1.10.2.min.js"><\/script>');</script>

        <script src="/bundles/jpemberjs/js/vendor/handlebars.js"></script>
        <script src="/bundles/jpemberjs/js/vendor/ember.js"></script>

        <script src="/bundles/jpemberjs/js/app.js"></script>

        <!-- <script src="{{ asset('bundles/jpemberjs/js/main.js') }}"></script>-->

    </body>
</html>