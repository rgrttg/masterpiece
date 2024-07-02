<script setup>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

const response = ref('')
const formular = reactive({
  employeeId: 1,
  status: 'startDayTime local variable',
  clientId: 2,
  startDay: '2024-06-20',
  startTime: '20:00',
  finishTime: '21:00',
})
// startDayTime: '',
// finishDayTime: '',
const router = useRouter()

const handleSubmit = () => {
  const startDayTime = formular.startDay + ' ' + formular.startTime + ':00'
  const finishDayTime = formular.startDay + ' ' + formular.finishTime + ':00'
  // console.log('Termin von: ' + startDayTime + ' bis: ' + finishDayTime)
  alert('Speichere Termin von: ' + startDayTime + ' bis: ' + finishDayTime)
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
    router.push('/buchung-details')
  } catch (error) {
    console.log('FEHLERMELDUNG: ')
    console.log(error)
  }
}
</script>

<template>
  <h2>HTML-Version</h2>
  <p>Bitte wählen Sie einen Tag aus:</p>
  <form action="" method="POST" @submit.prevent="handleSubmit">
    <div>
      <input type="number" v-model="formular.employeeId" />Employee<br>
      <input type="text" v-model="formular.status" />Status<br>
      <input type="number" v-model="formular.clientId" />Client<br>
      <!-- <input type="date" id="termin" name="termin" /> -->
      <input type="date"  v-model="formular.startDay" />Tag<br>
      <input type="time"  v-model="formular.startTime" />Zeit<br>
      <button type="submit">Weiter</button>
    </div>
    {{  formular }}
  </form>
</template>