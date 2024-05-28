<template>
  <div class="karte">
    <div id="foto">
      <img alt="Foto" src="../../img/300x300.png" width="300" height="300" />
    </div>
    <div id="text">
      <h2>IK-K Integrative Kinesiologie Kalbermatter</h2>
      <h3>Hi, ich bin Claudia Kalbermatter</h3>
      <h4>Kinesiologe mit Herz und Humor</h4>
      <div>Als Diplomierter Kinesiologe und Stress-Experte helfe ich Dir, Kindern und Erwachsenen, mit den 
        täglichen Herausforderungen in Schule, Beruf, Alltag, in Beziehungen, Krankheiten und persönlichen 
        Krisen angemessen klar zu kommen.</div>
    </div>
  </div>
</template>

<style scoped>
.karte {
  display: flex;
  flex-direction: row;
  gap: 64px;
  flex-wrap: nowrap;
  justify-content: space-evenly;
  align-items: start;
  margin: 64px;
  padding: 64px;
  background-color: var(--color-background-card);
  min-height: 320px;
}

#foto {
  width: 300px;
  height: 300px;
  border: 9px solid var(--color-border);
}

#text {
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
}
</style>