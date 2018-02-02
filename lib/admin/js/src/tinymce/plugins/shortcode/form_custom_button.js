var form_custom_button = Object.create( window[ 'form_base' ]);

form_custom_button.height =  250;

form_custom_button.getFields = function( data ) {
	var fields = [
		{
			type: 'textbox',
			name: 'btn_label',
			label: 'Button Text',
			value: ''
		},
		{
			type: 'textbox',
			name: 'btn_link',
			label: 'Button URL',
			placeholder: 'Enter full URL (including http/https)',
			value: ''
		},
		{
			type: 'checkbox',
			name: 'btn_tab',
			label: 'Open link in new tab?',
			checked: true
		},
		{
			type: 'listbox',
			text: 'Button Color',
			name: 'btn_color',
			values: [
				{ text: 'Dark Blue', value: '#10557e' },
				{ text: 'Medium Blue', value: '#0079af' },
				{ text: 'Light Blue', value: '#4191bf' },
				{ text: 'Yellow', value: '#ffcc00' },
				{ text: 'Light Grey', value: '#cccccc' },
				{ text: 'Red', value: '#ba1e2c' }
			]
		},
		{
			type: 'listbox',
			text: 'Button Size',
			name: 'btn_size',
			values: [
				{ text: 'Large', value: 'large' },
				{ text: 'Small', value: 'small' },
			]
		},
		{
			type: 'listbox',
			text: 'Button Alignment',
			name: 'btn_align',
			values: [
				{ text: 'Left', value: 'left' },
				{ text: 'Center', value: 'center' },
				{ text: 'Right', value: 'right' }
			]
		}
	]

	return fields;
};
