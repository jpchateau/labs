App.Router.map(function() {
  this.route("player", { path: "/player" });
  this.route("config", { path: "/config" });
});


var Player = App.Player.create();

App.PlayerRoute = Ember.Route.extend({
    model: function() {
        Player.init();
    }
});