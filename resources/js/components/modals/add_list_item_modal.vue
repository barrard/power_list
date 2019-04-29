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
              <input
                type="text"
                class="form-control"
                :class="{ 'is-invalid' : formErrors.description }"
                @keyup="formErrors = []"
                aria-describedby="descriptionHelp"
                placeholder="Enter A Task"
                v-model="formData.description"
                required
              >
              <div
                class="invalid-feedback"
                v-if="formErrors.description"
              >{{formErrors.description[0]}}</div>
            </div>
            <div class="form-group text-center" v-if="listItems.length">OR</div>
            <div class="form-group" v-if="listItems.length">
              <select class="form-control" name="available_tasks" :placeholder="'Select A Task'" v-model="formData.description">
                <option :value="null" disabled>Select A Task</option>
                <option
                  v-for="(item, index) in uniqueListItems"
                  :key="index"
                  :value="item"
                >{{item}}</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
              @click="clear_form"
            >Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from "vue";

export default {
  props: ["listItems"],
  data() {
    return {
      formData: {
        description: null
      },
      formErrors: []
    };
  },
  watch: {
    selected_task: function(val) {
      this.formData.description = val;
    }
  },
  computed: {
    uniqueListItems () {
      return new Set(this.listItems.map(item => item.description));
    }
  },
  methods: {
    clear_form() {
      this.formData = {
        description: null
      };
      this.formErrors = [];
    },
    submit() {
      axios
        .post("/list_items", this.formData)
        .then(response => {
          this.formData = {};
          $("#add_list_item_modal").modal("hide");
          this.$parent.$emit("refreshRecords", response);
        })
        .catch(error => {
          this.formErrors = error.response.data.errors;
        });
    }
  }
};
</script>

<style>
</style>
