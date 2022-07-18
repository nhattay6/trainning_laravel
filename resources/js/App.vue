<template>
  <div>
    <!-- <router-link :to="{ name: 'login' }"  class="nav-item nav-link">Login</router-link> -->
    <!-- <router-link to="/user/login"  class="nav-item nav-link">Products</router-link> -->
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App',
};
</script>
