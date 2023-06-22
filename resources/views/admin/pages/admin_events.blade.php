@extends('admin/layout/layout')
@section('pagetitle', 'Events')
@section('events_active', 'active')
@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('admin_assets/assets/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/plugins/table/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin_assets/plugins/table/datatable/custom_dt_custom.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/font-icons/fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/plugins/font-icons/fontawesome/css/fontawesome.css') }}">

    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components/tabs-accordian/custom-accordions.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_custom.css') }}">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
@endsection
@section('container')
    <div class="page-header">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboad</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Events</a></li>
            </ol>
        </nav>
    </div>

    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="widget-content widget-content-area">
                <div id="toggleAccordion">
                    <div class="card">
                        <div class="card-header" id="headingThree1">
                            <section class="mb-0 mt-0">
                                <div role="menu" class="collapsed" data-toggle="collapse"
                                    data-target="#defaultAccordionColor" aria-expanded="false"
                                    aria-controls="defaultAccordionColor">
                                    Add Event
                                    <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div id="defaultAccordionColor" class="collapse" aria-labelledby="headingThree1"
                            data-parent="#toggleAccordion">
                            <div class="card-body">
                                <form action="{{ url('/admin_upload_events') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Title</label>
                                            <input type="text" name="title" class="form-control" id="inputEmail4"
                                                placeholder="Title">
                                        </div>

                                    </div>

                                    <div class="form-row mb-4">
                                       
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Description</label>
                                            <input type="text" name="description" class="form-control" id="inputAddress"
                                                placeholder="description">
                                        </div>
                                    </div>

                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Image</label>
                                            <input type="file" name="image_link" class="form-control" id="inputEmail4"
                                                placeholder="Image">
                                        </div>

                                    </div>


                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress">Address</label>
                                            <input type="text" name="address" class="form-control" id="inputAddress"
                                                placeholder="">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputState">Join link</label>
                                           <input type="text" name="join_link" class="form-control" id="inputAddress"
                                                placeholder="">
                                        </div>
                                    </div>





                                    <input type="submit" class="form-control" vlaue="Add Post">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row layout-top-spacing">


        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div id="accordionNo-icons" class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Events</h4>
                        </div>
                    </div>
                </div>
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension1" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                {{-- <th>Name</th>
                                <th>User Type</th> --}}
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>address</th>
                                <th>join_link</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($event as $data)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>

                                    {{-- <td>{{ $data->user_detail-> }}</td>
                                    <td>
                                        {{ $data->utype }}
                                    </td> --}}
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <span class='shadow-none badge badge-primary'> <a
                                                    href="{{ asset('event_pic') }}/{{ $data->image }}"
                                                    target="_blank"> View</a>
                                            </span>
                                        </div>
                                    </td>
                                    <td>{{ $data->address }}</td>
                                    <td>{{ $data->join_link }}</td>
                                    @if ($data->status == '1')
                                        <td class="text-center"> <span class='shadow-none badge badge-primary'>
                                                <a href="{{ url('/set_event/0', $data->id) }}">Active</a></span>
                                        </td>
                                    @else
                                        <td class="text-center"> <span class='shadow-none badge badge-danger'>
                                                <a href="{{ url('/set_event/1', $data->id) }}">Deactive</a></span>
                                        </td>
                                    @endif
                                    <td>{{ $data->created_at }}</td>
                                    <td class="text-center">
                                        <div class="dropdown custom-dropdown">
                                            <a href="{{ url('/delete_event', $data->id) }}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-trash-2 table-cancel">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                    </path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('javascript')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script>
        // category table
        $('#html5-extension1').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                        extend: 'csv',
                        className: 'btn'
                    },
                    {
                        extend: 'print',
                        className: 'btn'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
    <script src="{{ asset('admin_assets/plugins/font-icons/feather/feather.min.js') }}"></script>
    <script type="text/javascript">
        feather.replace();
    </script>
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{ asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
@endsection
