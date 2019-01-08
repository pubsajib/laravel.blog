tinymce.init({
	selector: 'textarea',
	branding: false,
	menubar : false,
	statusbar: false,
	plugins: [ 'autosave', 'lists', 'autolink', 'link', 'image','code' ],
	toolbar: 'undo redo | styleselect | bold italic | link unlink image | alignleft aligncenter alignright outdent indent | bullist numlist | code',
});