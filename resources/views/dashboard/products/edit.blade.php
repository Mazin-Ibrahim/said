@extends('layouts.admin')
@section('content')
<div class="card p-10">
   <div class="col-xl-12">
      <form id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="post" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
         <!--begin::Heading-->
         @csrf
         @method('PUT')
         <div class="mb-13">
            <!--begin::Title-->
            <h1 class="mb-3">تعديل المنتج</h1>
         </div>
         <!--end::Heading-->
         <!--begin::Input group-->
         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">أسم المنتج</span>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid"
               name="name" value="{{ $product->name }}">
            @error('name')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>

         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">وصف المنتج</span>
            </label>
            <!--end::Label-->
            <textarea class="form-control" name="description" id="" cols="30" rows="10">
                {{ $product->description }}
            </textarea>
            @error('description')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>

         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">التصنيف</span>
            </label>
            <!--end::Label-->
            <select  id="" class="form-control form-control-solid" name="category_id">
                 @foreach ($categories as $category)
                     
                 <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                 @endforeach
            </select>
           
            @error('category_id')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>

         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required"> سعر الشراء</span>
            </label>
            <!--end::Label-->
            <input type="number" class="form-control form-control-solid" value="{{ $product->buy_price }}"
               name="buy_price">
            @error('buy_price')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>


         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required"> سعر البيع</span>
            </label>
            <!--end::Label-->
            <input type="number" class="form-control form-control-solid"  value="{{ $product->sell_price }}"
               name="sell_price">
            @error('sell_price')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>

         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required"> الكمية</span>
            </label>
            <!--end::Label-->
            <input type="number" class="form-control form-control-solid"  value="{{ $product->qty }}"
               name="qty">
            @error('qty')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>


         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required"> أقل كمية لتلقي الاشعار</span>
            </label>
            <!--end::Label-->
            <input type="number" class="form-control form-control-solid" value="{{ $product->danger_amount }}"
               name="danger_amount">
            @error('danger_amount')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>

         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span class="required">طرق البيع</span>
            </label>
            <!--end::Label-->
            <select  id="" class="form-control form-control-solid" name="selling_method_id">
                 @foreach ($sellingMethods as $sellingMethod)
                
                 <option value="{{ $sellingMethod->id }}" {{ $product->selling_method_id == $sellingMethod->id ? 'selected' : '' }}>{{ $sellingMethod->name }}</option>
                 @endforeach
            </select>
           
            @error('selling_method_id')
            <div class="fv-plugins-message-container invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>

         <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
            <span>الصور</span>
            </label>
            <!--end::Label-->
            <input type="file" class="form-control form-control-solid" multiple
               name="images[]">
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