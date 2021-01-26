<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Edit book #{{ book.id }}</h5>
          <div class="card-body">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input v-model="book.name" type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
              <label for="author" class="form-label">Author</label>
              <input v-model="book.author" type="text" class="form-control" id="author">
            </div>
            <div class="mb-3">
              <label for="publishing-house" class="form-label">Publishing House</label>
              <input v-model="book.publishing_house" type="text" class="form-control" id="publishing-house">
            </div>
            <div class="mb-4">
              <label for="year" class="form-label">Year</label>
              <input v-model="book.year" @keyup.enter="save" type="number" class="form-control" id="year">
            </div>
            
            <button @click="save" class="btn btn-outline-primary btn-lg btn-block">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  async asyncData({$axios, params}) {
    const book = await $axios.$get('book/' + params.id);
    return { book };
  },
  methods: {
    save() {
      this.$axios.put('book', this.book)
        .then(resp => {
          this.$router.push('/book/list');
        })
    }
  }
}
</script>

<style>

</style>