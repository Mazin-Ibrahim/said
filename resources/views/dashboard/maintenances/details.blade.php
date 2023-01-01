@extends('layouts.admin')


@section('content')
<div class="card mb-5 p-10 mb-xl-12">
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('maintenances.index') }}" class="btn btn-primary">رجوع</a>
        </div>
    </div>
    <div class="row">

        <div class="col-xl-8">
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                    <!--begin::Table head-->
                    <thead>
                        <tr class="fw-bolder text-muted">
                            
                            <th class="min-w-150px">تاريخ الزيارة</th>
                            <th class="min-w-150px">المبلغ</th>
                            <th class="min-w-150px">أسم العامل</th>
                            <th class="min-w-150px">الحالة</th>
                            <th class="min-w-150px">وصف</th>
                             
                     
                        </tr>
                    </thead>
                    
                    <tbody>

                        @foreach ($maintenance->HistoryVisitsMaintenance as $visit)
                        <tr>
                            <td>
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $visit->date }}</span>
                            </td>

                            <td>
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $visit->amount ?? '---' }}</span>
                            </td>

                            <td>
                                @if(isset($visit->worker_id))
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $visit->worker->name }}</span>
                                @else
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $visit->worker_name }}</span>
                                @endif
                            </td>
                            
                            <td>
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $visit->status ?? '---' }}</span>
                            </td>

                            <td>
                                <span  class="text-dark fw-bolder text-hover-primary fs-6">{{ $visit->description }}</span>
                            </td>
                            
                            
                           
                        
                        @endforeach
                       

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
        </div>
 
</div>
</div>

@endsection