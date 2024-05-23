<script setup>
import { ref } from 'vue'
import AppHeader from '../components/AppHeader.vue';
import MainCard from '../components/MainCard.vue';
import AppFooter from '../components/AppFooter.vue';

</script>

<template>
    <!-- Header -->
    <header>
      <AppHeader />
    </header>

    <!-- Main -->
    <main>
      <h1>Deine Kinesiologie-Praxis in Hedingen und Urdorf</h1>

      <MainCard />
    </main>
    
    <!-- Footer -->
    <footer>
      <AppFooter />
    </footer>
</template>
