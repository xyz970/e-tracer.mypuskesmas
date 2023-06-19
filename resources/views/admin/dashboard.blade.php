@extends('layouts.simple.master')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/date-picker.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Dashboard</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Default</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row second-chart-list third-news-update">
            <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media">
                            <div class="badge-groups w-100">
                                <div class="badge f-12"><i class="me-1" data-feather="clock"></i><span
                                        id="txt"></span></div>
                                <div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>
                            </div>
                        </div>
                        <div class="greeting-user text-center">
                            <div class="profile-vector"><img class="img-fluid"
                                    src="{{ Auth::user()->jk == 'L' ? asset('images/dashboard/man-welcome.png') : asset('images/dashboard/woman-welcome.png') }}"
                                    alt=""></div>
                            <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i
                                        class="fa fa-check-circle f-14 middle"></i></span></h4>
                            <p>{{ Auth::user()->nama }}</p>
                               @if($peminjaman)
                                 <div class="card-body">
                                    <p class="mb-4">
                                        Anda belum mengembalikan berkas tracer. di mohon untuk mengembalikan segera.. ID berkas : {{ $peminjaman->id }}
                                    </p>

                                    <a href="{{ route('pengembalian.index') }}"
                                        class="btn btn-sm btn-outline-danger">Cek Sekarang</a>
                                </div>
                               @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
                <div class="card earning-card">
                    <div class="card-body p-0">
                        <div class="row m-0">
                            <div class="col-xl-3 earning-content p-0">
                                <div class="row m-0 chart-left">
                                    <div class="col-xl-12 p-0 left_side_earning">
                                        <h5>Grafik Keterlambatan</h5>
                                        <p class="font-roboto">Grafik Keterlambatan dalam kurun waktu satu tahun</p>
                                    </div>
                                    {{-- <div class="col-xl-12 p-0 left_side_earning">
                                        <h5>$4055.56 </h5>
                                        <p class="font-roboto">This Month Earning</p>
                                    </div>
                                    <div class="col-xl-12 p-0 left_side_earning">
                                        <h5>$1004.11</h5>
                                        <p class="font-roboto">This Month Profit</p>
                                    </div>
                                    <div class="col-xl-12 p-0 left_side_earning">
                                        <h5>90%</h5>
                                        <p class="font-roboto">This Month Sale</p>
                                    </div>
                                    <div class="col-xl-12 p-0 left-btn"><a class="btn btn-gradient">Summary</a></div> --}}
                                </div>
                            </div>
                            <div class="col-xl-9 p-0">
                                <div class="chart-right">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card-body p-0">
                                                <div class="current-sale-container">
                                                    <div id="chart-currently"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 xl-50 calendar-sec box-col-6">
                <div class="card gradient-primary o-hidden">
                    <div class="card-body">

                        <div class="default-datepicker">
                            <div class="datepicker-here" data-language="en"></div>
                        </div>
                        <span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span
                                    class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                    class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span
                                    class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span
                                    class="dots dots7 dot-small-semi"></span><span
                                    class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">
                                </span></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
    <script src="{{ asset('js/chart/chartist/chartist.js') }}"></script>
    <script src="{{ asset('js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('js/notify/bootstrap-notify.min.js') }}"></script>
    {{-- <script src="{{ asset('js/dashboard/default.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/notify/index.js') }}"></script> --}}
    <script src="{{ asset('js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('js/typeahead-search/typeahead-custom.js') }}"></script>
    <script>
        var options = {
            series: [{
                name: 'Keterlambatan',
                data: [
                    @for ($i = 0; $i < count($arrayChart); $i++)
                        "{{ $pengembalian[$i]['keterlambatan'] }}",
                    @endfor
                ]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: [
                    @for ($i = 0; $i < count($arrayChart); $i++)
                        "{{ \Carbon\Carbon::parse($pengembalian[$i]['monthname'])->translatedFormat('F') }}",
                    @endfor
                ],
            },
            yaxis: {
                title: {
                    text: 'x (kali)'
                }
            },
            fill: {
                colors: ['#F44336'],
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + " x (kali)"
                    }
                }
            }
        };

        var chartEl = document.querySelector("#chart-currently");
        if (typeof chartEl !== undefined && chartEl !== null) {
            const chart = new ApexCharts(chartEl, options);
            chart.render();
        }
    </script>
@endsection
