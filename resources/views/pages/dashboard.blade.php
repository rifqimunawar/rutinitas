@extends('layouts.default')

@section('title', 'Dashboard V2')

@push('css')
    <link href="{{ asset('/assets/plugins/jvectormap-next/jquery-jvectormap.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('/assets/plugins/datepickk/dist/datepickk.min.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('/assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/plugins/nvd3/build/nv.d3.css') }}" rel="stylesheet" />
    <style>
        .widget-stats {
            transition: background-color 0.5s ease;
        }

        .bg-danger {
            background-color: #dc3545;
        }

        .bg-warning {
            background-color: #ffc107;
        }

        .bg-success {
            background-color: #28a745;
        }

        .bg-secondary {
            background-color: #6c757d;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('/assets/plugins/d3/d3.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/nvd3/build/nv.d3.js') }}"></script>
    <script src="{{ asset('/assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/jvectormap-content/world-mill.js') }}"></script>
    {{-- <script src="{{ asset('/assets/plugins/datepickk/dist/datepickk.min.js') }}"></script> --}}
    <script src="{{ asset('/assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
    <script src="{{ asset('/assets/js/demo/dashboard-v2.js') }}"></script>
@endpush

@section('content')
    <!-- BEGIN breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item active">Dashboard </li>
    </ol>
    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">Dashboard <small>Statistik Keuangan Rifqi Munawar</small></h1>
    <!-- END page-header -->
    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-3 -->
        <a href="" class="col-xl-3 col-md-6" style="text-decoration: none;">
            <div class="widget widget-stats bg-teal">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">SISA SALDO</div>
                    <div class="stats-number">{{ 'Rp ' . number_format($total_saldo, 0, ',', '.') }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 70.1%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (70.1%)</div>
                </div>
            </div>
        </a>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <a href="{{ route('pengeluaran.create') }}" class="col-xl-3 col-md-6" style="text-decoration: none;">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">TOTAL PENGELUARAN</div>
                    <div class="stats-number">{{ 'Rp ' . number_format($total_pengeluaran, 0, ',', '.') }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 40.5%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (40.5%)</div>
                </div>
            </div>
        </a>
        <!-- END col-3 -->
        <!-- BEGIN col-3 -->
        <a href="{{ route('pemasukan.create') }}" class="col-xl-3 col-md-6" style="text-decoration: none">
            <div class="widget widget-stats bg-indigo">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">TOTAL PEMASUKAN</div>
                    <div class="stats-number">{{ 'Rp ' . number_format($total_pemasukan, 0, ',', '.') }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 76.3%;"></div>
                    </div>
                    <div class="stats-desc">Better than last week (76.3%)</div>
                </div>
            </div>
        </a>
        <!-- END col-3 -->
        <div class="col-xl-3 col-md-6">
            @php
                $initialColor = $pengeluaran_hari_ini >= $target_pengeluaran_harian ? 'bg-danger' : 'bg-success';
                $widgetId = $pengeluaran_hari_ini >= $target_pengeluaran_harian ? 'color-widget' : '';
            @endphp

            <div class="widget widget-stats {{ $initialColor }}" id="{{ $widgetId }}">
                <div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
                <div class="stats-content">
                    <div class="stats-title">TARGET PENGELUARAN HARIAN</div>
                    <div class="stats-number">{{ 'Rp ' . number_format($target_pengeluaran_harian, 0, ',', '.') }}</div>
                    <div class="stats-progress progress">
                        <div class="progress-bar" style="width: 54.9%;"></div>
                    </div>
                    <div class="stats-desc">
                        Sudah Keluar
                        ({{ $pengeluaran_hari_ini ? 'Rp ' . number_format($pengeluaran_hari_ini, 0, ',', '.') : '0' }})
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END row -->
    <div>
        @livewire('pie-chart')
    </div>
    <!-- END row -->
    <!-- BEGIN row -->
    {{-- <div class="row">
        <!-- BEGIN col-4 -->
        <div class="col-xl-3 col-lg-6">
            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-2">
                <div class="panel-heading">
                    <h4 class="panel-title">Chat History</h4>
                    <span class="badge bg-teal">4 message</span>
                </div>
                <div class="panel-body bg-light">
                    <div class="chats" data-scrollbar="true" data-height="225px">
                        <div class="chats-item start">
                            <span class="date-time">yesterday 11:23pm</span>
                            <a href="javascript:;" class="name">Sowse Bawdy</a>
                            <a href="javascript:;" class="image"><img alt=""
                                    src="{{ asset('/assets/img/user/user-12.jpg') }}" /></a>
                            <div class="message">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit volutpat. Praesent mattis interdum
                                arcu eu feugiat.
                            </div>
                        </div>
                        <div class="chats-item end">
                            <span class="date-time">08:12am</span>
                            <a href="javascript:;" class="name"><span class="badge bg-blue">ADMIN</span> Me</a>
                            <a href="javascript:;" class="image"><img alt=""
                                    src="{{ asset('/assets/img/user/user-13.jpg') }}" /></a>
                            <div class="message">
                                Nullam posuere, nisl a varius rhoncus, risus tellus hendrerit neque.
                            </div>
                        </div>
                        <div class="chats-item start">
                            <span class="date-time">09:20am</span>
                            <a href="javascript:;" class="name">Neck Jolly</a>
                            <a href="javascript:;" class="image"><img alt=""
                                    src="{{ asset('/assets/img/user/user-10.jpg') }}" /></a>
                            <div class="message">
                                Euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
                            </div>
                        </div>
                        <div class="chats-item start">
                            <span class="date-time">11:15am</span>
                            <a href="javascript:;" class="name">Shag Strap</a>
                            <a href="javascript:;" class="image"><img alt=""
                                    src="{{ asset('/assets/img/user/user-14.jpg') }}" /></a>
                            <div class="message">
                                Nullam iaculis pharetra pharetra. Proin sodales tristique sapien mattis placerat.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <form name="send_message_form" data-id="message-form">
                        <div class="input-group">
                            <input type="text" class="form-control" name="message"
                                placeholder="Enter your message here.">
                            <button class="btn btn-primary" type="button"><i class="fa fa-camera"></i></button>
                            <button class="btn btn-primary" type="button"><i class="fa fa-link"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END panel -->
        </div>
        <!-- END col-4 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-3 col-lg-6">
            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-3">
                <div class="panel-heading">
                    <h4 class="panel-title">Today's Schedule</h4>
                </div>
                <div id="schedule-calendar" class="datepickk"></div>
                <hr class="m-0 bg-gray-500" />
                <div class="list-group list-group-flush">
                    <a href="javascript:;"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-ellipsis">
                        Sales Reporting
                        <span class="badge bg-teal fs-10px">9:00 am</span>
                    </a>
                    <a href="javascript:;"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-ellipsis rounded-bottom">
                        Have a meeting with sales team
                        <span class="badge bg-blue fs-10px">2:45 pm</span>
                    </a>
                </div>
            </div>
            <!-- END panel -->
        </div>
        <!-- END col-4 -->
        <!-- BEGIN col-4 -->
        <div class="col-xl-3 col-lg-6">
            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="index-4">
                <div class="panel-heading">
                    <h4 class="panel-title">New Registered Users</h4>
                    <span class="badge bg-teal">24 new users</span>
                </div>
                <ul class="registered-users-list">
                    <li>
                        <a href="javascript:;"><img src="{{ asset('/assets/img/user/user-5.jpg') }}"
                                alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Savory Posh
                            <small>Algerian</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="{{ asset('/assets/img/user/user-3.jpg') }}"
                                alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Ancient Caviar
                            <small>Korean</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="{{ asset('/assets/img/user/user-1.jpg') }}"
                                alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Marble Lungs
                            <small>Indian</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="{{ asset('/assets/img/user/user-8.jpg') }}"
                                alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Blank Bloke
                            <small>Japanese</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="{{ asset('/assets/img/user/user-2.jpg') }}"
                                alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Hip Sculling
                            <small>Cuban</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="{{ asset('/assets/img/user/user-6.jpg') }}"
                                alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Flat Moon
                            <small>Nepalese</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="{{ asset('/assets/img/user/user-4.jpg') }}"
                                alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Packed Puffs
                            <small>Malaysian</small>
                        </h4>
                    </li>
                    <li>
                        <a href="javascript:;"><img src="{{ asset('/assets/img/user/user-9.jpg') }}"
                                alt="" /></a>
                        <h4 class="username text-ellipsis">
                            Clay Hike
                            <small>Swedish</small>
                        </h4>
                    </li>
                </ul>
                <div class="panel-footer text-center">
                    <a href="javascript:;" class="text-decoration-none text-dark">View All</a>
                </div>
            </div>
            <!-- END panel -->
        </div>
        <!-- END col-4 -->
    </div> --}}
    <!-- END row -->
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const colors = ['bg-danger', 'bg-warning', 'bg-success', 'bg-secondary'];
        let index = 0;

        setInterval(() => {
            const widget = document.getElementById('color-widget');
            if (widget) {
                widget.classList.remove(...colors);
                widget.classList.add(colors[index]);
                index = (index + 1) % colors.length;
            }
        }, 1000);
    });
</script>
