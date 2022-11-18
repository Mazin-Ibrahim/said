<template lang="">
   
</template>
<script>
export default {
    props:{
        message:''
    },
    created(){
        if(this.message){
           swal({
         
            text: `${this.message}`,
            icon: "success",
            });
        }
       
    }
}
</script>
<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity .5s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>