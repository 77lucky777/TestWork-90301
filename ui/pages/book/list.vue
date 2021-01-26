<template>
  <div class="container">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="m-0">Books</h5>
        <nuxt-link to="/book/add" class="btn btn-sm btn-outline-success">
          Create +
        </nuxt-link>
      </div>
      <table class="card-body table table-striped table-bordered m-0 p-0">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Author</th>
            <th>Publishing House</th>
            <th>Year</th>
            <th>Edit</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(book, key) in books" :key="key">
            <td>{{ book.id }}</td>
            <td>{{ book.name }}</td>
            <td>{{ book.author }}</td>
            <td>{{ book.publishing_house }}</td>
            <td>{{ book.year }}</td>
            <td>
              <nuxt-link :to="'/book/edit/' + book.id" class="btn btn-sm btn-outline-primary">
                <b-icon  icon="pencil-square"></b-icon>
              </nuxt-link>
            </td>
            <td>
              <button @click="remove(book.id)" class="btn btn-sm btn-outline-danger">
                <b-icon icon="trash-fill"></b-icon>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  async asyncData({$axios}) {
    const books = await $axios.$get('book');
    return {books};
  },
  methods: {
    remove(book_id) {
      this.$axios.delete('book/' + book_id)
        .then(resp => {
          this.$router.go();
        })
    }
  }
}
</script>

<style>
.table td, 
.table th {
  text-align: center;
  vertical-align: middle;
}
</style>