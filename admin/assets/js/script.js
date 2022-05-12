$(document).ready(function () {



  // Tích hợp CKEditor vào name của textarea, CKEditor chỉ áp dụng đc với textarea
  CKEDITOR.replace('description', {
    //đường dẫn đến file ckfinder.html của ckfinder
    filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
    //đường dẫn đến file connector.php của ckfinder
    filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  });

});
