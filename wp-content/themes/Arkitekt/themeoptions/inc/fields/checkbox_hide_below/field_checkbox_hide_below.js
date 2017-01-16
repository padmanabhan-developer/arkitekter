/**
 * Redux checkbox_hide_below
 * Dependencies        : jquery
 * Feature added by    : Dovy Paukstys
 * Date                : 17 June 2014
 */

/*global redux_change, wp, redux*/

(function( $ ) {
    "use strict";

    redux.field_objects = redux.field_objects || {};
    redux.field_objects.checkbox_hide_below = redux.field_objects.checkbox_hide_below || {};

    $( document ).ready(
        function() {
            //redux.field_objects.checkbox_hide_below.init();
        }
    );

    redux.field_objects.checkbox_hide_below.init = function( selector ) {
        if ( !selector ) {
            selector = $( document ).find( ".redux-group-tab:visible" ).find( '.redux-container-checkbox_hide_below:visible' );
        }

        $( selector ).each(
            function() {
                var el = $( this );
                var parent = el;
                if ( !el.hasClass( 'redux-field-container' ) ) {
                    parent = el.parents( '.redux-field-container:first' );
                }
                if ( parent.is( ":hidden" ) ) { // Skip hidden fields
                    return;
                }
                if ( parent.hasClass( 'redux-field-init' ) ) {
                    parent.removeClass( 'redux-field-init' );
                } else {
                    return;
                }
                el.find('.redux-opts-checkbox-hide-below' ).each(function(){
                
           var amount = $(this).data('amount');
           if(!$(this).is(':checked')){
			$(this).closest('tr').nextAll('tr').slice(0,amount).hide();
		}
                
            });
            
            el.find(".redux-opts-checkbox-hide-below").on("click",function(b){
                
                var amount = $(this).data('amount');
		$(this).closest('tr').nextAll('tr').slice(0,amount).fadeToggle('slow');
            
            
            });
            
            
            }
        );
    };
})( jQuery );
