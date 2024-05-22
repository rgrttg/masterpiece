<script setup>
import { ref } from 'vue'
import AppHeader from '../components/AppHeader.vue';
import AppFooter from '../components/AppFooter.vue';

</script>

<template>
<!-- Header -->
<header>
  <AppHeader />
</header>

<!-- Main -->
<main>
  <div>
    <h1>Deine Kinesiologie-Praxis in Hedingen und Urdorf</h1>
    <router-link to="/login">Link zur Login Seite</router-link>
  </div>
</main>

<!-- Footer -->
<footer>
  <AppFooter />
</footer>
</template>

<style scoped>
h1 {
  color: red;
  background-color: var(--color-heading-1);
}
</style>