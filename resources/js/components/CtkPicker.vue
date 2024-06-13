<script>
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
import { ref } from 'vue';

export default {
  components: {
    VueCtkDateTimePicker
  },
  props: {
    inline: { type: Boolean, default: true },
    format: { type: String, default: 'DD-MM-YYYY HH:mm' },
    color: { type: String, default: 'var(--dunkelgrün)' },
    buttonColor: { type: String, default: 'var(--dunkelgrün)' },
    minuteInterval: { type: Number, default: 10 },
    minDate: { type: String, default: '2024-06-12' },
    maxDate: { type: String, default: '2024-12-28' },
    noWeekendsDays: { type: Boolean, default: true },
    firstDayOfWeek: { type: Number, default: 1 },
    disabledHours: { type: Array, default: () => ['00','01','02','03','04','05','06','07','08','18','19','20','21','22','23'] },
  },
  setup() {
    const myValue = ref(null);

    return {
      myValue
    };
  }
}
</script>

<template>
  <div id="breite">
    <h2>Vue-Version</h2>
    <p>Bitte wähle einen Tag und eine Zeit aus:</p>
    <vue-ctk-date-time-picker v-model="myValue" 
      :inline="inline" 
      :format="format"
      :color="color"
      :button-color="buttonColor"
      :minute-interval="minuteInterval"
      :min-date="minDate"
      :max-date="maxDate"
      :no-weekends-days="noWeekendsDays"
      :first-day-of-week="firstDayOfWeek"
      :disabled-hours="disabledHours"  
    />
  </div>
</template>

<style scoped>
:deep(.header-picker) {
  background-color: var(--dunkelgrün) !important;
}
:deep(.time-picker-column-item.active .time-picker-column-item-effect),
:deep(.datepicker-container .datepicker-days .datepicker-day.selected .datepicker-day-effect) {
  background-color: var(--gelb) !important;
}

#breite {
  width: 800px;
  margin: 10px auto;
}

</style>

<!-- /* importiert von https://blog.logrocket.com/comparing-vue-js-date-pickers/ */
::v-deep .header-picker {
  background-color: #082032 !important;
}
::v-deep .time-picker-column-item.active .time-picker-column-item-effect,
::v-deep
  .datepicker-container

  .datepicker-days
  .datepicker-day.selected
  .datepicker-day-effect {
  background-color: var(--gelb) !important;
} -->