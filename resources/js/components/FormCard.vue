<template>
  <!-- Formular -->
  <form>
    <div class="formular">
      <div>
        <h2>1. Sitzungstermin</h2>
        <p>Danke für das Ausfüllen dieses Formulars. 
          Ihre Angaben unterliegen dem Datenschutz und 
          sind nur für internen Gebrauch bestimmt.</p>
      </div>
      <!-- Thema -->
      <div>
        <label for="thema">Um welches Thema geht es dir? Was steht im Vordergrund? (Energie? Ängste? Schlaflosigkeit?)</label>
      </div>
      <div>
        <input type="textarea" id="thema" name="thema" placeholder="Dein Thema">
      </div>
      
      <!-- Vorname -->
      <div>
        <label for="vorname">Vorname:</label>
      </div>
      <div>
        <input type="text" id="vorname" name="vorname" placeholder="Dein Vorname">
      </div>
      
      <!-- Nachname -->
      <div>
        <label for="nachname">Nachname:</label>
      </div>
      <div>
        <input type="text" id="nachname" name="nachname" placeholder="Dein Nachname">
      </div>
      
      <!-- Telefonnummer -->
      <div>
        <label for="telefon">Telefonnummer:</label>
      </div>
      <div>
        <input type="tel" id="telefon" name="telefon" placeholder="Deine Telefonnummer">
      </div>
      
      <!-- E-Mail -->
      <div>
        <label for="email">E-Mail:</label>
      </div>
      <div>
        <input type="email" id="email" name="email" placeholder="Deine E-Mail-Adresse">
      </div>
      
      <!-- Strasse und Hausnummer -->
      <div>
        <label for="strasse">Strasse und Hausnummer:</label>
      </div>
      <div>
        <input type="text" id="strasse" name="strasse" placeholder="Deine Strasse und Hausnummer">
      </div>
      
      <!-- PLZ und Ort -->
      <div>
        <label for="plz">PLZ und Ort:</label>
      </div>
      <div>
        <input type="text" id="plz" name="plz" placeholder="Deine PLZ und Ort">
      </div>
      
      <!-- Geburtsdatum -->
      <div>
        <label for="geburtsdatum">Geburtsdatum:</label>
      </div>
      <div>
        <input type="date" id="geburtsdatum" name="geburtsdatum" placeholder="Dein Geburtsdatum">
      </div>    
    </div>
  </form>
  
</template>

<style scoped>
.formular {
  display: flex;
  flex-direction: column;
  /* row-gap: 16px; */
  /* align-content: space-between; */
  align-items: start;
  margin: 64px;
  padding: 64px;
  background-color: var(--color-background-card);
  min-height: 320px;
}

label {
  font-weight: bold;
  /* padding-top: 8px; */
}

input {
  width: 100%;
  padding: 4px 0 4px 8px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid var(--color-border);
  box-sizing: border-box;
  background-color: var(--gelb);
}
</style>