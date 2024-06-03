<script setup>
import AppHeader from '../components/AppHeader.vue';
import AppFooter from '../components/AppFooter.vue';
</script>

<template>
  <!-- Header -->
  <header>
    <AppHeader />
  </header>

  <main>
    <h1>Termin buchen</h1>
    <p>Bitte wählen Sie einen Tag aus:</p>
    <div>
      <input type="date" id="termin" name="termin" />
        <button>Termin buchen</button>
    </div>
  </main>

<footer>
  <AppFooter />
</footer>

</template>