<template>
   <div class="col-12">
      <div class="card shadow-sm">
         <div class="card-header">
            <h3 class="card-title">المستخدمين</h3>
         </div>
         <div class="card-body">
            <div class="col-7">
               <div class="form-group">
                  <label for="name">أسم المستخدم</label>
                  <input type="text" class="form-control" id="name" v-model="form.name">
                  <span v-if="errors.name" class="text-danger mt-2">{{ errors.name }}</span>
               </div>
               
                <div class="form-group">
                  <label for="name">رقم الهاتف</label>
                  <input type="tel" class="form-control" id="name" v-model="form.phone">
                  <span v-if="errors.phone" class="text-danger mt-2">{{ errors.phone }}</span>
                </div>

                 <div class="form-group">
                  <label for="name">كلمة المرور</label>
                  <input type="password" class="form-control" id="name" v-model="form.password">
                  <span v-if="errors.password" class="text-danger mt-2">{{ errors.password }}</span>
                </div>

                 <div class="form-group">
                    <select class="form-control" id="role" v-model="form.role">
                    <option value="stocker">مخزنجي</option>
                    <option value="sub-admin">مدير أقل</option>
                    <option value="expense">الصارف</option>

                    <span v-if="errors.role" class="text-danger mt-2">{{ errors.role }}</span>
                 </select>
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
                   role:'',
                   password:''
               }),
           }
       },
       methods: {
           save(){
              this.form.post(this.route('users.store'))
          
           }
       }
   
   }
</script>