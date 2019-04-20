<template>
  <div class="card">
      <div class="card-header">
        Home
        <button class="btn btn-sm btn-secondary float-right"><i class="fa fa-plus"></i> Add Item</button>
      </div>

      <div class="card-body">
          <full-calendar 
            :events="events"
            :config="config"></full-calendar>
      </div>
  </div>
</template>

<script>
import 'fullcalendar/dist/fullcalendar.css'

export default {
  data() {
    return {
      config: {
        defaultView: 'month',
        editable: false,
        height: 700
      },
      events: [
        {
            title  : 'Item 1',
            start  : '2019-04-19',
            textEscape: false
        },
        {
            title  : 'Item 2',
            start  : '2019-04-19',
        },
        {
            title  : 'Item 3',
            start  : '2019-04-19',
        },
        {
            title  : 'Item 4',
            start  : '2019-04-19',
        },
        {
            title  : 'Item 5',
            start  : '2019-04-19',
        },
      ]
    }
  }
};
</script>
