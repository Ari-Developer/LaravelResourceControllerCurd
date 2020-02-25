<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('public/js/toastr.min.js') }}"></script>
<script>
$( function() { 
    toastr.options.closeButton = true;
	toastr.options.progressBar = true;
	toastr.options.timeOut = 20000;
	toastr.options.extendedTimeOut = 5000;
} );
</script>

@if(Session::has('success'))
@php $message = Session::get('success'); @endphp
<script>
$( function() { 
    toastr.success('{{ $message }}');
} );
</script>
@endif

@if(Session::has('error'))
@php $message = Session::get('error'); @endphp
<script>
$( function() { 
    toastr.error('{{ $message }}');
} );
</script>
@endif

@stack('page_js')
</body>
</html>