<template>
    <div class="col-12">
       <div class="card shadow-sm">
          <div class="card-header">
             <h2 class="card-title">المواقع</h2>
             <Link href="/locations/create" class="btn btn-primary btn-sm">أنشاء موقع جديد</Link>
          </div>
          <div class="card-body">
             <div class="table-responsive">
                <table class="table">
                   <thead>
                      <tr class="fw-bolder fs-6 text-gray-800">
                         <th>أسم الموقع</th>
                         <th>أسم العميل</th>
                         <th>تاريخ الاستلام</th>
                         <th>تاريخ التسليم</th>
                         <th>قيمة العقد</th>
                         <th>العنوان</th>
                         <!-- <th>التحكم</th> -->
                      </tr>
                   </thead>
                   <tbody>
                      <tr v-for="location in locations" :key="location.id">
                         <td>{{ location.location_name }}</td>
                         <td >{{ location.customer_name == null ? location.customer.name : location.customer_name}}</td>
                         <td>{{ location.received_date }}</td>
                         <td>{{ location.delivery_date }}</td>
                         <td>{{ location.contract_price }}</td>
                         <td>{{ location.address }}</td>
                         
                         <td>
                            <!-- <button class="btn btn-success"  @click="edit(customer)">تعديل</button>
                            <button class="btn btn-danger" @click="remove(customer)">حذف</button> -->
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
    export default {
        components:{
            Link
        },
        layout: Layout,
        props:{
            locations:[]
        },

        computed:{
            // locations(){
            //     this.locations.map((item) => {
            //         return {
                        
            //         };
            //     })
            // }
        },
        methods:{
            edit(customer){
                this.$inertia.get(this.route('customers.edit',customer.id))
            },
            remove(customer){
                customer._method = 'DELETE';
                this.$inertia.post(`/customers/${customer.id}/delete`,customer)
            }
        }
    }
 </script>