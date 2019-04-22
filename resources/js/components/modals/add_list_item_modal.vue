<template>
  <div class="modal fade" id="add_list_item_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Create a new task.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form novalidate id="new_task_form">
            <div class="form-group">
              <label for="exampleInputEmail1">Task Name</label>
              <input
                type="text"
                class="form-control"
                aria-describedby="emailHelp"
                placeholder="Task Name"
                required
              >
              <div class="invalid-feedback">Please enter the name for your task.</div>
              <small
                id="emailHelp"
                class="form-text text-muted"
              >This is something you want to become habit..</small>
            </div>

            <button @click="submit_new_task" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: ""
    };
  },
  methods: {
    async submit_new_task(e) {
      // e.preventDefault()
      console.log("do it");
      var form = document.getElementById("new_task_form");
      try {
        if (form.checkValidity() === false) {
          e.preventDefault();
          e.stopPropagation();
        }
        form.classList.add("was-validated");
        e.preventDefault();
        console.log(`posting ${this.name}`);
        let resp = await axios.post("/list_items", {
          description: 'test', 
        });
        console.log(resp);
      } catch (err) {
        console.log("err");
        console.log(err);
      }
    }
  },
  mounted() {}
};
</script>

<style>
</style>
