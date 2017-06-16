define([
  'uiComponent',
  'Magento_Customer/js/customer-data',
  'ko',
], function(Component, customerData, ko) {
  'use strict';

  return Component.extend({
    data: {},

    initialize: function() {
      var riskifiedData = customerData.get('riskified-beacon');
      this.update(riskifiedData());

      return this._super();
    },

    update: function(riskifiedData) {
      _.each(riskifiedData, function(value, key) {
        if (!this.data.hasOwnProperty(key)) {
          this.data[key] = ko.observable();
        }
        this.data[key](value);
      }, this);
    },

    isEnabled: function() {
      return this.data.isEnabled();
    },
  });
});