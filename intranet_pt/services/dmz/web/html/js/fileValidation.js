const fileValidation = function() {
    var fileInput = 
        document.getElementById('fileToUpload');
              
    var filePath = fileInput.value;
          
    // Allowing file type
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.jfif|\.bmp)$/i;
              
    if (!allowedExtensions.exec(filePath)) {
        alert('Invalid file type');
        fileInput.value = '';
        return false;
    } 
}
