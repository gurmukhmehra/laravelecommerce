@extends('Admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Products Maintenance Addon's</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item">Products Maintenance Addon's</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">                
                <span class="d-block m-t-5">
                    <a href="{{ URL::to('admin/maintenance-addon/add') }}" class="btn btn-info"><i class="feather icon-plus"></i> Add Maintenance Addon</a>
                </span>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Maintenance Addon Type</th>
                                <th class="text-center">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($maintenanceAddons as $maintenanceAddon)
                                <tr>
                                    <td class="text-center">{{$i}}</td>
                                    <td class="text-center">{{ $maintenanceAddon->maintenance_addon }}</td>
                                    <td class="text-center">${{ $maintenanceAddon->addon_price }}</td>                                
                                </tr>
                                @php $i++; @endphp
                            @endforeach                            
                        </tbody>
                    </table>                    
                </div>                
            </div>
        </div>
    </div>
@endsection('content')