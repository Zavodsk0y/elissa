<template>
  <div>
    <p>Processing...</p>
  </div>
</template>

<script>
export default {
  created() {
    this.processToken();
  },
  methods: {
    getQueryParams() {
      const params = {};
      const queryString = window.location.search.substring(1);
      const regex = /([^&=]+)=([^&]*)/g;
      let m;
      while (m = regex.exec(queryString)) {
        params[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
      }
      return params;
    },
    processToken() {
      const params = this.getQueryParams();
      const token = params.token;

      if (token) {
        localStorage.setItem('token', token);
        this.$router.push('/');
      } else {
        const errorMessage = params.message || 'No token found in query parameters';
        console.error(errorMessage);
        alert(errorMessage);
        this.$router.push('/login');
      }
    }
  }
}
</script>