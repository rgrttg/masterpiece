<!-- Datepicker Komponente mit einer Auswahl der Tage.
Beim ersten Aufruf soll schon der heutige Tag ausgewählt sein. -->

<script>
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker'
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css'
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

export default {
  components: {
    VueCtkDateTimePicker
  },
  props: {
    inline: { type: Boolean, default: true },
    format: { type: String, default: 'DD.MM.YYYY HH.mm' },
    color: { type: String, default: 'var(--dunkelgrün)' },
    buttonColor: { type: String, default: 'var(--dunkelgrün)' },
    minuteInterval: { type: Number, default: 15 },
    noHeader: { type: Boolean, default: true },
    minDate: { type: String, default: '2024-06-12' },
    maxDate: { type: String, default: '2024-12-28' },
    noWeekendsDays: { type: Boolean, default: true },
    firstDayOfWeek: { type: Number, default: 1 },
    disabledHours: { type: Array, default: () => ['00','01','02','03','04','05','06','07','08','18','19','20','21','22','23'] },
  },
  setup() {
    // Beim ersten Aufruf soll schon der heutige Tag ausgewählt sein.
    // und schon im Format DD.MM.YYYY HH:mm angezeigt werden.
    const today = new Date()
    console.log(today)
    const wunschTermin = ref(today)
    console.log(wunschTermin.value)
    
    // [Vue warn]: inject() can only be used inside setup() or functional components.
    const router = useRouter()
    const response = ref('')

    const handleSubmit = () => {
      console.log("handleSubmit aufgerufen")
      try {
          // console.log(formular.titel)
          // console.log(formular.text)
          response.value = axios.post('/api/new-appointment', { 
            employeeId: 1,
            status: 'Status',
            clientId: 2,
            startTime: wunschTermin.value,
            finishTime: wunschTermin.value,
          })
          router.push('/buchung-details')
      } 
      catch (error) {
          // Do something with the error
          console.log("FEHLERMELDUNG: ")
          console.log(error)
      }
    };
    
    // [Vue warn]: Property "wunschTermin" was accessed during render but is not defined on instance.
    return {
      wunschTermin
    }
  }
}

</script>

<template>
  <div id="picker-card">
    <h2>
      Bitte wähle einen Tag und eine Zeit aus:
    </h2>

    <form action="" method="POST" @submit.prevent="handleSubmit">
      <div>
        <vue-ctk-date-time-picker v-model="wunschTermin" 
        :inline="inline" 
        :format="format"
        :color="color"
        :button-color="buttonColor"
        :minute-interval="minuteInterval"
        :no-header="noHeader"
        :min-date="minDate"
        :max-date="maxDate"
        :no-weekends-days="noWeekendsDays"
        :first-day-of-week="firstDayOfWeek"
        :disabled-hours="disabledHours"  
        />
      </div>
      <!-- Auf einer Zeile Text und Button anzeigen -->
      <!-- TODO: Termin immer im Schweizer Format anzeigen -->
      <div class="fuss">
        <div id="links">
          <h3>
          Du hast den Termin am {{ wunschTermin }} Uhr gewählt.
          </h3>
        </div>
        <div id="rechts">
          <!-- <input type="hidden" name="appointment" v-model="wunschTermin"> -->
          <button type="submit">Weiter</button>
          <!-- <button type="submit" @click="console.log('Button gedrückt!')">Weiter</button> -->
        </div>
      </div>
    </form>
  </div>
</template>

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