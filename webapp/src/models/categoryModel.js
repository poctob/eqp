var Backbone = require('backbone'),
  Category;

Category = Backbone.Model.extend({

 defaults: {
   'ispublic': 0
 },

 getProperties: function () {
    return [
      this.get('name'), 
      this.get('description'), 
      this.get('ispublic') ? 'Yes' : 'No', 
      this.get('notes')];
  }
});

module.exports = Category;