<template>
  <div class="kopf">
    <div class="logo">
      <img alt="Website-Logo" src="../../img/logo.png" height="125" />
    </div>
    <div class="rechts">
      <div>
        Home
      </div>
      <div>
        Termin buchen
      </div>
      <div>
        Über mich
      </div>
      <div>
        <router-link to="/login">Link zur Login Seite</router-link>
      </div>
    </div>
  </div>
</template>

<style scoped>
.kopf {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: space-between;
  align-items: center;
  padding-left: 40px;
  padding-right: 40px;
  background-color: var(--color-background-header);
  min-height: 180px;
}
.rechts {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  gap: 64px;
  justify-content: space-between;
  align-items: right;
}
</style>