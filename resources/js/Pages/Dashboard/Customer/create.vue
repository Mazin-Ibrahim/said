<template>
   <div class="col-12">
      <div class="card shadow-sm">
         <div class="card-header">
            <h3 class="card-title">العملاء</h3>
         </div>
         <div class="card-body">
            <div class="col-7">
               <div class="form-group">
                  <label for="name">أسم العميل</label>
                  <input type="text" class="form-control" id="name" v-model="form.name">
                  <span v-if="errors.name" class="text-danger mt-2">{{ errors.name }}</span>
               </div>
               
                <div class="form-group">
                  <label for="name">رقم الهاتف</label>
                  <input type="text" class="form-control" id="name" v-model="form.phone">
                  <span v-if="errors.phone" class="text-danger mt-2">{{ errors.phone }}</span>
                </div>

                  <div class="form-group">
                   <label for="">العنوان</label>
                <textarea name="" id="" cols="30" rows="10" v-model="form.address" class="form-control"> class="form-control"></textarea>
                     <span v-if="errors.address" class="text-danger mt-2">{{ errors.address }}</span>
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
                   phone:'',
                   address:'',
               }),
           }
       },
       methods: {
           save(){
              this.form.post(this.route('customers.store'))
          
           }
       }
   
   }
</script>