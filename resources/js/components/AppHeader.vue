<template>
  <div class="kopf">
    <div class="logo">
      <img alt="Website-Logo" src="../../img/logo.png" height="125" />
    </div>
    <div class="rechts">
      <div>
        <a href="/">Home</a>
      </div>
      <div>
        <a href="/termin-wahl">Termin buchen</a>
      </div>
      <div>
        Über mich
        <!-- <a href="/about">Über mich</a> -->
      </div>
      <div>
        <router-link to="/login">Login</router-link>
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
  padding-left: 50px;
  padding-right: 64px;
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