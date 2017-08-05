var Backbone = require('backbone'),
  Model = require('../models/equipmentModel'),
  EquipmentCollection;

EquipmentCollection = Backbone.Collection.extend({
  model: Model,

  statusCollection: null,

  categoryCollection: null,

  selectOptions: {},

  populateReferences: function() {
    var statusOptions = [],
        categoryOptions = [];

    if(this.statusCollection !== null) {
      this.statusCollection.each( function(status){
        statusOptions.push({
          value: status.get('id'),
          label: status.get('name')
        });
      });
    }

    this.selectOptions.status_id = statusOptions;

    if(this.categoryCollection !== null) {
      this.categoryCollection.each( function(category){
        categoryOptions.push({
          value: category.get('id'),
          label: category.get('name')
        });
      });
    }

    this.selectOptions.category_id = categoryOptions;
  },

  url: '/eqp/public/api/equipment',

  headers: ['Category', 'Status', 'Is Published?', 'Is Active?', 'User Assigned Id'],

  layoutItems: [
    {
      key: 'category_id',
      editLabel: 'Select category*:',
      type: 'select',
      defaultValue: '',
      placeholderText: 'Select category',
      required: true
    },

    {
      key: 'status_id',
      editLabel: 'Select status*:',
      type: 'select',
      defaultValue: '',
      placeholderText: 'Select status',
      required: true
    },

    {
      key: 'is_published',
      editLabel: 'Is published?*:',
      type: 'checkbox',
      defaultValue: '',
      placeholderText: 'Set published status',
      required: true
    },

    {
      key: 'is_active',
      editLabel: 'Is_active?*:',
      type: 'checkbox',
      defaultValue: '',
      placeholderText: 'Set active status',
      required: true
    },

    {
      key: 'user_assigned_id',
      editLabel: 'Enter user assigned id:',
      type: 'text',
      defaultValue: '',
      placeholderText: 'User assigned id',
      required: false
    }    
  ]
});

module.exports = EquipmentCollection;