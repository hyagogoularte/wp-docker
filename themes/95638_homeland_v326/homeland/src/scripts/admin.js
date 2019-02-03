(function($) {
  "use strict";
  
  /**
   * Custom Tabs
   */
  $(document).ready(function(){
    $('ul.mabuc-tabs li').click(function(){
      var tab_id = $(this).attr('data-tab');

      $('ul.mabuc-tabs li').removeClass('current');
      $('.mabuc-tab-content').removeClass('current');

      $(this).addClass('current');
      $("#"+tab_id).addClass('current');
    })
  });


  /**
   * Custom Avatar Image Modal
   */
  jQuery('#upload_image_button_avatar').click(function() {
    var homeland_send_attachment = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {
      var homeland_src = attachment.url;
      var homeland_size = props.size;

      if (attachment.sizes[homeland_size]) {
        homeland_src = attachment.sizes[homeland_size].url;
      }

      $("#homeland_custom_avatar").val(homeland_src);
      wp.media.editor.send.attachment = homeland_send_attachment;
    }
    wp.media.editor.open(this);
    return false;         
  });


  /**
   * Header Image Modal
   */
  jQuery('#upload_image_button_homeland_hdimage').click(function() {
    var homeland_send_attachment = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {
      var homeland_src = attachment.url;
      var homeland_size = props.size;

      if (attachment.sizes[homeland_size]) {
        homeland_src = attachment.sizes[homeland_size].url;
      }

      $("#homeland_hdimage").val(homeland_src);
      wp.media.editor.send.attachment = homeland_send_attachment;
    }
    wp.media.editor.open(this);
    return false;
  });   


  /**
   * Background Image Modal
   */
  jQuery('#upload_image_button_homeland_bgimage').click(function() {
    var homeland_send_attachment = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {
      var homeland_src = attachment.url;
      var homeland_size = props.size;

      if (attachment.sizes[homeland_size]) {
        homeland_src = attachment.sizes[homeland_size].url;
      }

      $("#homeland_bgimage").val(homeland_src);
      wp.media.editor.send.attachment = homeland_send_attachment;
    }
    wp.media.editor.open(this);
    return false;       
  });


  /**
   * Blog Post Video
   */
  jQuery('#upload_image_button_homeland_svideo').click(function() {
    var homeland_send_attachment = wp.media.editor.send.attachment;

    wp.media.editor.send.attachment = function(props, attachment) {
      $("#homeland_video").val(attachment.url);
      wp.media.editor.send.attachment = homeland_send_attachment;
    }
    wp.media.editor.open(this);
    return false;            
  }); 
    
})(jQuery);