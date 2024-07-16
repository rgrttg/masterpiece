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
    color: String,  
    buttonColor: String,
    format: String,
    noHeader: Boolean,
    firstDayOfWeek: Number,
    noWeekendsDays: Boolean,
    minDate: String,
    maxDate: String,
    disabledHours: Array,
    minuteInterval: Number,
  }
})

    // Beim ersten Aufruf soll schon der heutige Tag ausgewählt sein.
    // und schon im Format "DD.MM.YYYY HH.mm Uhr" angezeigt werden.
    // const today = new Date().toLocaleDateString('de-CH')
    const today = new Date().toISOString().slice(0, 10)
    console.log("today: " + today)
    const wunschTermin = ref(today)
    console.log("value: " + wunschTermin.value)

    const response = ref('')
    // [Vue warn]: inject() can only be used inside setup() or functional components.
    const router = useRouter()

    const time = ref('09:00')

const handleSubmit = async() => {
  console.log("handleSubmit aufgerufen")
  console.log("Time: " + time.value)
  try {
  const startDayTime = wunschTermin.value
  // TODO: Endzeit auf 1 Stunde später setzen
  const finishDayTime = wunschTermin.value
    alert('Speichere Termin von: ' + startDayTime + ' bis: ' + finishDayTime)
    response.value = axios.post('/api/new-appointment', {
        employeeId: 1,
        status: 'Speichere mit gleicher Start und Endzeit',
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
      <div id="daypicker">
        <!-- [Vue warn]: Invalid prop: type check failed for prop "inline". Expected Boolean, got String with value "true".  -->
        <vue-ctk-date-time-picker v-model="wunschTermin" 
          :inline=true
          color="#9CBC64"
          button-color="#9CBC64"
          format="YYYY-MM-DD hh:mm"
          locale="de"
          :no-header=false

          :firstDayOfWeek=1
          :noWeekendsDays=true
          :min-date=today
          max-date="2024-07-30"
          :disabled-weekly=[4]
          :only-date=true
          
          :disabled-hours="['00', '01', '02', '03', '04', '05', '06', '07', '08', 
                            '19', '20', '21', '22', '23']"
          minute-interval=15
          
          button-now-translation="Heute"
          :no-button-now=false
          output-format="YYYY-MM-DD HH:mm:00"
        />
        <!-- [Vue warn]: Property "inline" was accessed during render but is not defined on instance. -->
        <!-- :inline="inline"  -->
      </div>
      <div id="timepicker">
        <div id="kopf">
          <!-- Tabelle 2x3 mit Radio-Buttons und den Zeiten 9:00, 10:30, 13:30, 15:00, 16:30, 18:00-->
          <table>
            <tr>
              <td><input type="radio" v-model="time" value="09:00" >09:00 Uhr</td>
              <td><input type="radio" v-model="time" value="10:30" >10:30 Uhr</td>
              <td><input type="radio" v-model="time" value="13:30" >13:30 Uhr</td>
            </tr>
            <tr>
              <td><input type="radio" v-model="time" value="15:00" >15:00 Uhr</td>
              <td><input type="radio" v-model="time" value="16:30" >16:30 Uhr</td>
              <td><input type="radio" v-model="time" value="18:00" >18:00 Uhr</td>
            </tr>
          </table>
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
      </div>
    </form>
  </div>
</template>

<style scoped>
  #picker-card {
    width: 800px;
    margin: 10px auto;
  }

  form {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
  }

  #timepicker {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
  }

  .fuss {
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    justify-content: space-around;
    align-items: center;
    border: 1px solid black;
    /* background-color: var(--hellgrün); */
  }  
  
  :deep(.header-picker) {
    background-color: var(--dunkelgrün) !important;
  }  
  :deep(.time-picker-column-item.active .time-picker-column-item-effect),
  :deep(.datepicker-container .datepicker-days .datepicker-day.selected .datepicker-day-effect) {
    background-color: var(--gelb) !important;
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
