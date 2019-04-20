<template>
  <div class="card">
      <div class="card-header">List Items</div>

      <div class="card-body">
        <table class="table">
          <tbody>
            <tr v-for="(item, index) in listItems" :key="index">
              <td>{{ item.description }}</td>
              <td>
                <span v-if="!item.completed" class="badge badge-danger">Not Complete</span>
                <span v-if="item.completed" class="badge badge-success">Complete</span>
              </td>
              <td>{{ item.created_at | moment('LL') }}</td>
            </tr>
          </tbody>
        </table>
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
  methods: {
    records () {
      axios.get(`/list_items`).then((response) => {
        this.listItems = response.data.data
      })
    }
  }
};
</script>
