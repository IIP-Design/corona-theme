var form_course = Object.create( window[ 'form_base' ]);

form_course.height =  155;

form_course.getFields = function( data ) {
	var fields = [
		{
			type: 'textbox',
			name: 'id',
			label: 'Course ID',
			value: ''
		},
		{
			type: 'textbox',
			name: 'exit_page',
			label: 'Exit Page',
			placeholder: 'Enter the slug - Ex: /exit-page',
			value: ''
		},
		{
			type: 'listbox',
      label: 'Course Language',
			text: 'Select',
			name: 'language',
			values: [
				{ text: 'English', value: 'en' },
				{ text: 'French', value: 'fr' },
				{ text: 'Portuguese', value: 'pt' },
				{ text: 'Spanish', value: 'es' }
			]
		}
	]

	return fields;
};
