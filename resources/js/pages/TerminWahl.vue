<script setup>
import AppHeader from '../components/AppHeader.vue';
import AppFooter from '../components/AppFooter.vue';
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
import { ref } from 'vue';

</script>

<template>
  <!-- Header -->
  <header>
    <AppHeader />
  </header>

  <main>
    <h1>Termin buchen</h1>
    <!-- <h2>HTML-Version</h2>
    <p>Bitte wählen Sie einen Tag aus:</p>
    <div>
      <input type="date" id="termin" name="termin" />
        <button>Termin buchen</button>
    </div> -->
    <h2>Vue-Version</h2>
    <div id="breite">
      <VueCtkDateTimePicker v-model="myValue" 
      inline=true 
      format="DD-MM-YYYY HH:mm"
      color="var(--dunkelgrün)"
      button-color="var(--dunkelgrün)"
      minute-interval	= "10"
      min-date="2024-06-09"
      max-date="2024-12-28"
      no-weekends-days=true
      first-day-of-week=1
      disabled-hours="['00','01','02','03','04','05','06','07','08','18','19','20','21','22','23']" 
      right=true
      />
    </div>
    

  </main>

<footer>
  <AppFooter />
</footer>

</template>

<!-- importiert von https://blog.logrocket.com/comparing-vue-js-date-pickers/ -->
<style scoped>
::v-deep .header-picker {
  background-color: var(--dunkelgrün) !important;
  /* background-color: #082032 !important; */
}
::v-deep .time-picker-column-item.active .time-picker-column-item-effect,
::v-deep
  .datepicker-container

  .datepicker-days
  .datepicker-day.selected
  .datepicker-day-effect {
  background-color: var(--gelb) !important;
}
#breite {
  width: 800px;
  margin-left: 64px;
  margin-bottom: 64px;
}

</style>