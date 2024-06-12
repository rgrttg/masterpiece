<script setup>
import AppHeader from '../components/AppHeader.vue';
import AppFooter from '../components/AppFooter.vue';
import HtmlPicker from '../components/HtmlPicker.vue';
import CtkPicker from '../components/CtkPicker.vue';

</script>

<template>
  <!-- Header -->
  <header>
    <AppHeader />
  </header>

  <main>
    <h1>Termin buchen</h1>
    <!-- <HtmlPicker /> -->
    <CtkPicker />    

  </main>

<footer>
  <AppFooter />
</footer>

</template>
