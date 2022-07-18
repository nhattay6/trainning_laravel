<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>
            <button @click="clickBtn()"><h1>Click Here!!!</h1></button>
          <div class="card-body">I'm an example component.</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  method: {
    clickBtn() {
      this.$router.push('/user/dashboard')
    }
  }
};
</script>
