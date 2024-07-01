<script setup>
import { ref, defineComponent } from 'vue'
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker'
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css'
import { useRouter } from 'vue-router'

defineComponent({
  components: {
    VueCtkDateTimePicker
  },
  props: {
    inline: Boolean,
    format: String,
    color: String,  
    buttonColor: String,
    minuteInterval: Number,
    noHeader: Boolean,
    minDate: String,
    maxDate: String,
    noWeekendsDays: Boolean,
    firstDayOfWeek: Number,
    disabledHours: Array,
  }
})

    // Beim ersten Aufruf soll schon der heutige Tag ausgewählt sein.
    // und schon im Format DD.MM.YYYY HH:mm angezeigt werden.
    // const today = new Date().toLocaleDateString('de-CH')
    const today = new Date().toISOString().slice(0, 10)
    console.log(today)
    const wunschTermin = ref(today)
    console.log(wunschTermin.value)

    const response = ref('')
    // [Vue warn]: inject() can only be used inside setup() or functional components.
    const router = useRouter()



const handleSubmit = async() => {
  console.log("handleSubmit aufgerufen")
  try {
  const startDayTime = wunschTermin.value + ' 12:00:00'
  const finishDayTime = wunschTermin.value + ' 13:00:00'
    alert('Speichere Termin von: ' + startDayTime + ' bis: ' + finishDayTime)
    response.value = axios.post('/api/new-appointment', {
        employeeId: 1,
        status: 'Speichere mit hardcodierter Start und Endzeit',
        clientId: 3,
        startTime: startDayTime,
        finishTime: finishDayTime,
    })
      console.log('Termin wurde abgeschickt: ')
      console.log(response.value)
      router.push('/buchung-details')
  } catch (error) {
      // Do something with the error
      console.log("FEHLERMELDUNG: ")
      console.log(error)
  }
};

</script>
<!-- Datepicker Komponente mit einer Auswahl der Tage.
Beim ersten Aufruf soll schon der heutige Tag ausgewählt sein. -->

<template>
  <div id="picker-card">
    <h2>
      Bitte wähle einen Tag und eine Zeit aus:
    </h2>

    <form action="" method="POST" @submit.prevent="handleSubmit">
      <div>
        <!-- [Vue warn]: Invalid prop: type check failed for prop "inline". Expected Boolean, got String with value "true".  -->
        <vue-ctk-date-time-picker v-model="wunschTermin" 
          inline=true
          firstDayOfWeek=1
          noWeekendsDays=true
          minDate="2024-06-30"
          maxDate="2024-12-28"
          minuteInterval=15
        />
        <!-- [Vue warn]: Property "inline" was accessed during render but is not defined on instance. -->
        <!-- :inline="inline"  -->
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