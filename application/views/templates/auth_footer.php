 <!-- General JS Scripts -->
 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('assets/')?>js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

  <!-- Template JS File -->
  <script src="<?= base_url('assets/')?>js/scripts.js"></script>
  <script src="<?= base_url('assets/')?>js/custom.js"></script>
  <script src="<?= base_url('assets/')?>js/sweetalert2.min.js"></script>

  <!-- Page Specific JS File -->
  <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>

<script>
  $('.custom-file-input').on('change', function() {
    let filename = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(filename);
  });


  $('.custom-switch-input').on('click', function(){
    const menuID = $(this).data('menu');
    const roleID = $(this).data('role');

    $.ajax({
      url: "<?= base_url('admin/ubah_akses'); ?>",
      type: 'post',
      data: {
        menuID: menuID,
        roleID: roleID
      },
      success: function() {
        document.location.href = "<?= base_url('admin/akses_role/'); ?>" + roleID;
      }
    });
  });

</script>



</body>
</html>
