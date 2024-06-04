<template>
  <div class="karte">
    <div class="card-header">
      <h2>Vielen Dank für Deine Anmeldung</h2>
    </div>
    <div class="card-body">
      <p>Eine Bestätigung wurde an Deine Adresse kate@winslet.com gesendet.</p>
    </div>
    <div>
      <h3>Ich freue mich auf Dich...</h3>
    </div>
    <div class="card-footer">
      <a role="button" class="button" href="/" >Zurück zur Homepage</a>
    </div>
  </div>
</template>

<style scoped>
.karte {
  display: flex;
  flex-direction: column;
  align-items: start;
  justify-content: space-evenly;
  margin: 64px;
  padding: 64px;
  background-color: var(--color-background-card);
  min-height: 240px;
}
</style>