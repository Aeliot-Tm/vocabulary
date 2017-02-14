/**
 * Created by Aeliot on 12.02.2017.
 */

App = window.App || {};

App.Themes = {
    isSending: false,
    addThemeBl: null,
    init: function () {
        this.addThemeBl = $('.theme-add-bl');
        $('.js-theme-add').on('click', App.Helper.Event.bind(this, this.onAdd));
        $('.theme-add-form').on('submit', App.Helper.Event.bind(this, this.onSave));
    },
    onAdd: function () {
        this.addThemeBl.addClass('show-form');
    },
    onSave: function (event) {
        event.preventDefault();
        var _this = this;
        if (!_this.isSending) {
            _this.isSending = true;

            var form = $(App.Helper.Event.getTarget(event));
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function (data) {
                    //THINK go to the theme
                    _this.renderRow(data);
                    _this.hideForm();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    App.Helper.Message.error(errorThrown);
                },
                complete: function () {
                    _this.isSending = false;
                }
            });
        }
    },
    renderRow: function (data) {
        var ractive = new Ractive({
            // We could pass in a string, but for the sake of convenience
            // we're passing the ID of the <script> tag above.
            template: '#theme-row-tpl',
            // Here, we're passing in some initial data
            data: data.theme
        });

        $('.themes-tbody').append(ractive.toHTML());
    },
    clearForm: function () {
        this.addThemeBl.find('[name="title"]').val('');
    },
    hideForm: function () {
        this.addThemeBl.removeClass('show-form');
        this.clearForm();
    }
};
