@if(Session::has('flash_message'))
    <div class="alert-danger" id="message">
    {{Session::get('flash_message')}}
    </div>
@endif