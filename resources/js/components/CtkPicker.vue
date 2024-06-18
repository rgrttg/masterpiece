<!-- Datepicker Komponente mit einer Auswahl der Tage.
Beim ersten Aufruf soll schon der heutige Tag ausgewählt sein. -->

<template>
  <div id="picker-card">
    <h2>
      Bitte wähle einen Tag und eine Zeit aus:
    </h2>
    <!-- TODO: Header ausblenden -->
    <vue-ctk-date-time-picker v-model="wunschTermin" 
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
    <!-- Auf 1 Zeile Text und Button anzeigen -->
    <div class="fuss">
      <div id="links">
        <h3>
          Du hast den Termin am {{ wunschTermin }} gewählt.
        </h3>
      </div>
      <div id="rechts">
        <button @click="alert('Termin gebucht!')">Weiter</button>
      </div>
    </div>
  </div>
</template>

<script>
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker'
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css'
import { ref } from 'vue'

export default {
  components: {
    VueCtkDateTimePicker
  },
  props: {
    inline: { type: Boolean, default: true },
    format: { type: String, default: 'DD-MM-YYYY HH:mm' },
    color: { type: String, default: 'var(--dunkelgrün)' },
    buttonColor: { type: String, default: 'var(--dunkelgrün)' },
    minuteInterval: { type: Number, default: 15 },
    minDate: { type: String, default: '2024-06-12' },
    maxDate: { type: String, default: '2024-12-28' },
    noWeekendsDays: { type: Boolean, default: true },
    firstDayOfWeek: { type: Number, default: 1 },
    disabledHours: { type: Array, default: () => ['00','01','02','03','04','05','06','07','08','18','19','20','21','22','23'] },
  },
  setup() {
    // Beim ersten Aufruf soll schon der heutige Tag ausgewählt sein.
    const today = new Date()
    const wunschTermin = ref(today)

    return {
      wunschTermin
    }
  }
}
</script>

<style scoped>
  #picker-card {
    width: 800px;
    margin: 10px auto;
  }

  :deep(.header-picker) {
    background-color: var(--dunkelgrün) !important;
  }  
  :deep(.time-picker-column-item.active .time-picker-column-item-effect),
  :deep(.datepicker-container .datepicker-days .datepicker-day.selected .datepicker-day-effect) {
    background-color: var(--gelb) !important;
  }  

  .fuss {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-around;
    align-items: center;
    /* background-color: var(--hellgrün); */
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