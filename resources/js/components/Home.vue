<template>
  <div class="card">
      <div class="card-header">
        Home
        <button v-if="filteredRecords.length > 0 && filteredRecords.length < 5" class="btn btn-sm btn-secondary float-right" data-toggle="modal" data-target="#add_list_item_modal"><i class="fa fa-plus"></i> Add Item</button>
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
                  <button v-if="!item.completed" class="btn btn-sm btn-success" @click.prevent="markComplete(item)"><i class="fa fa-check"></i></button>
                  <button class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></button>
                  <button class="btn btn-sm btn-danger" @click.prevent="showDeleteModal(item)"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
      </div>
      <div class="card text-center" v-else>
        <div class="card-body">
          <h5 class="card-title">You haven't added any list items today</h5>
          <p class="card-text">To get started, click the button below and fill out the form.</p>
          <button class="btn btn-primary" data-toggle="modal" data-target="#add_list_item_modal">Add List Item</button>
        </div>
      </div>
      <add-list-item-modal />
      <delete-list-item-modal :task="task" />
  </div>
</template>

<script>
import addListItemModal from './modals/add_list_item_modal.vue'
import deleteListItemModal from './modals/delete_list_item_modal.vue'

export default {
  data () {
    return {
      task: {},
      listItems: [],
    }
  },
  components:{
    addListItemModal,
    deleteListItemModal
  },
  created () {
    this.records()
    this.$on('refreshRecords', () => {
      this.records()
    })
  },
  watch: {
    task: (newValue, oldValue) => {
      $('#delete_list_item_modal-'+oldValue.id).modal('show')
    }
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
    },
    showDeleteModal (task) {
      this.task = task
      $('#delete_list_item_modal-'+task.id).modal('show')
    },
    markComplete (task) {
      let data = Object.assign(task, {'completed': true})

      axios.put(`/list_items/${task.id}`, data)
    }
  }
};
</script>
