<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

const validate = () => {
  // Vorschlag von Copilot
  console.log('Formular wurde abgeschickt');
  // einfach auf Bestätigungs-Seite weiterleiten
}
</script>

<template>
  <!-- Formular -->
  <form action="buchung-erfolgreich" >
  <!-- <form action="" method="get" @sumit.prevent="validate"> -->
    <div class="formular">
      <div>
        <h2>1. Sitzungstermin</h2>
        <p>Danke für das Ausfüllen dieses Formulars. 
          Deine Angaben unterliegen dem Datenschutz und 
          sind nur für internen Gebrauch bestimmt.</p>
      </div>
      <!-- Thema -->
      <div>
        <label for="thema">Um welches Thema geht es dir? Was steht im Vordergrund? (Energie? Ängste? Schlaflosigkeit?) <span class="req">*</span></label>
      </div>
      <div>
        <input type="textarea" id="thema" name="thema" title="Erforderlich" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="off" size="32" placeholder="Dein Thema" >
      </div>
      
      <!-- Vorname -->
      <div>
        <label for="vorname">Vorname: <span class="req">*</span></label>
      </div>
      <div>
        <input type="text" id="vorname" name="vorname" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="given-name" size="32" placeholder="Dein Vorname">
      </div>
      
      <!-- Nachname -->
      <div>
        <label for="nachname">Nachname: <span class="req">*</span></label>
      </div>
      <div>
        <input type="text" id="nachname" name="nachname" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="family-name" size="32" placeholder="Dein Nachname">
      </div>
      
      <!-- Telefonnummer -->
      <div>
        <label for="telefon">Telefonnummer: <span class="req">*</span></label>
      </div>
      <div>
        <input type="tel" id="telefon" name="telefon" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="tel" size="32" placeholder="Deine Telefonnummer">
      </div>
      
      <!-- E-Mail -->
      <div>
        <label for="email">E-Mail: <span class="req">*</span></label>
      </div>
      <div>
        <input type="email" id="email" name="email" title="Format: xx@yy.zz" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="email" size="32" placeholder="Deine E-Mail-Adresse">
      </div>
      
      <!-- Strasse und Hausnummer -->
      <div>
        <label for="strasse">Strasse und Hausnummer: <span class="req">*</span></label>
      </div>
      <div>
        <input type="text" id="strasse" name="strasse" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="street-address" size="32" placeholder="Deine Strasse und Hausnummer">
      </div>
      
      <!-- PLZ und Ort -->
      <div>
        <label for="plz">PLZ und Ort: <span class="req">*</span></label>
      </div>
      <div>
        <input type="text" id="plz" name="plz" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="postal-code address-level2" size="32" placeholder="Deine PLZ und Ort">
      </div>
      
      <!-- Geburtsdatum -->
      <div>
        <label for="geburtsdatum">Geburtsdatum: <span class="req">*</span></label>
      </div>
      <div>
        <input type="date" id="geburtsdatum" name="geburtsdatum" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="bday" size="32" placeholder="Dein Geburtsdatum">
      </div>    
      
      <!-- Button -->
      <div>
        <button class="button" type="submit">Buchung abschliessen</button>
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
  /* background-color: var(--color-input); */
}

.req {
  color: red;
}

*:required {
  background-color: var(--color-input);
}
</style>