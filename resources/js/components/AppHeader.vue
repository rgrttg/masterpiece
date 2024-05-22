<template>
  <div class="kopfzeile">
    <div class="logo">
      <img alt="Website-Logo" src="" height="180"/>
    </div>
    <div class="links">
      <div>
        Home
      </div>
      <div>
        Termin buchen
      </div>
      <div>
        Über mich
      </div>
    </div>
  </div>
</template>

<style scoped>
.kopfzeile {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: space-between;
  padding-left: 40px;
  padding-right: 40px;
  align-items: center;
  background-color: var(--color-background-header);
  min-height: 180px;
}
.links {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  gap: 64px;
  justify-content: space-between;
  align-items: right;
}
</style>