<!-- Auf der Detailseite ein Formular, das alle Personalien erfasst; 
mit einem Button "buchen", der die Angaben in der Datenbank zwischenspeichert
und dann GANZ WICHTIG in den iCloud-Kalender schreibt. -->
<script setup>
import AppHeader from '../components/AppHeader.vue';
import FormCard from '../components/FormCard.vue';
import AppFooter from '../components/AppFooter.vue';
</script>

<template>
  <header>
    <AppHeader />
  </header>
  
  <main>
    <h1>Buchung Details</h1>

    <FormCard />
  </main>

  <footer>
    <AppFooter />
  </footer>
</template>
