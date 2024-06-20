<script setup>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

const response = ref('')
const formular = reactive({
  employeeId: 1,
  status: 'finishDayTime calculated',
  clientId: 2,
  startDay: '2024-06-20',
  startTime: '18:00',
  finishTime: '19:00',
  startDayTime: '',
  finishDayTime: '',
})
const router = useRouter()

const handleSubmit = () => {
  formular.startDayTime = formular.startDay + ' ' + formular.startTime + ':00'
  formular.finishDayTime = formular.startDay + ' ' + formular.finishTime + ':00'
  console.log('Termin von: ' + formular.startTime + ' bis: ' + formular.finishDayTime)
  try {
    response.value = axios.post('/api/new-appointment', {
      employeeId: formular.employeeId,
      status: formular.status,
      clientId: formular.clientId,
      startTime: formular.startDayTime,
      finishTime: formular.finishDayTime,
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