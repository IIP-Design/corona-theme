(function($) {

    tinymce.PluginManager.add('coronashortcodes', function( editor ) {
        var shortcodeValues = [];
        $.each( shortcodes_button, function(i)  {
            shortcodeValues.push({text: shortcodes_button[i], value:i});
        });

        editor.addButton('coronashortcodes', {
            type: 'listbox',
            text: 'Shortcodes',
            onselect: function(e) {
                var v = e.control.state.data.value;   // Need to reference/check the api to ensure that correct property is being used
                var content = '';
                var cls = ( v == 'post-list' ) ? 'tbl-container' : 'cta-container';
                var div = '<div class="' + cls + '">';

                var dialogForm = div;
                if( shortcodes_form[v] != undefined ) {

                    dialogForm += shortcodes_form[v];
                    if( dialogForm != div ) {
                        dialogForm += '</div>';
                        $('.shortcode-dialog-form').empty();
                        $('.shortcode-dialog-form').append( dialogForm );

                        $("#shortcode-dialog").dialog({
                            width: 400,
                            resizable: false,
                            buttons: {
                                "Add Shortcode": function() {
                                    var formArray = $('.shortcode-dialog-form').serializeArray();

                                    if(formArray.length > 0) {
                                        content = '[' + v + ' ';
                                        $(formArray).each(function(i){
                                      
                                        	if( $(this)[0].value ) {  
                                        		content += $(this)[0].name + '="'+ $(this)[0].value +'" ';
                                        	}
                                        });

                                        content += '][/'+v+']';
                                    }

                                    tinyMCE.activeEditor.selection.setContent( content );
                                    $( this ).dialog( "close" );
                                }
                            }
                        });
                    }
                } else {
                    tinyMCE.activeEditor.selection.setContent( '[' + v + '][/' + v + ']' );
                }
            },
            values: shortcodeValues
        });
    });

})(jQuery);
