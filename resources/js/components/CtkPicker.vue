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
    firstDayOfWeek: Number,
    noWeekendsDays: Boolean,
    minDate: String,
    maxDate: String,
  }
})

    // Beim ersten Aufruf soll schon der heutige Tag ausgewählt sein.
    // und schon im Format "DD.MM.YYYY HH.mm Uhr" angezeigt werden.
    // const today = new Date().toLocaleDateString('de-CH')
    const today = new Date().toISOString().slice(0, 10)
    console.log("today: " + today)
    const wunschTag = ref(today)
    console.log("value: " + wunschTag.value)

    const response = ref('')
    // [Vue warn]: inject() can only be used inside setup() or functional components.
    const router = useRouter()

    const wunschZeit = ref('15:00:00')

const handleSubmit = async() => {
  // console.log("Enter handleSubmit")
  console.log("WunschZeit: " + wunschZeit.value)
  try {
  const startDayTime = wunschTag.value + " " + wunschZeit.value
  // Endzeit auf 1 Stunde später setzen
  const finishDayTime = setFinishDayTime(wunschTag.value, wunschZeit.value)
    alert('Speichere Termin von: ' + startDayTime + ' bis: ' + finishDayTime)
    response.value = axios.post('/api/new-appointment', {
        employeeId: 1,
        status: 'Set max-date to november',
        clientId: 4,
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

function anzeigeDatum(date) {
  return new Intl.DateTimeFormat('de-CH', {
    day: 'numeric',
    month: 'numeric',
    year: 'numeric'
  }).format(new Date(date))
}

function anzeigeZeit(date, time) {
  const [hours, minutes] = time.split(':')
  const dateTime = new Date(date)
  dateTime.setHours(hours)
  dateTime.setMinutes(minutes)
  return new Intl.DateTimeFormat('de-CH', {
    hour: 'numeric',
    minute: '2-digit',
    hour12: false
  }).format(dateTime).replace(':', '.')
}

function setFinishDayTime(date, time) {
  const [hours, minutes] = time.split(':')
  const dateTime = new Date(date + 'T' + time)
  // wandle string in number um
  const utcHour = Number(hours)
  dateTime.setUTCHours(utcHour + 1)
  dateTime.setMinutes(minutes)
  // Gibt das Datum und die Zeit im Format "YYYY-MM-DD HH:mm:ss" zurück
  return dateTime.toISOString().slice(0, 19).replace('T', ' ')
}
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
        <vue-ctk-date-time-picker v-model="wunschTag" 
          :inline=true
          color="#9CBC64"
          button-color="#9CBC64"
          format="YYYY-MM-DD hh:mm"
          locale="de"
          :no-header=true

          :firstDayOfWeek=1
          :noWeekendsDays=true
          :min-date=today
          max-date="2024-11-30"
          :disabled-weekly=[]
          :only-date=true
          
          :disabled-hours="['00', '01', '02', '03', '04', '05', '06', '07', '08', 
                            '19', '20', '21', '22', '23']"
          minute-interval=15
          
          button-now-translation="Heute"
          :no-button-now=false
          output-format="YYYY-MM-DD"
        />
        <!-- [Vue warn]: Property "inline" was accessed during render but is not defined on instance. -->
        <!-- :inline="inline"  -->
      </div>
      <div id="timepicker">
        <div id="kopf">
          <!-- Tabelle 2x3 mit Radio-Buttons und den Zeiten 9:00, 10:30, 13:30, 15:00, 16:30, 18:00-->
          <table>
            <tr>
              <!--                                        <label for="fname">First name:</label> -->
              <td><input id="radio1" type="radio" v-model="wunschZeit" value="09:00:00" ><label for="radio1">09.00</label></td>
              <td><input id="radio2" type="radio" v-model="wunschZeit" value="10:30:00" ><label for="radio2">10.30</label></td>
              <td><input id="radio3" type="radio" v-model="wunschZeit" value="13:30:00" ><label for="radio3">13.30</label></td>
            </tr>
            <tr>
              <td><input id="radio4" type="radio" v-model="wunschZeit" value="15:00:00" ><label for="radio4">15.00</label></td>
              <td><input id="radio5" type="radio" v-model="wunschZeit" value="16:30:00" ><label for="radio5">16.30</label></td>
              <td><input id="radio6" type="radio" v-model="wunschZeit" value="18:00:00" ><label for="radio6">18.00</label></td>
            </tr>
          </table>
        </div>
        
        <!-- Auf einer Zeile Text und Button anzeigen -->
        <!-- TODO: Termin immer im Schweizer Format anzeigen -->
        <div class="fuss">
          <div id="anzeige">
            <h3>
              Termin am: {{ anzeigeDatum(wunschTag) }}<br>
              um: {{ anzeigeZeit(wunschTag, wunschZeit) }} Uhr
            </h3>
          </div>
          <div id="knopf">

            <button class="pickerButton" type="submit">Weiter</button>
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
    margin: 0px auto;
  }

  h2 {
    margin: 10px auto;
  }

  form {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    /* gap: 64px; */
    align-items: top  ;
  }

  form input {
    visibility: hidden;
  }

  form label {
    display: inline-block;
    width: 80px;
    height: 40px;
    background-color: var(--hellgrün);
    border-radius: 9px;
    text-align: center;
    line-height: 40px;
    margin-left: -19px;
    cursor: pointer;
  }

  form label:hover {
    background-color: var(--dunkelgrün);
  }

  form input:checked + label {
    background-color: var(--gelb);
  }

  /* form input:has([type='radio']:checked) {
    background-color: var(--gelb);
  } */

  #daypicker {
    min-width: 320px;
  }

  #timepicker {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    /* background-color: var(--hellgrün); */
    background-color: #fff;
    min-width: 320px;
    padding-top: 32px;
    border-radius: 3px;
  }

  .fuss {
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    justify-content: space-around;
    align-items: center;
    /* background-color: var(--hellgrün); */
  }  
  
  #knopf {
    padding: 5px;
    border: 1px solid var(--hellgrün);
    border-radius: 4px;
    width: 308px;
  }
  
  .pickerButton {
    padding: 0 20px;
    /* position: relative; */
    background-color: var(--hellgrün);
    border: 1px solid transparent;
    border-radius: 4px;
    height: 30px;
    font-size: 14px;
    /* outline: none; */
    cursor: pointer;
    /* -webkit-transition: all .25s cubic-bezier(.645,.045,.355,1); */
    color : var(--dunkelgrün);
    font-weight: 500;
  }

  .pickerButton:hover {
    background-color: var(--dunkelgrün);
    color: white;
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
