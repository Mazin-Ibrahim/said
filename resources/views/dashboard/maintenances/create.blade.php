@extends('layouts.admin')


@section('content')
<div class="card p-10">
    
    <form action="{{ route('maintenances.store') }}" method="POST" id="kt_modal_new_target_form" class="form fv-plugins-bootstrap5 fv-plugins-framework">
        @csrf
        <div class="row" id="app">
            <div class="col-xl-6">
                <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span>أسم الموقع</span>
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
                  <input type="hidden" name="location_id" :value="location.id">
                 <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <input type="hidden" name="customer_id" :value="customer.id">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span>أختار الموقع</span>
                    </label>
                    <!--end::Label-->
                    <multiselect
                                    
                    :close-on-select="true"
                    select-label="أختار الموقع"
                    deselect-label="أضغط لحذف الاختيار"
                    placeholder=""
                    label="location_name"
                    :options="{{ $locations }}"
                    v-model="location"
                    
                >
                </multiselect>
                    
                 </div>

                 <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                    <span>أسم العميل</span>
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
                    <span>أختار العميل</span>
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
                <span class="required">وصف الصيانة</span>
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
                <input type="hidden" name="visits" :value="JSON.stringify(visitsAdded)">
                <!--begin::Label-->
                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                <span>عنوان موقع الصيانة</span>
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
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                       <label for="">الزيارات </label>
                       <button type="button" class="btn btn-primary btn-sm" @click="addVisit()">أضافة</button>
                    </div>
                    <div class="row" v-for="(visit,index) in visits" :key="index">
                       <div class="col-6">
                          <div class="form-group">
                           <label for="">تاريخ الزيارة</label>
                           <input type="date" class="form-control" v-model="visit.date">
                          </div>
                       </div>
                       <div class="col-6">
                           <div class="form-group">
                               <label for="">وصف</label>
                           <input type="text" v-model="visit.description" class="form-control">
                           </div>
                       </div>
                       <div class="col-6">
                           <div class="form-group">
                               <label for="">أختار العامل</label>
                               <multiselect
                                   
                                   :close-on-select="true"
                                   selectLabel="أختار العامل"
                                   deselectLabel="أضغط لحذف الاختيار"
                                   placeholder=""
                                   label="name"
                                   :options="{{ $workers }}"
                                   v-model="visit.worker"
                                   
                               >
                               </multiselect>
                           </div>
                       </div>
                       <div class="col-6">
                          <div class="form-group">
                           <label for="">أسم العامل أذا غير موجود</label>
                         <input type="text" class="form-control" v-model="visit.worker_name">
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
                visitsAdded(){
                    return this.visits.map( function(item) {
                            let worker_id;
                            if(Object.keys(item.worker).length > 0){
                                worker_id = item.worker.id;
                            } else {

                                worker_id = "";     
                            }
                         return  {
                               date:item.date,
                               description:item.description,
                               worker_id:worker_id,
                               worker_name:item.worker_name
                                 };
     
                         });
                }
              },
            
            data:{
                visits:[],
                worker:"",
                location:"",
                customer:""
            },

            methods:{
                addVisit(){
                    this.visits.push({
                    date:"",
                    description:"",
                    worker:"",
                    worker_name:""
                })
                }
            
            }
        
    })
</script>

@endsection