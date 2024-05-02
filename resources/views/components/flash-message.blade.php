@if (Session::has('message'))
    <p style="color:green">{{ Session::get('message') }}</p>
@endif

@if ($errors->any())
    <p style="color:red">Please correct the following errors:</p>
    @foreach ($errors->all() as $error)
        <p style="color:red">{{ $error }}</p>
    @endforeach
@endif
