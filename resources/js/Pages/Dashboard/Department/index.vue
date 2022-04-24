<template>
   <div class="col-12">
      <div class="card shadow-sm">
         <div class="card-header">
            <h2 class="card-title">الاقسام</h2>
            <Link href="/departments/create" class="btn btn-primary btn-sm">أنشاء قسم جديد</Link>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr class="fw-bolder fs-6 text-gray-800">
                        <th>الاسم</th>
                        <th>التحكم</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr v-for="department in departments" :key="department.id">
                        <td>
                           {{ department.name }}
                        </td>
                        <td>
                           <button class="btn btn-success"  @click="edit(department)">تعديل</button>
                           <button class="btn btn-danger" @click="remove(department)">حذف</button>
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
           departments:[]
       },
       methods:{
           edit(department){
               this.$inertia.get(this.route('departments.edit',department.id))
           },
           remove(department){
               department._method = 'DELETE';
               this.$inertia.post(`/departments/${department.id}/delete`,department)
           }
       }
   }
</script>