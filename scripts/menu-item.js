function displayPopUp(){
  // create blocker element
  if(!$('#popup-blocker').length){
    const blocker = $("<div id='popup-blocker'></div>");
    $("body").append(blocker);
  }else{
    $('#popup-blocker').show();
  }
  // append blocker to body
  $("#popup-container").show();
  $("#popup-blocker").click(function(){
    $("#popup-container").hide();
    $("#popup-blocker").remove();
  })

  if($('input[name="avlbl-sun"]').prop('checked')){$(days[0]).addClass("selected-day")}else{$(days[0]).removeClass("selected-day")};
  if($('input[name="avlbl-mon"]').prop('checked')){$(days[1]).addClass("selected-day")}else{$(days[1]).removeClass("selected-day")};
  if($('input[name="avlbl-tue"]').prop('checked')){$(days[2]).addClass("selected-day")}else{$(days[2]).removeClass("selected-day")};
  if($('input[name="avlbl-wed"]').prop('checked')){$(days[3]).addClass("selected-day")}else{$(days[3]).removeClass("selected-day")};
  if($('input[name="avlbl-thurs"]').prop('checked')){$(days[4]).addClass("selected-day")}else{$(days[4]).removeClass("selected-day")};
  if($('input[name="avlbl-fri"]').prop('checked')){$(days[5]).addClass("selected-day")}else{$(days[5]).removeClass("selected-day")};

}

$(document).ready(function() {
  //For Popup
  $(".action-button").click(function(a) {
    $('input[name="itemID"]').val("");
    $('input[name="itemName"]').val("");
    $('input[name="itemPrice"]').val("");
    $('input[name="avlbl-sun"]').prop('checked',false);
    $('input[name="avlbl-mon"]').prop('checked',false);
    $('input[name="avlbl-tue"]').prop('checked',false);
    $('input[name="avlbl-wed"]').prop('checked',false);
    $('input[name="avlbl-thurs"]').prop('checked',false);
    $('input[name="avlbl-fri"]').prop('checked',false);
    displayPopUp();
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

  imageInput.on('change', function(event) {
    var file = event.target.files[0];
  
    if (file) {
      var reader = new FileReader();
  
      reader.onload = function(e) {
        var img = $('<img>').attr('src', e.target.result);
  
        img.on('load', function() {
          var canvas = $('<canvas>')[0];
          var ctx = canvas.getContext('2d');
          var maxSize = 200; // Set your desired maximum size here
  
          var width = img.width();
          var height = img.height();
          
          // Calculate the aspect ratio
          var aspectRatio = width / height;
  
          // Set the canvas size
          if (width > height) {
            canvas.width = maxSize;
            canvas.height = maxSize / aspectRatio;
          } else {
            canvas.width = maxSize * aspectRatio;
            canvas.height = maxSize;
          }
  
          // Draw the image on the canvas
          ctx.drawImage(img[0], 0, 0, canvas.width, canvas.height);
  
          // Get the compressed image data
          var compressedDataUrl = canvas.toDataURL('image/jpeg', 0.8); // Adjust the compression quality as needed
  
          // Use the compressed image data as needed (e.g., upload to server)
          console.log('Compressed image data URL:', compressedDataUrl);
        });
      };
  
      reader.readAsDataURL(file);
    }
  });
  

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
  $(document).on('click', function() {
    // Code to execute when a button is clicked
    $('.item-edit-btn').on('click',function(){
      fetchedResponse.forEach(ele => {
        if(ele["itemID"] == this.value){
          displayPopUp();
          $('input[name="itemID"]').val(ele["itemID"]);
          $('input[name="itemName"]').val(ele["itemName"]);
          $('input[name="itemPrice"]').val(ele["itemPrice"]);
          $('input[name="avlbl-sun"]').prop('checked',ele["avlblSun"]==1?true:false);
          $('input[name="avlbl-mon"]').prop('checked',ele["avlblMon"]==1?true:false);
          $('input[name="avlbl-tue"]').prop('checked',ele["avlblTue"]==1?true:false);
          $('input[name="avlbl-wed"]').prop('checked',ele["avlblWed"]==1?true:false);
          $('input[name="avlbl-thurs"]').prop('checked',ele["avlblThurs"]==1?true:false);
          $('input[name="avlbl-fri"]').prop('checked',ele["avlblFri"]==1?true:false);
        }
      });
    })
  });
});
