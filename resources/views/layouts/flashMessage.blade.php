@if(Session::has('flash_message'))
    <div class="alert-danger" id="message">

    </div>

    <script>

        swal({
            title: '{{Session::get('flash_message')}}',
            timer: 5000
        }).then(
            function () {},
            // handling the promise rejection
            function (dismiss) {
                if (dismiss === 'timer') {
                    console.log('I was closed by the timer')
                }
            }
        )
    </script>
@endif