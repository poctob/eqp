var Backbone = require('backbone'),
  Model = require('../models/categoryModel'),
  CategoryCollection;

CategoryCollection = Backbone.Collection.extend({
  model: Model,

  url: 'eqp/public/api/category',

  headers: ['Name', 'Description', 'Is Public', 'Notes'],

  layoutItems: [
    {
      key: 'name',
      editLabel: 'Enter a name for item*:',
      type: 'text',
      defaultValue: '',
      placeholderText: 'Enter new name',
      required: true
    },

    {
      key: 'description',
      editLabel: 'Enter a description for item*:',
      type: 'text',
      defaultValue: '',
      placeholderText: 'Enter new description',
      required: true
    },

    {
      key: 'ispublic',
      editLabel: 'Is visible to public?*:',
      type: 'checkbox',
      defaultValue: '',
      placeholderText: 'Set visibility',
      required: true
    },

    {
      key: 'notes',
      editLabel: 'Enter notes for the item*:',
      type: 'textarea',
      defaultValue: '',
      placeholderText: 'Enter notes',
      required: false
    }
  ]
});

module.exports = CategoryCollection;