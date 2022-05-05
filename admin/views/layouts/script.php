<!-- jQuery -->
<script src="assets/js/jquery-3.5.0.min.js"></script>
<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Datepicker Core JS -->
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<!-- Datatables JS -->
<script src="assets/plugins/datatables/datatable.min.js"></script>
<!-- Slimscroll JS -->
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/js/bootstrapValidator.min.html"></script>
<!-- Select2 JS -->
<script src="assets/js/select2.min.js"></script>
<!-- Custom JS -->
<script src="assets/js/admin.js"></script>
<script src="assets/js/toastr.js"></script>

<script>
    function initImageFile(image, inputFile){
        image.click(function (){
            inputFile.trigger('click');
        });

        inputFile.change(function (){
            var reader= new FileReader();

            reader.onload= function (e){
                var img=image[0];
                img.src=e.target.result;
            };

            reader.readAsDataURL(inputFile[0].files[0]);
        });
    }
</script>