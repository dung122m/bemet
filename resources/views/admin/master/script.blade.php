<!-- jQuery 2.2.0 -->
<script src="admin_assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="admin_assets/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="admin_assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin_assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin_assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin_assets/dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
   <script src="/admin_assets/plugins/summernote/summernote.min.js"></script>

@yield('js')

  @if(Session::has('success'))
                <script>
                        $.toast({
                        heading: 'Notification',
                        text: "{{ Session::get('success') }}",
                        showHideTransition: 'slide',
                        icon: 'success',
                        position:'top-center',
                        hideAfter: 5000



                        })
                </script>
        @endif
        @if(Session::has('error'))
              
                <script>
                        $.toast({
                        heading: 'Notification',
                        text: "{{ Session::get('error') }}",
                        showHideTransition: 'slide',
                        icon: 'error',
                        position:'top-center',
                        hideAfter: 5000
                        })
                </script>
        @endif
@if ($errors->any())
<div class="d-none" id="commonError">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
<script>

    document.addEventListener("DOMContentLoaded", function() {
       
        var commonError = document.getElementById('commonError');

        if (commonError && commonError.children.length > 0) {
            var errorMessage = commonError.innerHTML;

            $.toast({
                heading: 'Error',
                text: errorMessage,
                showHideTransition: 'slide',
                icon: 'error',
                position: 'top-center',
                hideAfter: 10000

            });
        }
    });
</script>

