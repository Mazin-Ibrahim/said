<template>
    <div class="col-12">
       <div class="card shadow-sm">
          <div class="card-header">
             <h3 class="card-title">المواقع</h3>
          </div>
          <div class="card-body">
               
                <div class="row">
                    <div class="col-5">
                <div class="form-group">
                    <label for="category">أختار أسم العميل أذا كان لديه بيانات</label>
                    <select class="form-control" id="category" v-model="form.customer_id">
                        <option value="">أختار طريقة البيع</option>
                        <option v-for="customer in customers" :value="customer.id" :key="customer.id">{{ customer.name }}</option>
                    </select>
                    <span v-if="errors.customer_id" class="text-danger mt-2">{{ errors.customer_id }}</span>  
                </div>

                <div class="form-group">
                   <label for="name">أسم العميل</label>
                   <input type="text" class="form-control" id="name" v-model="form.customer_name">
                   <span v-if="errors.customer_name" class="text-danger mt-2">{{ errors.customer_name }}</span>
                </div>
                
                 <div class="form-group">
                   <label for="name">أسم الموقع</label>
                   <input type="text" class="form-control" id="name" v-model="form.location_name">
                   <span v-if="errors.location_name" class="text-danger mt-2">{{ errors.location_name }}</span>
                 </div>
                 <div class="form-group">
                   <label for="name">قيمة العقد</label>
                   <input type="number" class="form-control" id="name" v-model="form.contract_price">
                   <span v-if="errors.contract_price" class="text-danger mt-2">{{ errors.contract_price }}</span>
                 </div>

                 <div class="form-group">
                   <label for="name">تاريخ الاستلام</label>
                   <input type="date" class="form-control" id="name" v-model="form.received_date">
                   <span v-if="errors.received_date" class="text-danger mt-2">{{ errors.received_date }}</span>
                 </div>
                 <div class="form-group">
                   <label for="name">تاريخ التسليم</label>
                   <input type="date" class="form-control" id="name" v-model="form.delivery_date">
                   <span v-if="errors.delivery_date" class="text-danger mt-2">{{ errors.delivery_date }}</span>
                 </div>
                 
 
                   <div class="form-group">
                    <label for="">العنوان</label>
                      <textarea name="" id="" cols="30" rows="10" v-model="form.address" class="form-control"> class="form-control"></textarea>
                      <span v-if="errors.address" class="text-danger mt-2">{{ errors.address }}</span>
                </div>
                   <div class="form-group">
                    <label for="">وصف الموقع</label>
                      <textarea name="" id="" cols="30" rows="10" v-model="form.description" class="form-control"></textarea>
                      <span v-if="errors.description" class="text-danger mt-2">{{ errors.description }}</span>
                </div>
                <div class="form-group">
                   <button @click="save()" class="btn btn-primary">حفظ</button>
                </div>
             </div>


               <div class="col-7">
                  <div class="form-group">
                     <div class="d-flex justify-content-between">
                        <label for="">أضافة المنتجات</label>
                        <button class="btn btn-primary btn-sm" @click="addProduct()">أضافة</button>
                     </div>
                     <div class="row" v-for="(product,index) in productsSelected" :key="index">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">أسم المنتج</label>
                                <v-Multiselect
                                    
                                    :close-on-select="true"
                                    selectLabel="أختار المنتج"
                                    deselectLabel="أضغط لحذف الاختيار"
                                    placeholder=""
                                    label="name"
                                    :options="products"
                                    v-model="product.product"
                                    
                                    
                                >
                                </v-Multiselect>
                                <span v-if="errors.description" class="text-danger mt-2">{{ errors.description }}</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">الكمية</label>
                                <input type="number" class="form-control" v-model="product.qty">
                            </div>
                        </div>
                     </div>

                     
                  </div>

                  <div class="form-group">
                     <div class="d-flex justify-content-between">
                        <label for="">تفاصيل الدفعات</label>
                        <button class="btn btn-primary btn-sm" @click="addPayment()">أضافة</button>
                     </div>
                     <div class="row" v-for="(payemnt,index) in payemnts" :key="index">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">المبلغ</label>
                                 <input type="number" class="form-control" v-model="payemnt.amount" required>
                                 <!-- <span v-if="errors.payment_details[index].amount" class="text-danger mt-2">{{ errors.payment_details[index].amount }}</span> -->
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">تاريخ الدفعه</label>
                                <input type="date" class="form-control" v-model="payemnt.payment_received_date" required>
                                <!-- <span v-if="errors.payment_details[index].payment_received_date" class="text-danger mt-2">{{ errors.payment_details[index].payment_received_date }}</span> -->
                            </div>
                        </div>
                     </div>

                     
                  </div>
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
            customers:[],
            products:[]
        },
        created(){
            
        },
        data() {
            return {
                productsSelected:[],
                payemnts:[],
                 form:this.$inertia.form(
                    {
	            customer_id:"",
	            customer_name:"",
	            location_name:"",
	         	address: "",
		        contract_price :"",
                description: "",
                received_date : "",
                delivery_date : "",
                products : [],
                payment_details:[]
            }),
            }
        },
        methods: {
            save(){
               
           let data  = new FormData
           data.append('customer_id', this.form.customer_id)
           data.append('customer_name', this.form.customer_name)
           data.append('location_name', this.form.location_name)
           data.append('address', this.form.address)
           data.append('contract_price', this.form.contract_price)
           data.append('description', this.form.description)
           data.append('received_date', this.form.received_date)
           data.append('delivery_date', this.form.delivery_date)
           data.append('delivery_date', this.form.delivery_date)
          
           
         

            let productsSelected = this.productsSelected.map( function(item) {     
                         return  { 
                                       "id" : item.product.id,
                                       "qty" : item.qty,
                                       "status" :item.status
                                };
     
                         });
           for (let i = 0; i < productsSelected.length; i++) {
               for (let key of Object.keys(productsSelected[i])) {
                  data.append(`products[${i}][${key}]`,productsSelected[i][key]);
               }
           }

           for (let i = 0; i < this.payemnts.length; i++) {
               for (let key of Object.keys(this.payemnts[i])) {
                  data.append(`payment_details[${i}][${key}]`,this.payemnts[i][key]);
               }
           }

           
            this.$inertia.post("/locations", data);
           
            },
            addProduct(){
               this.productsSelected.push({
                 qty:"",
                 product:"",
                 status:"pending",
               })
            },
            addPayment(){
                this.payemnts.push({
                    amount:"",
                    payment_received_date:""
                })
            }
        }
    
    }
 </script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>