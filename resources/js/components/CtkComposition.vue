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

const router = useRouter()
const today = new Date().toISOString().slice(0, 10)
const wunschTermin = ref(today)

// Beispiel, wie man Props mit Standardwerten in setup() definiert, falls benötigt:
const inline = ref(true)
const format = ref('DD.MM.YYYY HH.mm')
// Fügen Sie hier weitere Props mit ihren Standardwerten hinzu

// Beispiel für die Rückgabe von Zuständen und Methoden
// return {
//   wunschTermin,
//   // Fügen Sie hier weitere Zustände und Methoden hinzu
// }
const handleSubmit = () => {
  // console.log('Termin von: ' + startDayTime + ' bis: ' + finishDayTime)
  alert('Speichere Termin von: ' + wunschTermin.value)
  try {
    response.value = axios.post('/api/new-appointment', {
      employeeId: formular.employeeId,
      status: formular.status,
      clientId: formular.clientId,
      startTime: startDayTime,
      finishTime: finishDayTime,
    })
    console.log('Termin wurde abgeschickt: ')
    console.log(response.value)
    // router.push('/buchung-details')
  } catch (error) {
    console.log('FEHLERMELDUNG: ')
    console.log(error)
  }
}
</script>

<template>
  <h2>Composition-Version</h2>
  <p>Bitte wählen Sie einen Tag aus:</p>
  <form action="" method="POST" @submit.prevent="handleSubmit">
    <div>
      <!-- <input type="date"  v-model="formular.startDay" />Tag<br> -->
      <vue-ctk-date-time-picker v-model="wunschTermin" 
      :inline="inline" 
      />
      <button type="submit">Weiter</button>
    </div>

  </form>
</template>