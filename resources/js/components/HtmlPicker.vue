<script setup>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

const response = ref('')
const formular = reactive({
  startTime: '2024-06-20 11:00:00',
  finishTime: '2024-06-20 12:00:00',
  comments: 'Status',
  employeeId: 1,
  clientId: 2,
})
const router = useRouter()

const handleSubmit = () => {
  console.log(formular)
  try {
    response.value = axios.post('/api/new-appointment', {
      startTime: formular.startTime,
      finishTime: formular.finishTime,
      comments: formular.comments,
      clientId: formular.clientId,
      employeeId: formular.employeeId
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
      <input type="text" v-model="formular.comments" />
      <input type="number" v-model="formular.clientId" />
      <!-- <input type="date" id="termin" name="termin" /> -->
      <input type="date" id="termin" v-model="formular.termin" />
      <button type="submit">Weiter</button>
    </div>
    {{  formular }}
  </form>
</template>