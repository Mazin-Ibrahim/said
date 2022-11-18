<template>
   <div class="col-12">
      <div class="card shadow-sm">
         <div class="card-header">
            <h2 class="card-title">المنتجات</h2>
            <Link href="/products/create" class="btn btn-primary btn-sm">أنشاء منتج جديد</Link>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr class="fw-bolder fs-6 text-gray-800">
                        <th>أسم المنتج</th>
                        <th>الصنف</th>
                        <th>سعر الشراء</th>
                        <th>سعر البيع</th>
                        <th>الكمية</th>
                        <th>أقل كمية</th>
                        <th>طريقة البيع</th>
                        <th>التحكم</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr v-for="product in products" :key="product.id">
                        <td>
                           {{ product.name }}
                        </td>
                        <td>
                           {{ product.category.name }}
                        </td>
                        <td>
                           {{ product.buy_price}}
                        </td>
                        <td>
                           {{ product.sell_price}}
                        </td>
                        <td>
                           {{ product.qty}}
                        </td>
                        <td>
                           {{ product.danger_amount}}
                        </td>
                        <td>
                           {{ product.selling_method.name}}
                        </td>
                        <td>
                           <button class="btn btn-success"  @click="edit(product)">تعديل</button>
                           <!-- <button class="btn btn-danger" @click="remove(product)">حذف</button> -->
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
   export default {
       components:{
           Link
       },
       layout: Layout,
       props:{
           products:[]
       },
       methods:{
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