<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<script>
                    $(document).ready(function(){
                      $("#myInput, #bulan, #tahun").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
</script>
<script>
  $('#pilih_filter').change(function() {
  if (this.value == 'bulan') {
    $("#filter").append('<input id="bulan" placeholder="bulan...">')
    $("#tahun").remove();
  }
  ifelse(this.value == 'tahun') {
    $("#filter").append('<input id="tahun" placeholder="tahun...">')
    $("#bulan").remove();
  } else {
    $("#test").remove();
  }
});
</script>
<!-- END: Page JS-->
