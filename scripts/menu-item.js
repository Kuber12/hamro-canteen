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
  dropArea.on('click', function() {
    imageInput.trigger('click');
  });

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

    const reader = new FileReader();

    reader.onload = function(event) {
      const img = new Image();

      img.onload = function() {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const targetWidth = 300; // Adjust the desired width as needed
        const targetHeight = 300; // Adjust the desired height as needed

        canvas.width = targetWidth;
        canvas.height = targetHeight;

        ctx.drawImage(img, 0, 0, targetWidth, targetHeight);

        canvas.toBlob(function(blob) {
          const newFile = new File([blob], file.name, { type: file.type });

          const imgPreview = document.createElement('img');
          imgPreview.src = URL.createObjectURL(newFile);
          imgPreview.style.maxWidth = '100%';
          imgPreview.style.maxHeight = '100%';
          preview.innerHTML = '';
          preview.append(imgPreview);

          // Replace the input file with the resized image file
          const inputElement = document.getElementById('image-input');
          const dataTransfer = new DataTransfer();
          dataTransfer.items.add(newFile);
          inputElement.files = dataTransfer.files;

          // Use the resized image data as needed (e.g., upload to server)
          console.log('Resized image:', newFile);
        }, file.type, 0.8); // Adjust the compression quality as needed
      };

      img.src = event.target.result;
    };

    reader.readAsDataURL(file);
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
          $('input[name="avlbl-thurs"]').prop('checked',ele["avlblThu"]==1?true:false);
          $('input[name="avlbl-fri"]').prop('checked',ele["avlblFri"]==1?true:false);
        }
      });
    })
  });
  displayPopUp();
  $("#popup-container").hide();
  $("#popup-blocker").hide();
});
$('.closepopup').on("click",function(){
  $("#popup-container").hide();
  $("#popup-blocker").hide();
  
})
