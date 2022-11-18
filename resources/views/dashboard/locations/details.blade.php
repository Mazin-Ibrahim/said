@extends('layouts.admin')


@section('content')
<div class="card mb-5 p-10 mb-xl-12">
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('locations.index') }}" class="btn btn-primary">رجوع</a>
        </div>
    </div>
    <div class="row">

 
 

    <div class="col-sm-6">
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title fw-bolder text-dark">المنتجات</h3>
              
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-0">
                <!--begin::Item-->
                <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                   
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="flex-grow-1 me-2">
                        <span class="fw-bolder text-gray-800 text-hover-primary fs-6">أسم الموقع</span>
                        <span class="text-muted fw-bold d-block"></span>
                    </div>
                    <!--end::Title-->
                    <!--begin::Lable-->
                    <span class="fw-bolder text-gray-800 text-hover-primary fs-6 py-1">{{ $location->location_name }}</span>
                    <!--end::Lable-->
                </div>
                
         
                
            </div>




              @foreach ($location->products as $key => $product) 
              <div class="card-body pt-0">
                <!--begin::Item-->
                <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                   
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="flex-grow-1 me-2">
                        <span class="fw-bolder text-gray-800 text-hover-primary fs-6">أسم المنتج</span>
                        <span class="text-muted fw-bold d-block">رقم المنتج  ## {{ $key + 1 }}</span>
                    </div>
                    <!--end::Title-->
                    <!--begin::Lable-->
                    <span class="fw-bolder text-gray-800 text-hover-primary fs-6 py-1">{{ $product->name}}</span>
                    <!--end::Lable-->
                </div>
                
         
                
            </div>

            <div class="card-body pt-0">
                <!--begin::Item-->
                <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                   
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="flex-grow-1 me-2">
                        <span class="fw-bolder text-gray-800 text-hover-primary fs-6">الكمية</span>
                        <span class="text-muted fw-bold d-block"></span>
                    </div>
                    <!--end::Title-->
                    <!--begin::Lable-->
                    <span class="fw-bolder text-gray-800 text-hover-primary fs-6 py-1">{{ $product->pivot->qty}}</span>
                    <!--end::Lable-->
                </div>
                
         
                
            </div>

            <div class="card-body pt-0">
                <!--begin::Item-->
                <div class="d-flex align-items-center bg-light-warning rounded p-5 mb-7">
                   
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="flex-grow-1 me-2">
                        <span class="fw-bolder text-gray-800 text-hover-primary fs-6">الحالة</span>
                        <span class="text-muted fw-bold d-block"></span>
                    </div>
                    <!--end::Title-->
                    <!--begin::Lable-->
                    <span class="fw-bolder text-gray-800 text-hover-primary fs-6 py-1">{{ $product->pivot->status}}</span>
                    <!--end::Lable-->
                </div>
                
         
                
            </div>
              @endforeach

        
            <!--end::Body-->
        </div>
    </div>

    <div class="col-sm-6">
        <table>
            <thead>
                <tr class="fw-bolder text-muted">
                    <th class="min-w-150px">تاريخ الدفعة</th>
                    <th class="min-w-150px">المبلغ</th>
                    <th class="min-w-150px">حالة الدفع</th>
                    <th class="min-w-150px">أسم المتحصل</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($location->paymentDetails as $payment )
                    <tr>
                        <td  class="text-dark fw-bolder text-hover-primary fs-6">{{ $payment->payment_received_date ?? '---' }}</td>
                        <td  class="text-dark fw-bolder text-hover-primary fs-6">{{ $payment->amount ?? '---' }}</td>
                        <td  class="text-dark fw-bolder text-hover-primary fs-6">{{ $payment->sataus ?? '---'}}</td>
                        <td  class="text-dark fw-bolder text-hover-primary fs-6">{{ $payment->receiver_name ?? '---'}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>
</div>

@endsection