/**
 * Created by Aeliot on 12.02.2017.
 */

App = window.App || {};

App.Words = {
    words: [],
    init: function () {
        var _this = this;
        //TODO use request to load words
        _this.words = window._words;
        var Words = _this.getWordsHandler();
        var list = new Words({
            el: '#words',
            data: {items: _this.words}
        });
    },
    getWordsHandler: function () {
        return Ractive.extend({
            template: '#words-tpl'

            // // Add the 'item' partial here
            // partials: {},
            //
            // addItem: function ( description ) {
            //     this.push( 'items', {
            //         description: description,
            //         done: false
            //     });
            // },
            //
            // removeItem: function ( index ) {
            //     this.splice( 'items', index, 1 );
            // },
            //
            // editItem: function ( index ) {
            //     var self = this, keydownHandler, blurHandler, input, currentDescription;
            //
            //     currentDescription = this.get( 'items.' + index + '.description' );
            //     this.set( 'items.' + index + '.editing', true );
            //
            //     input = this.find( '.edit' );
            //     input.select();
            //
            //     window.addEventListener( 'keydown', keydownHandler = function ( event ) {
            //         switch ( event.which ) {
            //             case 13: // ENTER
            //                 input.blur();
            //                 break;
            //
            //             case 27: // ESCAPE
            //                 input.value = currentDescription;
            //                 self.set( 'items.' + index + '.description', currentDescription );
            //                 input.blur();
            //                 break;
            //
            //             case 9: // TAB
            //                 event.preventDefault();
            //                 input.blur();
            //                 self.editItem( ( index + 1 ) % self.get( 'items' ).length );
            //                 break;
            //         }
            //     });
            //
            //     input.addEventListener( 'blur', blurHandler = function () {
            //         window.removeEventListener( 'keydown', keydownHandler );
            //         input.removeEventListener( 'blur', blurHandler );
            //     });
            //
            //     this.set( 'items.' + index + '.editing', true );
            // },
            //
            // oninit: function ( options ) {
            //     // proxy event handlers
            //     this.on({
            //         remove: function ( event ) {
            //             this.removeItem( event.index.i );
            //         },
            //         newTodo: function ( event ) {
            //             this.addItem( event.node.value );
            //             event.node.value = '';
            //             setTimeout( function () {
            //                 event.node.focus();
            //             }, 0 );
            //         },
            //         edit: function ( event ) {
            //             this.editItem( event.index.i );
            //         },
            //         stop_editing: function ( event ) {
            //             this.set( event.keypath + '.editing', false );
            //         },
            //         blur: function ( event ) {
            //             event.node.blur();
            //         }
            //     });
            // },
            //
            // // sadly this is necessary for IE - other browsers fire the change event
            // // when you hit enter
            // events: {
            //     enter: function ( node, fire ) {
            //         var keydownHandler = function ( event ) {
            //             var which = event.which || event.keyCode;
            //             if ( which === 13 ) {
            //                 fire({ node: node, original: event });
            //             }
            //         };
            //
            //         node.addEventListener( 'keydown', keydownHandler );
            //
            //         return {
            //             teardown: function () {
            //                 node.removeEventListener( 'keydown', keydownHandler );
            //             }
            //         };
            //     }
            // }
        });
    }
};
