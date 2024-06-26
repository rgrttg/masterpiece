<!-- Auf der Terminseite zwei Komponenten mit einer Auswahl der Tage.
Und einer Auswahl der Zeiten, mit Button "weiter" -->

<script setup>
import AppHeader from '../components/AppHeader.vue';
import AppFooter from '../components/AppFooter.vue';
import CtkPicker from '../components/CtkPicker.vue';

</script>

<template>
  <!-- Header -->
  <header>
    <AppHeader />
  </header>

  <main>
    <h1>Termin buchen</h1>
    
    <!-- Links den Datepicker -->
    <CtkPicker />

    <!-- Rechts den Timepicker -->

  </main>

<footer>
  <AppFooter />
</footer>

</template>
