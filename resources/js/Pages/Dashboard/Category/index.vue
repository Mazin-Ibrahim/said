<template>
   <div class="col-12">
      <div class="card shadow-sm">
         <div class="card-header">
            <h2 class="card-title">التصنيفات</h2>
            <Link href="/categories/create" class="btn btn-primary btn-sm">أنشاء تصنيف جديد</Link>
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
                     <tr v-for="category in categories" :key="category.id">
                        <td>
                           {{ category.name }}
                        </td>
                        <td>
                           <button class="btn btn-success"  @click="edit(category)">تعديل</button>
                           <!-- <button class="btn btn-danger" @click="remove(category)">حذف</button> -->
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
   import Pagination from '../../shared/pagination.vue'
   export default {
       components:{
           Link,
           Pagination
       },
       layout: Layout,
       props:{
           categories:[]
       },
       methods:{
           edit(category){
               this.$inertia.get(this.route('categories.edit',category.id))
           },
           remove(category){
               category._method = 'DELETE';
               this.$inertia.post(`/categories/${category.id}/delete`,category)
           }
       }
   }
</script>