</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<footer class="footer">
  <div class="d-sm-flex justify-content-center justify-content-sm-between">
    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Developed by <a href="https://frslogics.com/" target="_blank">FRSLogics</a></span>
    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All rights reserved.</span>
  </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{ url('css/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ url('css/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{ url('css/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ url('css/vendors/progressbar.js/progressbar.min.js')}}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ url('js/js/off-canvas.js')}}"></script>
<script src="{{ url('js/js/hoverable-collapse.js')}}"></script>
<script src="{{ url('js/js/template.js')}}"></script>
<script src="{{ url('js/js/settings.js')}}"></script>
<script src="{{ url('js/js/todolist.js')}}"></script>
<!-- endinject -->
<script src="{{ url('js/js/jquery.cookie.js')}}" type="text/javascript"></script>
<script src="{{ url('js/js/dashboard.js')}}"></script>
<script src="{{ url('js/js/Chart.roundedBarCharts.js')}}"></script>
<!-- End custom js for this page-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> --}}

<!-- Custom JS Functions -->
<!-- Confirm before delete a record. -->
<script>
function delete_confirmation(){
return confirm("Are you sure to Delete?");
}

$('#mySpinner').addClass('spinner');
$(window).on("load", function(){
  setTimeout(function(){
    $('#mySpinner').remove().fadeOut("slow");
  },1000)

})
</script>
<script>
$(document).ready(function(){
$("#myInput").on("keyup", function() {
var value = $(this).val().toLowerCase();
$("#myTable tr").filter(function() {
$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});
});
</script>
</body>

</html>
