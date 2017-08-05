var Backbone = require('backbone'),
  Model = require('../models/statusModel'),
  StatusCollection;

StatusCollection = Backbone.Collection.extend({
  model: Model,

  url: '/eqp/public/api/status',

  headers: ['Name', 'Description', 'Image Path', 'Text Color', 'Default Healthy Status'],

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
      editLabel: 'Enter a description for item:',
      type: 'text',
      defaultValue: '',
      placeholderText: 'Enter new description',
      required: false
    },

    {
      key: 'image_path',
      editLabel: 'Enter a relative image path for display icon:',
      type: 'text',
      defaultValue: '',
      placeholderText: 'Enter image path',
      required: false
    },

    {
      key: 'color',
      editLabel: 'Enter text color for item:',
      type: 'text',
      defaultValue: '',
      placeholderText: 'Enter text color',
      required: false
    },

    {
      key: 'is_default',
      editLabel: 'Is default healthy status?*:',
      type: 'checkbox',
      defaultValue: '',
      placeholderText: 'Set default healthy status',
      required: true
    }
  ]
});

module.exports = StatusCollection;