<template>
   <div class="col-12">
      <div class="card shadow-sm">
         <div class="card-header">
            <h3 class="card-title">المنتجات</h3>
         </div>
         <div class="card-body">
            <div class="col-7">
               <div class="form-group">
                  <label for="name">أسم المنتج</label>
                  <input type="text" class="form-control" id="name" v-model="form.name">
                  <span v-if="errors.name" class="text-danger mt-2">{{ errors.name }}</span>
               </div>
                <div class="form-group">
                    <label for="description">وصف المنتج</label>
                    <textarea class="form-control" id="description" v-model="form.description"></textarea>
                    <span v-if="errors.description" class="text-danger mt-2">{{ errors.description }}</span>
                </div>
                <div class="form-group">
                    <label for="price">سعر الشراء</label>
                    <input type="number" class="form-control" id="buy_price" v-model="form.buy_price">
                    <span v-if="errors.price" class="text-danger mt-2">{{ errors.buy_price }}</span>
                </div>

                 <div class="form-group">
                    <label for="price">سعر البيع</label>
                    <input type="number" class="form-control" id="sell_price" v-model="form.sell_price">
                    <span v-if="errors.price" class="text-danger mt-2">{{ errors.sell_price }}</span>
                </div>
                <div class="form-group">
                    <label for="quantity">الكمية</label>
                    <input type="number" class="form-control" id="qty" v-model="form.qty">
                    <span v-if="errors.qty" class="text-danger mt-2">{{ errors.qty }}</span>
                </div>

                <div class="form-group">
                    <label for="category">الاصناف</label>
                    <select class="form-control" id="category" v-model="form.category_id">
                        <option value="">اختار الصنف</option>
                        <option v-for="category in categories" :value="category.id" :key="category.id">{{ category.name }}</option>
                    </select>
                    <span v-if="errors.category_id" class="text-danger mt-2">{{ errors.category_id }}</span>  
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
          categories:[]
       },
       created(){
           
       },
       data() {
           return {
                form:this.$inertia.form({
                   name:'',
                   description:'',
                   buy_price:'',
                   sell_price:'',
                   qty:'',
                   category_id:''

               }),
           }
       },
       methods: {
           save(){
              this.form.post(this.route('categories.store'))
          
           }
       }
   
   }
</script>