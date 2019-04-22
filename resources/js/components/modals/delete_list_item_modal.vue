<template>
  <div class="modal fade" :id="'delete_list_item_modal-'+task.id" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form novalidate id="new_task_form" @submit.prevent="submit">
          <div class="modal-header">
            <h5 class="modal-title">Delete Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="alert alert-danger">
                  Are you sure you want to delete this task?
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
      task: {
          type: Object,
          required: true
      }
  },
  methods: {
    submit () {
      axios.delete(`/list_items/${this.task.id}`).then((response) => {
        $('#delete_list_item_modal-'+this.task.id).modal('hide')
        this.$parent.$emit('refreshRecords', response)
      }).catch((error) => {
        console.log(error)
      })
    },
  },
};
</script>

<style>
</style>
