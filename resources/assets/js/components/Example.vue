<template>
  <div >
    <appheader></appheader>
    <router-view />  
    <appfooter></appfooter>
  </div>
</template>

<script>
import Header from './Header.vue';

import Footer from './Footer.vue';
   export default {
       components:{
         appheader:Header,
         
       appfooter:Footer
       }  
   }
</script>