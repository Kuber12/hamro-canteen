
$(document).ready(function() {
  //For Popup
  $(".action-button").click(function(a) {
    // create blocker element
    const blocker = $("<div id='popup-blocker'></div>");

    // append blocker to body
    $("body").append(blocker);

    $("#popup-container").show();

    $("#popup-blocker").click(function(){
      $("#popup-container").hide();
      $("#popup-blocker").remove();
    })
  });

  // Image upload
  const dropArea = $('#image-upload-container');
  const imageInput = $('#image-input');
  const preview = $('#preview');
  const dragToUpload = $('#drag-drop-text');

  // Prevent default drag behaviors
  dropArea.on('dragenter dragover dragleave drop', function(e) {
    e.preventDefault();
    e.stopPropagation();
  });

  // Highlight drop area when dragging over it
  dropArea.on('dragenter dragover', function() {
    dropArea.addClass('highlight');
  });

  dropArea.on('dragleave drop', function() {
    dropArea.removeClass('highlight');
  });

  // Handle dropped files
  dropArea.on('drop', function(e) {
    const file = e.originalEvent.dataTransfer.files[0];
    handleFile(file);
  });
  dropArea.on('click',function(){
    imageInput.trigger('click');
  })

  // Handle file input change
  imageInput.on('change', function(e) {
    const file = e.target.files[0];
    handleFile(file); 
    dragToUpload.hide();  
  });

  function handleFile(file) {
    if (!file.type.startsWith('image/')) {
      alert('Only image files are allowed');
      return;
    }

    preview.empty();

    const img = $('<img>', {
      class: 'obj',
      style: 'max-width: 100%; max-height: 100%',
      src: URL.createObjectURL(file),
      on: {
        load: function() {
          URL.revokeObjectURL(this.src);
        }
      }
    });

    preview.append(img);

  }

  // For Form checkbox ticks
  days = $('.day');
  daysInput = $('.day-input');
  days.on('click',function(){
    $(this).toggleClass("selected-day");
    if($(this).find('input').is(':checked')){
      $(this).find('input').prop('checked', false);
    }else{
      $(this).find('input').prop('checked', true);
    }
  })
});
