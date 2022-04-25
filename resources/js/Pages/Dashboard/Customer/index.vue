<template>
   <div class="col-12">
      <div class="card shadow-sm">
         <div class="card-header">
            <h2 class="card-title">العملاء</h2>
            <Link href="/customers/create" class="btn btn-primary btn-sm">أنشاء عميل جديد</Link>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr class="fw-bolder fs-6 text-gray-800">
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>
                        <th>العنوان</th>
                        <th>التحكم</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr v-for="customer in customers" :key="customer.id">
                        <td>{{ customer.name }}</td>
                        <td>{{ customer.phone }}</td>
                        <td>{{ customer.address }}</td>
                        
                        <td>
                           <button class="btn btn-success"  @click="edit(customer)">تعديل</button>
                           <button class="btn btn-danger" @click="remove(customer)">حذف</button>
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
           customers:[]
       },
       methods:{
           edit(customer){
               this.$inertia.get(this.route('customers.edit',customer.id))
           },
           remove(customer){
               customer._method = 'DELETE';
               this.$inertia.post(`/customers/${customer.id}/delete`,customer)
           }
       }
   }
</script>