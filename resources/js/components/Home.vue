<template>
  <div class="card">
      <div class="card-header">
        Home
        <button v-if="filteredRecords.length > 0 && filteredRecords.length < 5" class="btn btn-sm btn-secondary float-right"><i class="fa fa-plus"></i> Add Item</button>
      </div>

      <div class="card-body" v-if="filteredRecords.length">
          <div class="text-center">
            <h1>Today</h1>
          </div>
          <table class="table table-hover">
            <tbody>
              <tr v-for="(item, index) in filteredRecords" :key="index">
                <td>{{ item.description }}</td>
                <td>
                  <span v-if="!item.completed" class="badge badge-danger">Not Complete</span>
                  <span v-if="item.completed" class="badge badge-success">Complete</span>
                </td>
                <td>{{ item.created_at | moment('LL') }}</td>
                <td class="text-right">
                  <button class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                  <button class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
      <div class="card text-center" v-else>
        <div class="card-body">
          <h5 class="card-title">You haven't added any list items today</h5>
          <p class="card-text">To get started, click the button below and fill out the form.</p>
          <a href="#" class="btn btn-primary">Add List Item</a>
        </div>
      </div>
  </div>
</template>

<script>

export default {
  data () {
    return {
      listItems: []
    }
  },
  created () {
    this.records()
  },
  computed: {
    filteredRecords () {
      return this.listItems.filter((value) => {
        return this.$moment(value.created_at).format('LL') === this.$moment().format('LL') 
      })
    }
  },
  methods: {
    records () {
      axios.get(`/list_items`).then((response) => {
        this.listItems = response.data.data
      })
    }
  }
};
</script>
