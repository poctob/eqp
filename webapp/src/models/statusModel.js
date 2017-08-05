var Backbone = require('backbone'),
  Status;

Status = Backbone.Model.extend({

  defaults: {
    'description': '',
    'image_path': '',
    'color': '',
    'is_default': 0
  },

  getProperties: function () {
    return [
      this.get('name'), 
      this.get('description'), 
      this.get('image_path'),
      this.get('color'),
      this.get('is_default') ? 'Yes' : 'No'];
  }
});

module.exports = Status;