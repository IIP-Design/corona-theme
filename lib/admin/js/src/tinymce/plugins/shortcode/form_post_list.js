/**
    @todo: Add the following fields:
    1. Show byline
    2. Post meta data (byline)
    {
        type: 'checkbox',
        name: 'show_byline', 
        label: 'Show byline:'
    },
    {
        type: 'textbox',
        label: 'Post info to show:',
        name: 'post_info' // only allow numbers
    }
 */


var $ = tinymce.dom.DomQuery;  // tinymce jQuery implementation

var form_post_list = Object.create( window[ 'form_base' ] );

form_post_list.height =  430;
form_post_list.action = "fetch_data_post_list";

form_post_list.getFields = function ( data ) {
    var self = this;  // need to use bind not tself

    var fields = [ 
        { 
            type: 'form',
            padding: 0,
            items: [
                {
                    type: 'listbox', 
                    'values': this.getCategories( data.categories ),
                    label: 'Category;',
                    name: 'posts_cat',
                    text: 'All Categories'
                },
                {
                    type: 'textbox', 
                    label: 'Number of posts to show:',
                    name: 'posts_num', 
                    maxWidth: 70,
                    onPostRender: function (e) {
                        self.numbersOnly( e.target );
                    } 
                },
                {
                    type: 'checkbox',
                    name: 'show_image', 
                    label: 'Show image:'
                },
                {
                    type: 'listbox', 
                    id: 'image_size',
                    text: '',
                    'values': this.getImageSizes( data.image_sizes ),
                    label: 'Image size:',
                    name: 'image_size'
                },
                { 
                    type: 'listbox', 
                    text: 'Center',
                    'values': this.getImageAlignment(),
                    label: 'Image alignment:',
                    name: 'image_alignment'
                },
                {
                    type: 'listbox', 
                    text: 'Standard',
                    'values': this.getPostFormats( data.post_formats[0] ),
                    label: 'Post format:',
                    name: 'post_format'
                },
                {
                    type: 'checkbox',
                    name: 'show_title', 
                    label: 'Show post title:'
                },
                {
                    type: 'listbox', // should be displayed when show image is checked 
                    text: 'Excerpt',
                    'values': this.getContentFormat(),
                    label: 'Content to show:',
                    name: 'show_content'
                },
                {
                    type: 'textbox',
                    label: 'Number of words:',
                    maxWidth: 70,
                    name: 'content_limit',
                    onPostRender: function (e) {
                        self.numbersOnly( e.target );
                    }
                },
                {
                    type: 'checkbox',
                    name: 'more_text_from_post', 
                    label: 'Show more text link:'
                },
                {
                    type: 'textbox',
                    label: 'More text:',
                    name: 'more_text'
                }
            ]
        }
    ];

    return fields;
};

form_post_list.numbersOnly = function ( obj ) {
    var el =  obj.getEl();
    $(el).attr( 'type', 'number' ); 
    $(el).attr( 'min', '0' );
};


form_post_list.getImageAlignment = function () {
    return  [
        {text: 'Center', value:'center'},
        {text: 'Left', value:'left'},
        {text: 'Right', value:'right'}
    ]
};

form_post_list.getContentFormat =  function () {
    return  [
        {text: 'Excerpt', value:'excerpt'},
        {text: 'Content', value:'content'},
        {text: 'Content with word limit', value:'content-limit'}
    ]
};

form_post_list.getImageSizes = function ( data ) {
    var result = _.map( data, function( obj, index ) {
        return { 
            text: index += ( obj.width && obj.height ) ? ' (' + obj.width + ' x ' + obj.height + ')' : '',
            value: index
        }
    });

    return result;
};

form_post_list.getPostFormats = function( data ) {
    var result = _.map( data, function( str ) { 
        return { 
            text: str.charAt(0).toUpperCase() + str.substr(1),  
            value: str
        }
    });

    result.unshift({
        text: 'Standard',
        value: 'standard'
    })

    return result;
};

form_post_list.getCategories = function ( data ) {
    var result = _.map( data, function( obj ) { 
        return { 
            text: _.unescape(obj.cat_name), 
            value: obj.cat_ID
        }
    });

    result.unshift({
        text: 'All Categories',
        value: 'all'
    })

    return result;
};
   
