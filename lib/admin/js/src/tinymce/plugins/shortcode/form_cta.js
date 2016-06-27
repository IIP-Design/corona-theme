

var form_cta = Object.create( window[ 'form_base' ] );

form_cta.getFields = function ( data ) {
    var fields =  [
        {
            type: 'container',
            layout: 'flex',
            items: [
                {
                    type: 'button',
                    text: 'Select image',
                    onclick: function() {
                        window.mb = window.mb || {};

                        window.mb.frame = wp.media({
                            frame: 'post',
                            state: 'insert',
                            library : {
                                type : 'image'
                            },
                            multiple: false
                        });

                        window.mb.frame.on('insert', function() {
                            var json = window.mb.frame.state().get('selection').first().toJSON();

                            if (0 > jQuery.trim(json.url.length)) {
                                return;
                            }

                            jQuery('#image_id').val(json.id);
                        });

                        window.mb.frame.open(); 
                    }
                },
                {
                    type: 'textbox',
                    name: 'image_id',
                    label: 'Image ID',
                    id: 'image_id',
                    value: '',
                    style: 'width: 60px; margin-left: 15px'
                }
            ]
        },
        {
            type: 'textbox', 
            name: 'text', 
            label: 'Text'
        },
        {
            type: 'checkbox',
            name: 'button', 
            label: 'Show button'
        },
        {
            type: 'textbox',
            name: 'button_link', 
            label: 'Button link'
        },
        {
            type: 'textbox',
            name: 'button_label', 
            label: 'Button label'
        }
    ] 

    return fields;
 };

