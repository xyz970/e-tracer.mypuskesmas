<link
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    rel="stylesheet" />
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/icofont.css') }}">
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/themify.css') }}">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/flag-icon.css') }}">
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/feather-icon.css') }}">
<!-- Plugins css start-->
@yield('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/scrollbar.css') }}">
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/bootstrap.css') }}">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link id="color" rel="stylesheet" href="{{ asset('css/color-1.css') }}" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
<style>
    .nav-icon {
        color: #FF3333 !important;
        width: 25px;
        height: 25px;
    }

    .img-icon {
        color: #FF3333;
        width: 25px;
        height: 25px;
    }

    .nav-content {
        color: #FF3333 !important;
    }

    :root {
        --bs-danger: #FF3333 !important;
        --theme-deafult: #FF3333 !important;
        --theme-secondary: #FF3333 !important;
    }
    .icon{
        color:#FF3333 !important;
    }

    .link-content{
        color: #FF3333 !important;
    }
    .link-nav:hover {
        background-color: #FF3333 !important;
    }
    .link-nav:hover .icon{
        color:white !important;
    }
    .link-nav:hover .link-content{
        color:white !important;
    }

    .nav-selected {
        background-color: #FF3333 !important;
    }
    .nav-selected .icon {
        color: white !important;
    }
    .nav-selected .link-content{
        color: white !important;
    }
    .pb-6{
        padding-bottom: 4rem;
    }
</style>
