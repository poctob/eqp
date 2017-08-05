var Backbone = require('backbone'),
  Equipment;

Equipment = Backbone.Model.extend({

  defaults: {
    'user_assigned_id': '',
    'is_published': 0,
    'is_active': 0
  },

  getProperties: function () {
    return [
      this.get('category_id'), 
      this.get('status_id'), 
      this.get('is_published') ? 'Yes' : 'No',
      this.get('is_active') ? 'Yes' : 'No',
      this.get('user_assigned_id')];
  }

});

module.exports = Equipment;