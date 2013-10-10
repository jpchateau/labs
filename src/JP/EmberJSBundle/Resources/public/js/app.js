App = Ember.Application.create();

App.Router.map(function() {
  this.route("player", { path: "/player" });
  this.route("config", { path: "/config" });
});

App.PlayerRoute = Ember.Route.extend({
    connectOutlets: function(){
        alert('ok');
    }
});
