</div>
                @include('admin.includes.inner-footer')
        </div>
    </div>

   @include('admin.includes.popup.add-page-popup')
   @include('admin.includes.popup.feedback-popup')
     
@include('admin.includes.inner-footer')
<!-- Alert Box HTML -->
<div class="modal-main alert-box" style="display: none;">
    <div class="modal-small">
      <div class="modal-header">
        <h1><span>⚠</span>Warning</h1>
      </div>
      <div class="modal-body">
        <p class="alert-message">Modal text goes here...</p>
        <button type="button" class="alert-ok">Ok</button>
      </div>
    </div>
  </div>
<!-- Alert Box HTML -->
<script type="text/javascript">
 /* $.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 7,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pager');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
      pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
        pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
    
    }
};

$(document).ready(function(){
    
  $('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:10});
    
});*/

$(document).ready(function() {
    $('#sandbox-container input').datepicker({
    autoclose: true,
    dateFormat: 'yy-mm-dd'
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

      $('.chkSelect').click(function(){
        var isChecked = $(this).is(':checked');
        var st = $(this).attr('data-value');
        var id = $(this).attr('data-id');
         $.ajax({
            /* the route pointing to the post function */
            url: "{{ url('auth/admin/user/isactive') }}",
            type: 'POST',
            encode  : true,
            /* send the csrf-token and the input to the controller */
            // data: {_token: CSRF_TOKEN, message:$(".getinfo").val()},
            data: {action: 'change_user_status', id:id, status:st},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
                // $(".writeinfo").append(data.msg); 
                $('.modal-main.alert-box').show('slow');
                $('.alert-message').html('Status changed successfully !!!');
            }
        }); 
        /*if(isChecked)
          $('p').html('Checkbox is checked: <b>True</b>');
        else
          $('p').html('Checkbox is checked: <b>False</b>');*/
      });

      $('.alert-ok').click(function(){
         $('.modal-main.alert-box').hide('slow');
      });
    });


// File Preview on click
  $(document).ready(function(){
  $('.file-input').click(function(){
    $('#featured_image').click().change(function(){
      readURL(this);
    });
  });
});

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



// add slider privew js
  $("#uploadFile").change(function(){
     $('#image_preview').html("");
     var total_file=document.getElementById("uploadFile").files.length;
     for(var i=0;i<total_file;i++)
     {
      $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
     }
  });

  // add slider privew js
  $(document).on('click','.delete-slider', function(){
    var key = $(this).attr('data-id');
    var post_id = $(this).attr('post-id');
    alert(key);
        $.ajax({
            /* the route pointing to the post function */
            url: "{{ url('auth/admin/del/slide') }}",
            type: 'POST',
            encode  : true,
            /* send the csrf-token and the input to the controller */
            // data: {_token: CSRF_TOKEN, message:$(".getinfo").val()},
            data: {action: 'delete_slide', key:key, post_id:post_id},
            dataType: 'JSON',
            /* remind that 'data' is the response of the AjaxController */
            success: function (data) { 
               alert(data)
                // $('.modal-main.alert-box').show('slow');
                // $('.alert-message').html('Status changed successfully !!!');
            }
        }); 
  });
</script>
</body>
</html>