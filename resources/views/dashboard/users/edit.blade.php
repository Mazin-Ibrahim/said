@extends('layouts.admin')
@section('content')
<div class="card p-10">
   <div class="col-xl-12">
      <form id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
         <!--begin::Heading-->
         @method('PUT')
         @csrf
         <div class="mb-13">
            <!--begin::Title-->
            <h1 class="mb-3">تعديل البيانات</h1>
         </div>
         <!--end::Heading-->
         <!--begin::Input group-->
         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">أسم المستخدم</span>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control"
               name="name" value="{{ $user->name }}">
            @error('name')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>

         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">رقم الهاتف</span>
            </label>
            <!--end::Label-->
            <input type="tel" class="form-control"
               name="phone" value="{{ $user->phone }}">
            @error('phone')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>


         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">كلمة المرور</span>
            </label>
            <!--end::Label-->
            <input type="password" class="form-control"
               name="password">
            @error('password')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>


         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">كلمة المرور</span>
            </label>
            <!--end::Label-->
            <select name="role" class="form-control" id="">
                <option {{ $user->role == 'user' ? 'selected' : '' }} value="user">مستخدم</option>
                <option value="stocker" {{ $user->role == 'stocker' ? 'selected' : '' }}>مخزنجي</option>
                <option value="sub-admin" {{ $user->role == 'sub-admin' ? 'selected' : '' }}>نائب مدير</option>
                <option value="expense" {{ $user->role == 'expense' ? 'selected' : '' }}>محاسب</option>
            </select>
            @error('role')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>

        
         <div class="text-center">
            <a href="{{ route('users.index') }}" id="kt_modal_new_target_cancel" class="btn btn-light me-3">رجوع</a>
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