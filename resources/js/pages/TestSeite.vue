<script setup>
import AppHeader from '../components/AppHeader.vue';
import AppFooter from '../components/AppFooter.vue';
import HtmlPicker from '../components/HtmlPicker.vue';
</script>

<template>
  <header>
    <AppHeader />
  </header>

  <main>
    <h1>Test-Seite</h1>
    
    <!-- DEVS -->
    <HtmlPicker />
    
  </main>

  <footer>
    <AppFooter />
  </footer>
</template>