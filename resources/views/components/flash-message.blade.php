@if(Session::has('message'))
<p style="color:green">{{ Session::get('message') }}</p>
@endif