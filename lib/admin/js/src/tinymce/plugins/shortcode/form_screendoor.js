var form_screendoor = Object.create( window[ 'form_base' ]);

form_screendoor.height =  150;

form_screendoor.getFields = function( data ) {
	var fields = [
		{
			type: 'textbox',
			name: 'embed',
			label: 'Embed Token',
			value: ''
		},
		{
			type: 'textbox',
			name: 'project',
			label: 'Project ID',
			value: ''
		},
    {
			type: 'listbox',
			name: 'autosend',
			label: 'Autosend',
      values: [
				{ text: 'Yes', value: '1' },
				{ text: 'No', value: '0' }
      ]
		}
	]

	return fields;
};
