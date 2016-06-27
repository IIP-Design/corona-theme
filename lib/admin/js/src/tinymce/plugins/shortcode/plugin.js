/**
 * plugin.js
 *
 */
(function ($) { 
    
    tinymce.PluginManager.add('corona_shortcode_btns', function ( editor ) { 
      
        function getShortcodeName ( e ) { 
            var shortcodeName = {};
            if( e.control && e.control.state ) {
                shortcodeName = e.control.state.data;
            }

            return shortcodeName;
        }

        // menu is written in the footer via php
        function getListofMenuItemsWrittenIntoFooter() {
            var shList = [];
            $.each( menu, function(i)  {
                shList.push({text: menu[i], value:i});
            });

            return shList;
        }

        function openShortcodeDialogue( e ) {
            var scn =  getShortcodeName ( e );
            
            var form = Object.create( window['form_' + scn.value]);
            form.shortcodeName = scn;
            form.editor = editor;
            form.open();
        }


        // TODO - Make shortcode editable by clicking an image or link
        // //replace from shortcode to an image placeholder
        //  editor.on('BeforeSetcontent', function( evt ){
        //       console.debug( 'BeforeSetcontent ' + evt.content )
        //  });
    
        //  //replace from image placeholder to shortcode
        //  editor.on('GetContent', function( evt ){
        //      console.debug( 'GetContent ' + evt.content )
        //  });
        

        editor.addButton( 'corona_shortcode_btns', {
            type: 'listbox',
            text: 'Add Shortcode',
            values: getListofMenuItemsWrittenIntoFooter(),
            onselect: function ( e ) {
                openShortcodeDialogue( e );
            } 
        });

    });

})(jQuery);
