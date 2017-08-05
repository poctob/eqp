var Backbone = require('backbone'),
  Config;

Config = Backbone.Model.extend({

  getProperties: function () {
    return [this.get('key'), this.get('value')];
  }
});

module.exports = Config;