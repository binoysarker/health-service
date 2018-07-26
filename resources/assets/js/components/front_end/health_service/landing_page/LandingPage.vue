<template lang="html">
  <div class="columns is-gapless">
    <!-- first column -->
    <div class="coulmn is-4" >
      <!-- get started section -->
      <section class="section">
        <get-started></get-started>
      </section>
      <!-- user feedback section -->
      <section class="section">
        <user-feedback></user-feedback>
      </section>
    </div>

    <!-- second column -->
    <div class="coulmn is-4" >
      <!-- medical tips -->
      <section class="section">
        <medical-tips></medical-tips>
      </section>
    </div>


    <!-- third column -->
    <div class="coulmn is-4 is-narrow">
      <!-- advertisement section -->
      <section class="section">
        <vue-advertisement></vue-advertisement>
      </section>
      <!-- emergency service section -->
      <section  class="section">
        <emergency-service></emergency-service>
      </section>
      <!-- advertisement section -->
      <section class="section">
        <vue-advertisement></vue-advertisement>
      </section>
    </div>

  </div>
</template>

<script>
export default {
}
</script>

<style lang="css">
/**
This is to control the main landing page css part
*/
h1.title{
  color: #797098;
}
strong a{
  color: #84B269;
}
div.hero-body{
  padding-left: 0px;
}
#emergency{
  background-color: #B6B6B6;
}


</style>
