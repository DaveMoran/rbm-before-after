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
                },
                {
                  type: 'button',
                  text: 'Add Images',
                  name: 'images',
                  onclick: function(event){
                    event.preventDefault();

                    frame = wp.media({
                      title: "Select an image",
                      button: {
                        text: "Use Images"
                      },
                      multiple: true
                    });

                    frame.on( 'select', function() {
                      var attachment = frame.state().get('selection').toJSON();
                      var imageIds = new Array();
                      for(let i = 0; i < attachment.length; i++){
                        imageIds.push(attachment[i].id)
                      }
                      console.log(imageIds);
                      jQuery("#image-ids").val(imageIds);
                    });

                    frame.open();
                  }
                },
                {
                  type: 'textbox',
                  name: 'imageIds',
                  id: 'image-ids',
                  label: 'Image IDs'
                }
              ],
              onsubmit: function(e) {
                editor.insertContent('[rbm-gallery title="' + e.data.title + '" columns="' + e.data.columns + '" thumbnail="' + e.data.thumbnail + '" photos="' + e.data.imageIds + '"]');
              }
            })
          }
        }
      ]
    });
  });
})();
