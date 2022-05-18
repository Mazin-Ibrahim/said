<template>
   <div class="col-12">
      <!-- modal -->
        <Modal>
           Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ratione eum est quae voluptatem et. In doloremque veritatis, consequatur, quidem laborum dolorum ipsam et labore, officia dolores ut rerum atque?
         </Modal>
      <!-- end modal -->
      <div class="card shadow-sm">
         <div class="card-header">
            <h2 class="card-title">الفواتير</h2>
            <Link href="/invoices/create" class="btn btn-primary btn-sm">أنشاء فاتورة جديد</Link>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr class="fw-bolder fs-6 text-gray-800">
                        <th>أسم العميل</th>
                        <th>رقم الهاتف</th>
                        <th>الاجمالي</th>
                        <th>الخصم </th>
                        <th>الاجمالي بعد الخصم</th>
                        <th>طريقة الدفع</th>
                        <th>التحكم</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr v-for="invoice in invoices" :key="invoice.id">
                        <td>
                           {{ invoice.customer.name }}
                        </td>
                        <td>
                           {{ invoice.customer.phone }}
                        </td>
                        <td>
                           {{ invoice.total}}
                        </td>
                        <td>
                           {{ invoice.discount}}
                        </td>
                        <td>
                           {{ invoice.total_after_discount}}
                        </td>
                        <td>
                           {{ typeOfPayment(invoice.type_of_payment)}}
                        </td>
                        <td>
                           <button class="btn btn-success"  @click="edit(invoice)">تعديل</button>
                           <button class="btn btn-info" @click="invoiceInfo(invoice)">التفاصيل</button>
                           <button class="btn btn-danger" @click="remove(invoice)">حذف</button>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</template>
<script>
   import { Link } from '@inertiajs/inertia-vue'
   import Layout from "../../shared/layout";
   import Modal from "../../shared/modal";
   export default {
       components:{
           Link,
           Modal
       },
       layout: Layout,
       props:{
           invoices:[]
       },
    
       methods:{
           typeOfPayment(value){
               if(value == 'cash') return 'كاش';
               return 'بنكك'
           },
           invoiceInfo(invoice){
               
           },
           edit(product){
               this.$inertia.get(this.route('products.edit',product.id))
           },
           remove(product){
               product._method = 'DELETE';
               this.$inertia.post(`/products/${product.id}/delete`,product)
           }
       }
   }
</script>