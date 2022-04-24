<template>
   <div class="col-12">
      <div class="card shadow-sm">
         <div class="card-header">
            <h3 class="card-title">الفنيين</h3>
         </div>
         <div class="card-body">
            <div class="col-7">
               <div class="form-group">
                  <label for="name">أسم الفني</label>
                  <input type="text" class="form-control" id="name" v-model="form.name">
                  <span v-if="errors.name" class="text-danger mt-2">{{ errors.name }}</span>
               </div>

                <div class="form-group">
                  <label for="name">رقم الهاتف</label>
                  <input type="text" class="form-control" id="name" v-model="form.phone">
                  <span v-if="errors.phone" class="text-danger mt-2">{{ errors.phone }}</span>
               </div>


                <div class="form-group">
                  <label for="name">المرتب</label>
                  <input type="number" class="form-control" id="name" v-model="form.salary">
                  <span v-if="errors.salary" class="text-danger mt-2">{{ errors.salary }}</span>
               </div>

                <div class="form-group">
                  <label for="name">القسم</label>
                    <select class="form-control" v-model="form.department_id">
                         <option value="">اختر القسم</option>
                         <option v-for="department in departments" :value="department.id" :key="department.id">{{ department.name }}</option>
                    </select>
                  <span v-if="errors.department_id" class="text-danger mt-2">{{ errors.department_id }}</span>
               </div>
               <div class="form-group">
                   <label for="">العنوان</label>
                <textarea name="" id="" cols="30" rows="10" v-model="form.description" class="form-control"></textarea>
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
           errors:{},
            departments:[]
       },
       created(){
           
       },
       data() {
           return {
                form:this.$inertia.form({
                   name:'',
                  phone:'',
                  salary:'',
                  department_id:'',
                  description:''
               }),
           }
       },
       methods: {
           save(){
              this.form.post(this.route('workers.store'))
          
           }
       }
   
   }
</script>