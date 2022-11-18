<template>
    <div class="col-12">
       <div class="card shadow-sm">
          <div class="card-header">
             <h3 class="card-title">الصيانات</h3>
          </div>
          <div class="card-body">
              
                <div class="row">
                    <div class="col-5">
                <div class="form-group">
                    <label for="category">أختار أسم العميل أذا كان لديه بيانات</label>
                    <select class="form-control" id="category" v-model="form.customer_id">
                        <option value="">أختار العميل  </option>
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
                    <label for="category">أختار الموقع اذا كان موجود</label>
                    <select class="form-control" id="category" v-model="form.location_id">
                        <option value="">أختار الموقع</option>
                        <option v-for="location in locations" :value="location.id" :key="location.id">{{ location.location_name }}</option>
                    </select>
                    <span v-if="errors.location_id" class="text-danger mt-2">{{ errors.location_id }}</span>  
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
                    <label for="">العنوان</label>
                      <textarea name="" id="" cols="30" rows="10" v-model="form.address" class="form-control"> class="form-control"></textarea>
                      <span v-if="errors.address" class="text-danger mt-2">{{ errors.address }}</span>
                </div>
                   <div class="form-group">
                    <label for="">وصف </label>
                      <textarea name="" id="" cols="30" rows="10" v-model="form.description" class="form-control"> class="form-control"></textarea>
                      <span v-if="errors.description" class="text-danger mt-2">{{ errors.description }}</span>
                </div>
                <div class="form-group">
                   <button @click="save()" class="btn btn-primary">حفظ</button>
                </div>
             </div>


               <div class="col-7">
                 

                  <div class="form-group">
                     <div class="d-flex justify-content-between">
                        <label for="">الزيارات </label>
                        <button class="btn btn-primary btn-sm" @click="addVisit()">أضافة</button>
                     </div>
                     <div class="row" v-for="(visit,index) in visits" :key="index">
                        <div class="col-6">
                           <div class="form-group">
                            <label for="">تاريخ الزيارة</label>
                            <input type="date" class="form-control" v-model="visit.date">
                           </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">وصف</label>
                            <input type="text" name="description" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">أختار العامل</label>
                                <v-Multiselect
                                    
                                    :close-on-select="true"
                                    selectLabel="أختار العامل"
                                    deselectLabel="أضغط لحذف الاختيار"
                                    placeholder=""
                                    label="name"
                                    :options="workers"
                                    v-model="visit.worker"
                                    
                                >
                                </v-Multiselect>
                            </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                            <label for="">أسم العامل أذا غير موجود</label>
                          <input type="text" class="form-control" v-model="visit.worker_name">
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
            locations:[],
            workers:[]
        },
        created(){
            
        },
        data() {
            return {
                
                visits:[],
                 form:this.$inertia.form(
                    {
	            customer_id:"",
	            customer_name:"",
	            location_name:"",
                location_id:"",
	         	address: "",
		        contract_price :"",
                description: ""
            }),
            }
        },
        methods: {
            save(){
               
           let data  = new FormData
           data.append('customer_id', this.form.customer_id)
           data.append('customer_name', this.form.customer_name)
           data.append('location_name', this.form.location_name)
           data.append('location_id', this.form.location_id)
           data.append('address', this.form.address)
           data.append('contract_price', this.form.contract_price)
           data.append('description', this.form.description)
        
          
           
         

            let visits = this.visits.map( function(item) {
                            let worker_id;
                            if(Object.keys(item.worker).length > 0) worker_id = item.worker.id;
                             worker_id = "";     
                         return  {
                               date:item.date,
                               description:item.description,
                               worker_id:worker_id,
                               worker_name:item.worker_name
                };
     
                         });
           

           for (let i = 0; i < visits.length; i++) {
               for (let key of Object.keys(visits[i])) {
                  data.append(`visits[${i}][${key}]`,visits[i][key]);
               }
           }

           
            this.$inertia.post("/maintenances", data);
           
            },
           
            addVisit(){
                this.visits.push({
                    date:"",
                    description:"",
                    worker:"",
                    worker_name:""
                })
            }
        }
    
    }
 </script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>