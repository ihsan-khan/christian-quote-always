<template>
  <div id="main-wrapper">
    <Header />
    
    <router-view></router-view>
    
    <Footer /> 
  </div>
</template>

<script>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
export default {
  components:{
    Header,
    Footer
  }
}
</script>