<template>
   <div>
      <div class="card shadow-sm p-12">
         
         <!--begin::Form-->
         <form action=""  @submit.prevent="createInvoice"  id="kt_invoice_form">
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
                                    v-model = "customer"
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
                   <div class="col-lg-12">
                      <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">طريقة الدفع</label>
                       <select v-model="type_of_payment" class="form-control">
                          <option value="cash">كاش</option>
                           <option value="credit">بنكك</option>
                       </select>
                   </div>
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
                        <tr class="border-bottom border-bottom-dashed"  v-for="(invoiceLine,index) in invoiceLines" :key="index">
                           <td class="pe-7"> 
                              <v-Multiselect
                                    
                                    :close-on-select="true"
                                    selectLabel="أختار المنتج"
                                    deselectLabel="أضغط لحذف الاختيار"
                                    placeholder=""
                                    v-model="invoiceLines[index]"
                                    label="name"
                                    :options="products"
                                   
                                    @input="selectProduct($event,index)"
                                >
                                </v-Multiselect>
                              <!-- <input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description"> -->
                           </td>
                           <td class="ps-0">
                              <input class="form-control form-control-solid" type="number" min="1" placeholder="1" value="1" @change="updateQty($event,index)">
                           </td>
                           <td>
                              <input type="text" class="form-control form-control-solid text-end"  placeholder="0.00"  readonly :value="invoiceLines[index].sell_price">
                           </td>
                           <td class="pt-8 text-end text-nowrap">$
                              <span >{{ invoiceLines[index].productQty * invoiceLines[index].sell_price }}</span>
                             
                           </td>
                           <td class="pt-5 text-end">
                              <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" @click="deleteInvoiceLine(index)" >
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
                              <button type="button" class="btn btn-info py-1" @click="addInvoiceLine()">أضافة منتج جديد</button>
                           </th>
                         
                           
                        </tr>
                        <tr  class="align-top fw-bolder text-gray-700">
                           <th></th>
                           <th colspan="2" class="fs-4 ps-0">
                              الخصم
                           </th>
                           <th>
                              <input class="form-control" type="text" placeholder="أدخل الخصم" v-model="discount">
                           </th>
                        </tr>
                        <tr class="align-top fw-bolder text-gray-700">
                           <th></th>
                           <th colspan="2" class="fs-4 ps-0">الاجمالي الكلي</th>
                           <th colspan="2" class="text-end fs-4 text-nowrap">$
                              <span>{{ totalPrice }}</span>
                           </th>

                          
                        </tr>
                     </tfoot>
                     <!--end::Table foot-->
                  </table>
               </div>
               <!--end::Table-->
               <!--begin::Item template-->
               
               
               <!--end::Item template-->
               <!--begin::Notes-->
              
               <!--end::Notes-->
            </div>
            <!--end::Wrapper-->
            <button type="submit" class="btn btn-primary">أرسال</button>
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
         products:[],
         customers:[],
      },

      computed:{
         totalPrice() {  let total = 0;  
         for(let totalInvoice of this.invoiceLines) {
                total += (totalInvoice.sell_price * totalInvoice.productQty);  
                }  
         this.total = total;
         this.total_after_discount = total - this.discount;
         return this.total_after_discount
         }
      },
      data(){
         return{
            invoiceLines:[],
            productsSelected:[],
            discount:0,
            customer:null,
            total:null,
            total_after_discount:0,
            type_of_payment:null
            
         }
      },
      methods:{
         createInvoice(){
          
           let data  = new FormData
           data.append('discount', this.discount)
           data.append('customer_id', this.customer.id)
           data.append('total', this.total)
           data.append('total_after_discount', this.total_after_discount)
           data.append('type_of_payment', this.type_of_payment)
         

            let lastInvoiceLines = this.invoiceLines.map( function(item) {     
                         return  { 
                                       "product_id" : item.id,
                                       "qty" : item.productQty
                                };
     
                         });
           for (let i = 0; i < lastInvoiceLines.length; i++) {
               for (let key of Object.keys(lastInvoiceLines[i])) {
                  data.append(`invoce_items[${i}][${key}]`,lastInvoiceLines[i][key]);
               }
           }
            this.$inertia.post("/invoices", data);
         },
         addInvoiceLine(){
            this.invoiceLines.push(
            {
             
              sell_price:null,
              product_id:null,
              productQty:1
              
            }
            )
         },
         deleteInvoiceLine(index){
            this.invoiceLines.splice(index,1);
         },
         selectProduct(product,index){
           this.invoiceLines[index].sell_price = product.sell_price;
         },
         updateQty(event,index){
            
            this.invoiceLines[index].productQty = event.target.value
         },

         
      }
   }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>