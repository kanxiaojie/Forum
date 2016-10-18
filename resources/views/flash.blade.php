@if(session()->has('flash_message'))
    <script>
        swal({
            title: "{{ session('flash_message.title') }}",
            text: "{{ session('flash_message.message') }}",
            type: "{{ session('flash_message.level') }}",//error, info, success
            timer:1700,
            showConfirmButton:false
            //        confirmButtonText: "Cool"
        });
    </script>
@endif

@if(session()->has('flash_message_overlay'))
    <script>
        swal({
            title: "{{ session('flash_message_overlay.title') }}",
            text: "{{ session('flash_message_overlay.message') }}",
            type: "{{ session('flash_message_overlay.level') }}",//error, info, success
            confirmButtonText:'Okay'
        });
    </script>
@endif