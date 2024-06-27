<template>
  <div class="fuss">
    <div id="one"> 
      <!-- Minimale Copyright Angaben -->
      &copy; 2024&nbsp;
    </div>
    <div id="two">
      by Roger Ottiger
    </div>
  </div>
</template>

<style scoped>
.fuss {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: center;
  align-items: center;
  background-color: var(--color-background-footer);
  /* sticky footer */
  position: fixed;
  bottom: 0;
  width: 100%;
}
</style>