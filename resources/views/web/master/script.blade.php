        <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="assets/js/jquery.countdown.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/jquery.odometer.min.js"></script>
        <script src="assets/js/jquery.appear.js"></script>
        <script src="assets/js/tween-max.min.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/slick-animation.min.js"></script>
        <script src="assets/js/jquery-ui.min.js"></script>
        <script src="assets/js/ajax-form.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

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
@if ($errors->any())
<div class="d-none" id="commonError">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
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


       