<template lang="html">
    <nav class="navbar">
   <div class="navbar-brand">
     <a class="navbar-item" href="https://bulma.io">
       <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
     </a>
     <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
       <span></span>
       <span></span>
       <span></span>
     </div>
   </div>

   <div id="navbarExampleTransparentExample" class="navbar-menu">
     <div class="navbar-start">
       <a class="navbar-item" href="">
         <i class="fas fa-comment"></i> Chat with a doctor
       </a>
       <a class="navbar-item" href="/documentation/overview/start/">
         <i class="fas fa-cart-plus" aria-hidden="true"></i> Order Medicnes
       </a>
       <a class="navbar-item" href="/documentation/overview/start/">
         <i class="fas fa-book" aria-hidden="true"></i> View medical records
       </a>
       <a class="navbar-item" href="">
         <i class="fas fa-flask" aria-hidden="true"></i> Book Tests
       </a>
       <a class="navbar-item" href="">
         <i class="fas fa-book-open" aria-hidden="true"></i> Read articles
       </a>
       <a class="navbar-item" href="">
         <i class="fas fa-briefcase" aria-hidden="true"></i> For health care providers
       </a>
       <div class="navbar-item has-dropdown is-hoverable">
         <a class="navbar-link" href="/documentation/overview/start/">
           <i class="fas fa-cart-plus" aria-hidden="true"></i> Order Medicnes
         </a>
         <div class="navbar-dropdown is-boxed">
           <a class="navbar-item" href="/documentation/overview/start/">
             <i class="fas fa-book" aria-hidden="true"></i> View medical records
           </a>
           <a class="navbar-item" href="">
             <i class="fas fa-flask" aria-hidden="true"></i> Book Tests
           </a>
           <a class="navbar-item" href="">
             <i class="fas fa-book-open" aria-hidden="true"></i> Read articles
           </a>
           <a class="navbar-item" href="">
             <i class="fas fa-briefcase" aria-hidden="true"></i> For health care providers
           </a>

         </div>
       </div>
     </div>

     <div class="navbar-end">
       <div class="navbar-item">
         <div class="field is-grouped">
           <p class="control">
             <a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="https://twitter.com/intent/tweet?text=Bulma: a modern CSS framework based on Flexbox&amp;hashtags=bulmaio&amp;url=http://localhost:4000&amp;via=jgthms">
               <span class="icon">
                 <i class="fab fa-twitter"></i>
               </span>
               <span>
                 Tweet
               </span>
             </a>
           </p>
           <p class="control">
             <a class="button is-primary" href="https://github.com/jgthms/bulma/releases/download/0.7.1/bulma-0.7.1.zip">
               <span class="icon">
                 <i class="fas fa-download"></i>
               </span>
               <span>Download</span>
             </a>
           </p>
         </div>
       </div>
     </div>
   </div>
 </nav>
</template>

<script>
export default {
}
</script>

<style lang="css">
nav.navbar{
  background-color: #2B2F64;
}
a.navbar-item, a.navbar-link{
  color: white;
  background-color: #2B2F64 !important;
}

div.navbar-dropdown{
  background-color: #2B2F64;
}
div.navbar-dropdown a.navbar-item:hover{
  color: #3290DC;
}
</style>
