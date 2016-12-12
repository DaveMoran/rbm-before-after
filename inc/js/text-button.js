(function() {
  tinymce.PluginManager.add('rbm_tc_button', function( editor, url) {
    editor.addButton('rbm_tc_button', {
      text: "",
      type: "menubutton",
      icon: 'wp_code',
      menu: [
        {
          text: "RBM Gallery",
          onclick: function() {
            editor.windowManager.open( {
              title: 'Insert RBM Gallery',
              body: [
                {
                  type: 'textbox',
                  name: 'title',
                  label: 'Your Title'
                },
                {
                  type: "textbox",
                  name: "columns",
                  label: "Columns"
                },
                {
                  type: 'listbox',
                  name: 'thumbnail',
                  label: 'Thumbnail Size',
                  'values': [
                    {text: 'Thumbnail', value: 'thumbnail'},
                    {text: 'Medium', value: 'medium'},
                    {text: 'Large', value: 'large'},
                  ]
                }
              ],
              onsubmit: function(e) {
                editor.insertContent('[rbm-gallery title="' + e.data.title + '" columns="' + e.data.columns + '" thumbnail="' + e.data.thumbnail + '" photos=""]');
              }
            })
          }
        }
      ]
    });
  });
})();
