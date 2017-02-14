/**
 * Created by Aeliot on 12.02.2017.
 */

App = window.App || {};
App.Helper = App.Helper || {};

App.Helper.Event = {
    bind: function (context, func) {
        return function () {
            func.apply(context, arguments);
        };
    },
    getTarget: function (event) {
        return event.currentTarget || event.target || event.srcElement;
    }
};