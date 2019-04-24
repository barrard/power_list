<template>
  <div class="modal fade" id="add_list_item_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form novalidate id="new_task_form" @submit.prevent="submit">
          <div class="modal-header">
            <h5 class="modal-title">Create a new task.</h5>
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="clear_form">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formData: {},
      formErrors: []
    };
  },
  methods: {
    clear_form(){
      this.formData = {}
      this.formErrors=[]
    },
    submit () {
      axios.post('/list_items', this.formData).then((response) => {
        this.formData = {}
        $('#add_list_item_modal').modal('hide')
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
