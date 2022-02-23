<template>
  <div id="form">
      <form action="" method="post">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Type your name" v-model="fields.name">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label"></label>
            <input type="text" name="email" id="email" class="form-control" placeholder="type your email" v-model="fields.email">
          </div>
          <div class="mb-3">
            <label for="body" class="form-label">Message</label>
            <input type="text" name="body" id="body" class="form-control" placeholder="type your message" v-model="fields.body">
          </div>
      </form>
  </div>
</template>

<script>
export default {
    data(){
        return{
            fields:{},
        }
    },
    methods: {
  },
}
</script>

<style>

</style>