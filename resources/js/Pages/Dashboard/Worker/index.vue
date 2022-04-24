<template>
   <div class="col-12">
      <div class="card shadow-sm">
         <div class="card-header">
            <h2 class="card-title">الفنيين</h2>
            <Link href="/workers/create" class="btn btn-primary btn-sm">أنشاء فني جديد</Link>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr class="fw-bolder fs-6 text-gray-800">
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>
                        <th>المرتب</th>
                        <th>القسم</th>
                        <th>التحكم</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr v-for="worker in workers" :key="worker.id">
                        <td>{{ worker.name }}</td>
                        <td>{{ worker.phone }}</td>
                        <td>{{ worker.salary }}</td>
                        <td>{{ worker.department.name }}</td>
                        <td>
                           <button class="btn btn-success"  @click="edit(worker)">تعديل</button>
                           <button class="btn btn-danger" @click="remove(worker)">حذف</button>
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
           workers:[]
       },
       methods:{
           edit(worker){
               this.$inertia.get(this.route('workers.edit',worker.id))
           },
           remove(worker){
               worker._method = 'DELETE';
               this.$inertia.post(`/workers/${worker.id}/delete`,worker)
           }
       }
   }
</script>