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
                    <label for="quantity">أقل كمية لتلقي الاشعار</label>
                    <input type="number" class="form-control" id="qty" v-model="form.danger_amount">
                    <span v-if="errors.danger_amount" class="text-danger mt-2">{{ errors.danger_amount }}</span>
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
                    <label for="category">طرق البيع</label>
                    <select class="form-control" id="category" v-model="form.selling_method_id">
                        <option value="">أختار طريقة البيع</option>
                        <option v-for="sellingMethod in sellingMethods" :value="sellingMethod.id" :key="sellingMethod.id">{{ sellingMethod.name }}</option>
                    </select>
                    <span v-if="errors.selling_method_id" class="text-danger mt-2">{{ errors.selling_method_id }}</span>  
                </div>

                <div class="form-group">
                    <label for="category">الصور</label>
                    <UploadImages uploadMsg="أرفع صور المنتج " @changed="handleImage" />
                    <span v-if="errors.images" class="text-danger mt-2">{{ errors.images }}</span>  
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
   import UploadImages from "vue-upload-drop-images";
   export default {
       layout: Layout,
       components:{
          UploadImages
       },
       props:{
           errors:{},
          categories:[],
          sellingMethods:[]
       },
       created(){
           
       },
       data() {
           return {
               images:[],
                form:this.$inertia.form({
                   name:'',
                   description:'',
                   buy_price:'',
                   sell_price:'',
                   qty:'',
                   category_id:'',
                   danger_amount:'',
                  selling_method_id:''

               }),
           }
       },
       methods: {
           save(){
            //   this.form.post(this.route('categories.store'))
             var data = new FormData();
              for (let i = 0; i < this.images.length; i++) {
                let file = this.images[i];
                data.append("images[" + i + "]", file);
            }
            data.append('name',this.form.name);
            data.append('description',this.form.description);
            data.append('buy_price',this.form.buy_price)
            data.append('sell_price',this.form.sell_price)
            data.append('qty',this.form.qty)
            data.append('category_id',this.form.category_id)
            data.append('selling_method_id',this.form.selling_method_id)
            data.append('danger_amount',this.form.danger_amount)
            this.$inertia.post("/products", data);
          
           },
            handleImage(files) {
            
           
            for (let i = 0; i < files.length; i++) {
                this.images.push(files[i]);
            }
       }
   
   }
   }
</script>

<style scoped>
.imgsPreview .imageHolder .plus[data-v-69bb59a3] {
    color: #2d3748;
    background: #f7fafc;
    border-radius: 50%;
    font-size: 21pt;
    height: 30px;
    width: 30px;
    text-align: center;
    border: 1px dashed;
    line-height: 23px;
    position: absolute;
    left: -42px;
    bottom: 43%;
}
</style>