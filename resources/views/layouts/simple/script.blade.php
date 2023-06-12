<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('js/scrollbar/custom.js')}}"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<!-- Sidebar jquery-->
<script src="{{asset('js/config.js')}}"></script>
<!-- Plugins JS start-->
<script id="menu" src="{{asset('js/sidebar-menu.js')}}"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('4d59976c7677002a418a', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('notifikasi-keterlambatan.'+{{ Auth::user()->id }});
    channel.bind("App\\Events\\NotifikasiKeterlambatanEvent", function(data) {
    });
    channel.bind('pusher:subscription_succeeded', function(data) {});


    channel.bind('my-event', function(data) {
        console.log('id: '+data.id)
    });
</script>


@if(Route::current()->getName() != 'popover') 
	<script src="{{asset('js/tooltip-init.js')}}"></script>
@endif

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('js/script.js')}}"></script>


{{-- @if(Route::current()->getName() == 'index') 
	<script src="{{asset('js/layout-change.js')}}"></script>
@endif --}}