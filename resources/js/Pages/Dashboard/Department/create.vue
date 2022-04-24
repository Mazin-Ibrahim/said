<template>
   <div class="col-12">
      <div class="card shadow-sm">
         <div class="card-header">
            <h3 class="card-title">الاقسام</h3>
         </div>
         <div class="card-body">
            <div class="col-7">
               <div class="form-group">
                  <label for="name">أسم القسم</label>
                  <input type="text" class="form-control" id="name" v-model="form.name">
                  <span v-if="errors.name" class="text-danger mt-2">{{ errors.name }}</span>
               </div>
               <div class="form-group">
                  <button @click="save()" class="btn btn-primary">حفظ</button>
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
           errors:{}
       },
       created(){
           
       },
       data() {
           return {
                form:this.$inertia.form({
                   name:'',
               }),
           }
       },
       methods: {
           save(){
              this.form.post(this.route('departments.store'))
          
           }
       }
   
   }
</script>