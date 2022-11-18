@extends('layouts.admin')


@section('content')
<div class="card p-10">
    <form action="{{ route('locations.store') }}" method="POST" id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework">
        @csrf
        <div class="row" id="app">
            <div class="col-xl-6">
                <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">أسم الموقع</span>
                    </label>
                    <!--end::Label-->
                    <input type="text" class="form-control"
                       name="location_name">
                    @error('location_name')
                    <div class="fv-plugins-message-container invalid-feedback">
                       {{ $message }}
                    </div>
                    @enderror
                 </div>

                 <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">أسم العميل</span>
                    </label>
                    <!--end::Label-->
                    
                    <input type="text" class="form-control"
                       name="customer_name">
                    @error('customer_name')
                    <div class="fv-plugins-message-container invalid-feedback">
                       {{ $message }}
                    </div>
                    @enderror
                 </div>

                 <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <input type="hidden" name="customer_id" :value="customer.id">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">أختار العميل</span>
                    </label>
                    <!--end::Label-->
                    <multiselect
                                    
                    :close-on-select="true"
                    select-label="أختار العميل"
                    deselect-label="أضغط لحذف الاختيار"
                    placeholder=""
                    label="name"
                    :options="{{ $customers }}"
                    v-model="customer"
                    
                >
                </multiselect>
                    
                 </div>

                 <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">قيمة العقد</span>
                    </label>
                    <!--end::Label-->
                    <input type="number" class="form-control"
                       name="contract_price">
                    @error('contract_price')
                    <div class="fv-plugins-message-container invalid-feedback">
                       {{ $message }}
                    </div>
                    @enderror
                 </div>
                 <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">تاريخ الاستلام</span>
                    </label>
                    <!--end::Label-->
                    <input type="date" class="form-control"
                       name="received_date">
                    @error('received_date')
                    <div class="fv-plugins-message-container invalid-feedback">
                       {{ $message }}
                    </div>
                    @enderror
                 </div>

                 <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span class="required">تاريخ الاستلام</span>
                    </label>
                    <!--end::Label-->
                    <input type="date" class="form-control"
                       name="delivery_date">
                    @error('delivery_date')
                    <div class="fv-plugins-message-container invalid-feedback">
                       {{ $message }}
                    </div>
                    @enderror
                 </div>


            <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                <span class="required">وصف الموقغ</span>
                </label>
                <!--end::Label-->
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                @error('description')
                <div class="fv-plugins-message-container invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>

            <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                <span class="required">عنوان الموقغ</span>
                </label>
                <!--end::Label-->
                <textarea class="form-control" name="address" id="" cols="30" rows="10"></textarea>
                @error('address')
                <div class="fv-plugins-message-container invalid-feedback">
                   {{ $message }}
                </div>
                @enderror
             </div>

            </div>
            <div class="col-xl-6">
                {{-- <div v-for="(product,index) in products" :key="index"> --}}

                    <input type="hidden" :value="JSON.stringify(products)" name="products">
                {{-- </div> --}}
                <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <div class="d-flex justify-content-between">
                       <label for="">أضافة المنتجات</label>
                       @error('products')
                       <div class="fv-plugins-message-container invalid-feedback">
                          {{ $message }}
                       </div>
                       @enderror
                       <button type="button" class="btn btn-primary btn-sm" @click="addProduct()">أضافة</button>
                    </div>
                    <div class="row" v-for="(product,index) in productsSelected" :key="index">
                       <div class="col-6">
                           <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                               <label for="">أسم المنتج</label>
                               <multiselect  v-model="productsSelected[index].product" name="name" label="name" placeholder="أختار المنتج"
                                    select-label="أختار المنتج" deselect-label="أضغط لحذف الاختيار"
                                    :options="{{ $products }}" :multiple="false" :taggable="false">
                               </multiselect>
                              
                           </div>
                       </div>
                       <div class="col-4">
                           <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                               <label for="">الكمية</label>
                               <input type="number" v-model="productsSelected[index].qty" class="form-control">
                           </div>
                       </div>
                    </div>

                    
                 </div>
                   <input type="hidden" name="payment_details" :value="JSON.stringify(payemnts)">
                 <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <div class="d-flex justify-content-between">
                       <label for="">تفاصيل الدفعات</label>
                       @error('payment_details')
                       <div class="fv-plugins-message-container invalid-feedback">
                          {{ $message }}
                       </div>
                       @enderror
                       <button type="button" class="btn btn-primary btn-sm" @click="addPayment()">أضافة</button>
                    </div>
                    <div class="row" v-for="(payemnt,index) in payemnts" :key="index">
                       <div class="col-6">
                           <div class="form-group">
                               <label for="">المبلغ</label>
                                <input type="number" class="form-control" v-model="payemnt.amount" required>
                                
                           </div>
                       </div>
                       <div class="col-4">
                           <div class="form-group">
                               <label for="">تاريخ الدفعه</label>
                               <input type="date" class="form-control" v-model="payemnt.payment_received_date" required>
                              
                           </div>
                       </div>
                    </div>

                    
                 </div>
            </div>
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

@endsection

@section('scripts')

<script>
    new Vue({
        el:"#app",
        components: {
                Multiselect: window.VueMultiselect.default,
            },

            computed:{
                products(){
                    return this.productsSelected.map((item) => {
                        return {
                            id:item.product.id,
                            qty:item.qty,
                            status:item.status
                        };
                    })
                }
            },
            data:{
                customer:"",
                product:null,
                productsSelected:[],
                payemnts:[]
            },

            methods:{
                addProduct(){
               this.productsSelected.push({
                 qty:"",
                 product:"",
                 status:"pending",
               })
            },
            addPayment(){
                this.payemnts.push({
                    amount:"",
                    payment_received_date:""
                })
            }
            }
        
    })
</script>

@endsection