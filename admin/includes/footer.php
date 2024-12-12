
      <?php include('includes/footer-content.php'); ?>
     
    </div>
  </main>
  
  <?php include('right-sidebar.php'); ?>
  
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="assets/js/core/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script> -->
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  <script>
    $(document).ready(function() {
        $(".newSummernote").summernote({
          height: 250
        });
        $('.dropdown-toggle').dropdown();
    });
  </script>

  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

  <script>
    $(document).ready( function () {
      $('#myTable').DataTable( {
        "pagingType": "full_numbers",
          "lengthMenu": [
              [10, 25, 50, -1],
              [10, 25, 50, "All"]
          ],
          responsive: true,
          language: {
              // search: "INPUT",
              searchPlaceholder: "Search booking",
          },
          "ordering": false
      } );
    });
  </script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>