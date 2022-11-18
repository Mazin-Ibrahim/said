@extends('layouts.admin')
@section('content')
<div class="card p-10">
   <div class="col-xl-12">
      <form id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ route('categories.update',$category->id) }}" enctype="multipart/form-data">
         <!--begin::Heading-->
         @csrf
         @method('PUT')
         <div class="mb-13">
            <!--begin::Title-->
            <h1 class="mb-3">تعديل بيانات القسم</h1>
         </div>
         <!--end::Heading-->
         <!--begin::Input group-->
         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">أسم قسم</span>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid"
               name="name" value="{{ $category->name }}">
            @error('name')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>

         
         <div class="text-center">
            <a href="{{ route('categories.index') }}" id="kt_modal_new_target_cancel" class="btn btn-light me-3">رجوع</a>
            <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
            <span class="indicator-label">حفظ</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
         </div>
         <!--end::Actions-->
         <div></div>
      </form>
   </div>
</div>
@endsection