<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<script src="{{ asset('js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('js/scrollbar/custom.js') }}"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('js/config.js') }}"></script>
<!-- Plugins JS start-->
<script id="menu" src="{{ asset('js/sidebar-menu.js') }}"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    var notificationsWrapper = $('#notification-count');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount = parseInt($('#notification-count').data('count'));
    $(function() {

        const notifications = localStorage.getItem('notifications')
        console.log(notifications)
        if (notifications == null || Number.isNaN(notifications)) {
            localStorage.setItem('notifications', 0)
            console.log(notifications);
        }
        if (notifications != 0) {
            $('#notification-count').text(notifications);
        }
    })

    Pusher.logToConsole = true;
    $('#notif-icon').click(function() {
        localStorage.setItem('notifications', 0)
        const notifications = localStorage.getItem('notifications')
        $('#notification-count').text('');
    })

    var pusher = new Pusher('4d59976c7677002a418a', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('notifikasi-keterlambatan.' + {{ Auth::user()->id }});
    channel.bind("App\\Events\\NotifikasiKeterlambatanEvent", function(data) {
        var existingNotif = $('#notification-wrapper').html();
        var newNotif = `  <li>
                            <h6><i class="font-primary"> </i>` + data.peminjaman.id + `<span
                                    class="pull-right">` + data.peminjaman.waktu_peminjaman + `</span></h6>
                        </li>`;
        $('#notification-wrapper').html(existingNotif + newNotif);
    });
    channel.bind('pusher:subscription_succeeded', function(data) {});


    channel.bind('my-event', function(data) {
        console.log('id: ' + data.id_peminjaman)
        var existingNotif = $('#notification-wrapper').html();
        var newNotif = `  <li>
                            <h6><i class="font-primary"> </i>` + data.peminjaman.id + `<span
                                    class="pull-right">` + data.peminjaman.waktu_peminjaman + `</span></h6>
                        </li>`;
        $('#notification-wrapper').html(existingNotif + newNotif);
        notifications = parseInt(localStorage.getItem('notifications'));
        notifications += 1;
        console.log(localStorage.getItem('notifications'))
        localStorage.setItem("notifications", notifications);
        notificationsWrapper.attr('data-count', notifications);
        notificationsWrapper.text(notifications);
    });
</script>


@if (Route::current()->getName() != 'popover')
    <script src="{{ asset('js/tooltip-init.js') }}"></script>
@endif

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('js/script.js') }}"></script>


{{-- @if (Route::current()->getName() == 'index') 
	<script src="{{asset('js/layout-change.js')}}"></script>
@endif --}}
