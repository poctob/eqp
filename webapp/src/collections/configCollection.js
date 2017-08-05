var Backbone = require('backbone'),
  Config = require('../models/configModel'),
  ConfigCollection;

ConfigCollection = Backbone.Collection.extend({
  model: Config,

  url: '/eqp/public/api/config',

  headers: ['Key', 'Value'],

  layoutItems: [
    {
      key: 'key',
      editLabel: 'Enter a key for item*:',
      type: 'text',
      defaultValue: '',
      placeholderText: 'Enter new key',
      required: true
    },

    {
      key: 'value',
      editLabel: 'Enter a value for item*:',
      type: 'text',
      defaultValue: '',
      placeholderText: 'Enter new value',
      required: true
    }
  ]
});

module.exports = ConfigCollection;