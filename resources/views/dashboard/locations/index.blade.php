@extends('layouts.admin')

@section('content')

<div class="col-xl-12">
    <div class="card mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">المواقغ</span>
                <span class="text-muted mt-1 fw-bold fs-7">عدد المواقغ {{ $locations->count() }}</span>
            </h3>
            <div class="card-title align-items-start flex-column">
                <div class="card-toolbar">
                    <a href="{{ route('locations.create') }}" class="btn btn-primary">أضافة موقع جديد</a>
                </div>
            </div>
           
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted">
                            
                            <th class="min-w-150px">أسم الموقع</th>
                            <th class="min-w-150px">أسم العميل</th>
                            <th class="min-w-150px">قيمة العقد</th>
                            <th class="min-w-150px">تاريخ الاستلام</th>
                            <th class="min-w-150px">تاريخ التسليم</th>
                             
                            <th class="min-w-150px">التحكم</th>
                        </tr>
                    </thead>
               
                    <tbody>

                        @foreach ($locations as $location)
                        <tr>
                           
                            <td>
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $location->location_name }}</span>
                            </td>
                            <td>
                                @if(isset($location->customer_id))
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $location->customer->name }}</span>
                                @else
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $location->customer_name }}</span>
                                @endif
                            </td>
                            <td>
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $location->contract_price }}</span>
                            </td>
                            <td>
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $location->received_date }}</span>
                            </td>
                            <td>
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $location->delivery_date }}</span>
                            </td>
                            
                           
                        
                            <td>
                               
                                
                                <a href="{{ route('locations.details',$location->id) }}" class="btn btn-primary btn-sm">عرض التفاصيل</a>
                            </td>
                        </tr>
                        @endforeach
                       

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
                <x-paginator :paginator="$locations" />
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
    </div>
</div>

@endsection