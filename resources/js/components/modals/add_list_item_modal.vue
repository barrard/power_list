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
                <div class="invalid-feedback">Please enter the name for your task.</div>
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
  data() {
    return {
      formData: {},
      formErrors: []
    };
  },
  methods: {
    submit () {
      axios.post('/list_items', this.formData).then((response) => {
        this.formData = {}
        $('#add_list_item_modal').modal('hide')
        this.$parent.$emit('refreshRecords', response)
      }).catch((error) => {
        this.formErrors = error.response.data.errors
      })
    },
    // async submit_new_task(e) {
    //   // e.preventDefault()
    //   console.log("do it");
    //   var form = document.getElementById("new_task_form");
    //   try {
    //     if (form.checkValidity() === false) {
    //       e.preventDefault();
    //       e.stopPropagation();
    //     }
    //     form.classList.add("was-validated");
    //     e.preventDefault();
    //     console.log(`posting ${this.name}`);
    //     let resp = await axios.post("/list_items", {
    //       description: 'test', 
    //     });
    //     console.log(resp);
    //   } catch (err) {
    //     console.log("err");
    //     console.log(err);
    //   }
    // }
  },
};
</script>

<style>
</style>
