<template>
    <router-view></router-view>
</template>
  
  <script>
  export default {
    name: "App",
    beforeRouteEnter(to, from, next) {
      next((vm) => {
        vm.prevRoute = from;
      });
    },
    methods:{
     
    }
  };
  </script>
