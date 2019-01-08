   
// $(document).ready(function() {
//     $('#sandbox-container input').datepicker({
//     autoclose: true,
//     dateFormat: 'yy-mm-dd'
// });

// Close alert box 
 $('.alert-data-dismiss').click(function(){
         $('.modal-main.alert-box').removeClass('in');
         $('.modal-main.alert-box').hide('slow');
      });

$('#sandbox-container input').on('show', function(e){
    console.debug('show', e.date, $(this).data('stickyDate'));
    
    if ( e.date ) {
         $(this).data('stickyDate', e.date);
    }
    else {
         $(this).data('stickyDate', null);
    }
});

$('#sandbox-container input').on('hide', function(e){
    console.debug('hide', e.date, $(this).data('stickyDate'));
    var stickyDate = $(this).data('stickyDate');
    
    if ( !e.date && stickyDate ) {
        console.debug('restore stickyDate', stickyDate);
        $(this).datepicker('setDate', stickyDate);
        $(this).data('stickyDate', null);
    }
});

// Change User status
$(document).on('click','.chkSelect', function(){
var isChecked = $(this).is(':checked');
var st = $(this).attr('data-value');
var id = $(this).attr('data-id');
var url = $(this).attr('data-url');
 $.ajax({
    /* the route pointing to the post function */
    url: url,
    type: 'POST',
    encode  : true,
    /* send the csrf-token and the input to the controller */
    // data: {_token: CSRF_TOKEN, message:$(".getinfo").val()},
    data: {action: 'change_user_status', id:id, status:st},
    dataType: 'JSON',
    /* remind that 'data' is the response of the AjaxController */
    success: function (data) { 
        // $(".writeinfo").append(data.msg); 
        $('.modal-main.alert-box').addClass('in');
        $('.modal-main.alert-box').show('slow');
        $('.alert-message').html('<h2>Success!</h2><p>Status changed successfully !!!</p>');
    }
}); 
/*if(isChecked)
  $('p').html('Checkbox is checked: <b>True</b>');
else
  $('p').html('Checkbox is checked: <b>False</b>');*/
});

     


// Featured image File Preview on click
  jQuery(document).ready(function(){
  jQuery('.file-input').click(function(){
    jQuery('#featured_image').click().change(function(){
      readURL(this);
    });
  });
});

// Create function Featured image File Preview
//  Change src of file input privew
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('.file-input').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

// Category treeview.js
$.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        /* initialize each of the top levels */
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this);
            branch.prepend("");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        /* fire event from the dynamically added icon */
        tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        /* fire event to open branch if the li contains an anchor instead of text */
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        /* fire event to open branch if the li contains a button instead of text */
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});
/* Initialization of treeviews */
$('#tree1').treed();


// Delete slider image from tabke & folder
  $(document).on('click','.delete-slider', function(){
    var key     = $(this).attr('data-id');
    var post_id = $(this).attr('post-id');
    var url     = $(this).attr('data-url');
        $.ajax({
            /* the route pointing to the post function */
            url: url,
            type: 'POST',
            encode  : true,
            /* send the csrf-token and the input to the controller */
            // data: {_token: CSRF_TOKEN, message:$(".getinfo").val()},
            data: {action: 'delete_slide', key:key, post_id:post_id},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                if(data.success){
                  $('.modal-main.alert-box').addClass('in');
                  $('.modal-main.alert-box').show('slow');
                  $('.alert-message').html('<h2>Success!</h2><p>'+data.success+'</p>');
                  $('.postslide'+data.index).remove();
                }else{
                  $('.modal-main.alert-box').addClass('in');
                  $('.modal-main.alert-box').show('slow');
                  $('.alert-message').html('<h2>Success!</h2><p>Images not deleted Successfully !!! </p>');
                }
            }
        }); 
  });


// Upload slider image with preview & remove icon
  $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#uploadFile").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          // $("<span class=\"pip\">" +
          //   "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
          //   "<br/><span class=\"remove\">Remove image</span>" +
          //   "</span>").insertAfter("#uploadFile");
          $('<div class="postslide-item postslide pip"><div class="slide-img"><img src="'+ e.target.result +'" alt="'+ file.name + '" title="'+ file.name + '"></div><div class="slide-img-del"><span class="remove" data-url="http://localhost/test-lara/public/auth/admin/del/slide" style="cursor: pointer;">X</span></div></div>').insertAfter("#image_preview");
          $(".remove").click(function(){
            $(this).parent().parent(".pip").remove();
          });
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});