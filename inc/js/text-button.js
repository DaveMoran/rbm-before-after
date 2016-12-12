(function() {
  tinymce.PluginManager.add('rbm_tc_button', function( editor, url) {
    editor.addButton('rbm_tc_button', {
      text: "",
      type: "menubutton",
      icon: 'wp_code',
      menu: [
        {
          text: "RBM Gallery",
          value: '[rbm-gallery photos="" title="" thumbnail="thumbnail" columns="2"]',
          onclick: function() {
            editor.insertContent(this.value());
          }
        }
      ]
    });
  });
})();
