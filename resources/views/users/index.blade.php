@extends('layouts.master')
@section('title')
    Al-Hakeema - Task
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @if(session()->has('message'))
        <div class="alert alert-success col-12 mt-4">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="breadcrumb-header justify-content-between">
        
        <div class="my-auto">
            <div class="d-flex">

                <h4 class="content-title mb-0 my-auto">Users</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ list
                    Users</span>
            </div>

        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
@if ($company->count() >= 1)
    

    <div class="row row-sm">

        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">

                        <h4 class="card-title mg-b-0">list Users</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <a href="{{ route('users.create') }}" class="modal-effect btn btn-sm btn-primary"
                        style="color:white"><i class="fas fa-plus"></i>&nbsp; Add User </a>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Avatar</th>
                                    <th class="border-bottom-0">Email</th>
                                    <th class="border-bottom-0">Company</th>
                                    <th class="border-bottom-0">Action</th>
                                    <th class="border-bottom-0">+</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    
                                    <td>{{ $item->name }}</td>
                                    <td><a class="btn default btn-outline  " target="_blank" href="{{asset($item->avatar)}}">
                                        
                                        <img class="img img-responsive" width="50" height="50"  src="{{asset($item->avatar)}}">
                                    </a></td>
                                    <td>{{ $item->email }}</td>
                                    
                                    
                                    <td>{{ @$item->company->name }}</td>
                                   
                                    <td>
                                        <div class="row">
                                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('users.edit', $item->id )}}" title="{{ trans('Edit') }}">
                                                <i class="las la-edit"></i>
                                            </a>
                                   
                                            <form method="POST" action="{{route('users.destroy', $item->id)}}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete">
                                                    <i class="las la-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        
                                        {{-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('users.delete', $item->id)}}" title="{{ trans('Delete') }}">
                                            <i class="las la-trash"></i>
                                        </a> --}}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        

    </div>

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
      
    @else
        
    <div class="alert alert-danger col-12 mt-4">
        لا يتوافر شركات لادراج الموظفين تحتها عليك انشاء شركة اولا
    </div>
    @endif
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

   







@endsection