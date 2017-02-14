/**
 * Created by Aeliot on 13.02.2017.
 */

App = window.App || {};
App.Helper = App.Helper || {};

App.Helper.Message = {
    init: function () {
        //TODO implement
    },
    error: function (message) {
        this.show({message: message, priority: 'danger'});
    },
    info: function (message) {
        this.show({message: message, priority: 'info'});
    },
    success: function (message) {
        this.show({message: message, priority: 'success'});
    },
    show: function (data) {
        //TODO implement
        console.warn('Messaging is not implemented yet');
    }
};