(function() {
  tinymce.PluginManager.add('rbm_tc_button', function( editor, url) {
    editor.addButton('rbm_tc_button', {
      text: "My test button",
      icon: false,
      onclick: function() {
        editor.insertContent('Hello World!');
      }
    });
  });
})();
