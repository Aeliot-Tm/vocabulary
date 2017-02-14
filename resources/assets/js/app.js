/**
 * Created by Aeliot on 11.02.2017.
 */

$(document).ready(function () {
    var body = $('body');

    App.Helper.Message.init();

    console.log(body.hasClass('themes'), body.hasClass('words'));//DELETE

    if (body.hasClass('themes')) {
        App.Themes.init();
    } else if (body.hasClass('words')) {
        App.Words.init();
    }
});