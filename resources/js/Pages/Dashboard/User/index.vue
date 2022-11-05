<template>
    <div class="col-12">
       <div class="card shadow-sm">
          <div class="card-header">
             <h2 class="card-title">المستخدمين</h2>
             <Link href="/users/create" class="btn btn-primary btn-sm">أنشاء مستخدم </Link>
          </div>
          <div class="card-body">
             <div class="table-responsive">
                <table class="table">
                   <thead>
                      <tr class="fw-bolder fs-6 text-gray-800">
                         <th>اسم المستخدم</th>
                         <th>رقم الهاتف</th>
                         <th>الدور</th>
                      </tr>
                   </thead>
                   <tbody>
                      <tr v-for="user in users" :key="user.id">
                         <td>
                            {{ user.name }}
                         </td>
                         <td>
                            {{ user.phone }}
                         </td>
                         <td>
                            {{ getName(user.role) }}
                         </td>
                         <td>
                            <button class="btn btn-success"  @click="edit(user)">تعديل</button>
                            <button class="btn btn-danger" @click="remove(user)">حذف</button>
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
            users:[]
        },
        methods:{
            edit(user){
                this.$inertia.get(this.route('users.edit',user.id))
            },
            remove(user){
                user._method = 'DELETE';
                this.$inertia.post(`/users/${user.id}/delete`,user)
            },
            getName(name){
                if(name == 'stocker') return 'مخزنجي';
                if(name == 'sub-admin') return 'مدير اقل';
                if(name == 'expense') return 'صارف';

                return 'مدير';
            }
        }
    }
 </script>