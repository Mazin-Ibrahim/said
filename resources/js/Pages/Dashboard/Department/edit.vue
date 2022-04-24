<template>
   <div class="col-12">
      <div class="card shadow-sm">
         <div class="card-header">
            <h3 class="card-title">التصنيفات</h3>
         </div>
         <div class="card-body">
            <div class="col-7">
               <div class="form-group">
                  <label for="name">أسم التصنيف</label>
                  <input type="text" class="form-control" id="name" v-model="form.name">
                  <span v-if="errors.name" class="text-danger mt-2">{{ errors.name }}</span>
               </div>
               <div class="form-group">
                  <button @click="update()" class="btn btn-primary">تعديل</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</template>
<script>
   import Layout from "../../shared/layout";
   export default {
       layout: Layout,
       props:{
           errors:{},
           department:{}
       },
       created(){
           
       },
       data() {
           return {
                form:this.$inertia.form({
                   name:this.department.name,
                   _method:'PUT',
               }),
           }
       },
       methods: {
           update(){
              this.$inertia.post(`/departments/${this.department.id}/update`, this.form)
           }
       }
   
   }
</script>