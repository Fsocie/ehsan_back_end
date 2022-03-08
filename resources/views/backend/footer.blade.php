  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->


  <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="{{ asset('admin/dist/js/demo.js') }}"></script>

  <!-- DataTables -->
  <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

   <!-- <script src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous"></script>

  <script src="{{asset('lobibox/dist/js/lobibox.min.js')}}"></script>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>  
  <script src="{{asset('admin/badge_notifications.js')}}"></script>


        <script>
$(document).ready(function() {
 $('#select2').select2();
});
</script>

  <script>
    var pusher = new Pusher('710a42ce02a3f4836392');
    var channel = pusher.subscribe('chat_channel');
    channel.bind('chat', function(data) {
      
      
      console.log('...some...' )
      if(data.is_admin == false)
      {
        Lobibox.notify('warning', {
                    position: 'top right',
                    title: 'informations', 
                    msg: 'Le client '+data.sender_name+' a envoyé un message par rapport a sa commande',
                    sound: true
                  });
      }   
     
  });
  </script>

  @yield('javascripts')
</body>
</html>