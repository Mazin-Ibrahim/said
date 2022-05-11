<template>
   <div>
      <div class="card shadow-sm p-12">
         
         <!--begin::Form-->
         <form action="" @submit.prevent="createInvoice"   id="kt_invoice_form">
            <!--begin::Wrapper-->
          <h1 class="fs-2x fw-bolder text-gray-800">أنشاء فاتورة</h1>
            <!--end::Top-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-10"></div>
            <!--end::Separator-->
            <!--begin::Wrapper-->
            <div class="mb-0">
               <!--begin::Row-->
               <div class="row gx-10 mb-5">
                  <!--begin::Col-->
                  <div class="col-lg-12">
                     <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">أسم العميل</label>
                     <!--begin::Input group-->
                     <div class="mb-5">
                          <v-Multiselect
                                   :close-on-select="true"
                                    selectLabel="أختار العميل"
                                    deselectLabel="أضغط لحذف الاختيار"
                                    placeholder=""
                                    v-model="form.customer_id"
                                    label="name"
                                    :options="customers"
                                ></v-Multiselect>
                     </div>
                     <!--end::Input group-->
                     <!--begin::Input group-->
                    
                     <!--end::Input group-->
                     <!--begin::Input group-->
                    
                     <!--end::Input group-->
                  </div>
                  <!--end::Col-->
                  <!--begin::Col-->
           
                  <!--end::Col-->
               </div>
               <!--end::Row-->
               <!--begin::Table wrapper-->
               <div class="table-responsive mb-10">
                  <!--begin::Table-->
                  <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700">
                     <!--begin::Table head-->
                     <thead>
                        <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                           <th class="min-w-300px w-475px">أسم المنتج</th>
                           <th class="min-w-100px w-100px">الكمية</th>
                           <th class="min-w-150px w-150px">السعر</th>
                           <th class="min-w-100px w-150px text-end">الاجمالي</th>
                           <th class="min-w-75px w-75px text-end">حذف</th>
                        </tr>
                     </thead>
                     <!--end::Table head-->
                     <!--begin::Table body-->
                     <tbody>
                        <tr class="border-bottom border-bottom-dashed" v-for="(d,index) in dynamicFields" :key="index" >
                           <td class="pe-7"> 
                              <v-Multiselect
                                    
                                    :close-on-select="true"
                                    selectLabel="أختار المنتج"
                                    deselectLabel="أضغط لحذف الاختيار"
                                    placeholder=""
                                    v-model="form.product_id"
                                    label="name"
                                    :options="products"
                                >
                                </v-Multiselect>
                              <!-- <input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description"> -->
                           </td>
                           <td class="ps-0">
                              <input class="form-control form-control-solid" type="number" min="1" @change="calcProductTotal($event,index)" placeholder="1" value="1" >
                           </td>
                           <td>
                              <input type="text" class="form-control form-control-solid text-end"  placeholder="0.00"  readonly >
                           </td>
                           <td class="pt-8 text-end text-nowrap">$
                              <span >0.00</span>
                             
                           </td>
                           <td class="pt-5 text-end">
                              <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" @click="deleteItem(index)">
                                 <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                 <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                       <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                       <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                       <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                    </svg>
                                 </span>
                                 <!--end::Svg Icon-->
                              </button>
                           </td>
                        </tr>
                     </tbody>
                     <!--end::Table body-->
                     <!--begin::Table foot-->
                     <tfoot>
                        <tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700">
                           <th class="text-primary">
                              <button class="btn btn-info py-1" @click="addItem()">أضافة منتج جديد</button>
                           </th>
                           <th colspan="2" class="border-bottom border-bottom-dashed ps-0">
                              <div class="d-flex flex-column align-items-start">
                                 <button class="btn btn-link py-1">Add discount</button>0.00
                              </div>
                           </th>
                           <th colspan="2" class="border-bottom border-bottom-dashed text-end">$
                              <span >0.00</span>
                           </th>
                        </tr>
                        <tr class="align-top fw-bolder text-gray-700">
                           <th></th>
                           <th colspan="2" class="fs-4 ps-0">Total</th>
                           <th colspan="2" class="text-end fs-4 text-nowrap">$
                              <span>0.00</span>
                           </th>
                        </tr>
                     </tfoot>
                     <!--end::Table foot-->
                  </table>
               </div>
               <!--end::Table-->
               <!--begin::Item template-->
               <table class="table d-none" >
                  <tbody>
                     <tr class="border-bottom border-bottom-dashed">
                        <td class="pe-7">
                          
                          
                        </td>
                        <td class="ps-0">
                           <input class="form-control form-control-solid" type="number" min="1" name="quantity[]" placeholder="1" >
                        </td>
                        <td>
                           <input type="text" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00">
                        </td>
                        <td class="pt-8 text-end">$
                           <span >0.0220</span>
                        </td>
                        <td class="pt-5 text-end">
                           <button type="button" class="btn btn-sm btn-icon btn-active-color-primary"  >
                              <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                              <span class="svg-icon svg-icon-3">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                 </svg>
                              </span>
                              <!--end::Svg Icon-->
                           </button>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <table class="table d-none" >
                  <tbody>
                     <tr >
                        <th colspan="5" class="text-muted text-center py-10">No items</th>
                     </tr>
                  </tbody>
               </table>
               <!--end::Item template-->
               <!--begin::Notes-->
              
               <!--end::Notes-->
            </div>
            <!--end::Wrapper-->
         </form>
         <!--end::Form-->
      </div>
   </div>
</template>
<script>
   import Layout from "../../shared/layout";
   export default {
       layout: Layout,
       props:{
           errors:{},
           customers:[],
           products:[],
       },
       data(){
           return{
              dynamicFields: [],
              productSelected:[],
              productTotal:0,
              oneProductsTotal:[],
               form:{
                     customer_id:null,
                     product_id:null,
                     qty:null,
                     price:null,
                     total:null,
                     total_after_discount:null,
                     type_of_payment:null,
                   }
           }
   },
  
   methods:{
      createInvoice(){
      
      },
         addItem(){
            this.dynamicFields.push(this.form)
         },
         deleteItem(index){
            this.dynamicFields.splice(index, 1)
         },

    

   },
  
   }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>