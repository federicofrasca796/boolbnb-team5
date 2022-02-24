<template>
  <footer class="d-flex py-3 px-0 px-md-4 border-top mt-4 m-auto">
    <div class="col-md-6 col-9">
      Developed by
      <a href="https://github.com/DoinaGanceriuc">Doina Ganceriuc</a>,
      <a href="https://github.com/ItzArima">Rostyslav Sydorchuk</a>,
      <a href="https://github.com/federicofrasca796">Federico Frascà</a>,
      <a href="https://github.com/VALDEV05">Valerio Corda</a>,
      <a href="https://github.com/rota99C">Chandra Rota</a>
    </div>
    <div class="col-md-6 col-3 text-end d-flex flex-column d-md-inline">
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-brands fa-twitter"></i>
      <i class="fa-brands fa-instagram"></i>
    </div>
  </footer>
</template>

<script>
export default {};
</script>

<style lang="scss">
@import "../../sass/variables";
footer {
  height: 75px;
  width: 85%;
  font-family: $font-family-primary;
  a {
    text-decoration: none;
    color: $bright-navy-blue;
  }
  i {
    font-size: 25px;
    margin-right: 20px;
  }
}
</style>