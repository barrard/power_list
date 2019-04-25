<template>
  <div class="modal fade" :id="'edit_list_item_modal-'+formData.id" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form novalidate id="new_task_form" @submit.prevent="submit">
          <div class="modal-header">
            <h5 class="modal-title">Edit Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label for="description">Task Name</label>
                <input
                  type="text"
                  class="form-control"
                  :class="{ 'is-invalid' : formErrors.description }"
                  @keyup="formErrors = []"
                  aria-describedby="descriptionHelp"
                  placeholder="Task Name"
                  v-model="formData.description"
                  required
                >
                <div class="invalid-feedback" v-if="formErrors.description" >{{formErrors.description[0]}}</div>
              </div>
              <div class="form-group">
                  <div class="custom-control custom-checkbox mr-sm-2">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing" v-model="formData.completed">
                    <label class="custom-control-label" for="customControlAutosizing">Completed</label>
                  </div>
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
      formData: {
          type: Object,
          required: true
      }
  },
  data () {
      return {
          formErrors: []
      }
  },
  methods: {
    submit () {
      axios.put(`/list_items/${this.formData.id}`, this.formData).then((response) => {
        $('#edit_list_item_modal-'+this.formData.id).modal('hide')
        this.$parent.$emit('refreshRecords', response)
      }).catch((error) => {
        this.formErrors = error.response.data.errors
      })
    },
  },
};
</script>

<style>
</style>
