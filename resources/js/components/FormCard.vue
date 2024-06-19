<!-- Formular Komponente, die alle Personalien erfasst, 
mit einem Button "Buchung abschliessen", 
die Angaben an die API sendet, die sie in der Datenbank zwischenspeichert
und dann GANZ WICHTIG in den iCloud-Kalender schreibt. -->
<script setup>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

const response = ref()
const formular = reactive({
  subject: '',
  firstname: '',
  lastname: '',
  phone: '',
  email: '',
  street: '',
  city: '',
  birthdate: ''
})
const router = useRouter()

const handleSubmit = () => {
  try {
    response.value = axios.post('/api/new-client', {
      subject: formular.subject,
      firstname: formular.firstname,
      lastname: formular.lastname,
      phone: formular.phone,
      email: formular.email,
      street: formular.street,
      city: formular.city,
      birthdate: formular.birthdate
    })
    console.log('Formular wurde abgeschickt'); // rreturn?
    router.push('/buchung-erfolgreich')
  } catch (error) {
    // Do something with the error
    console.log('FEHLERMELDUNG: ')
    console.log(error)
  }
}
</script>

<template>
  <!-- Formular -->
  <form action="" method="POST" @submit.prevent="handleSubmit">
    <div class="formular">
      <div>
        <h2>1. Sitzungstermin</h2>
        <p>Danke für das Ausfüllen dieses Formulars. Deine Angaben unterliegen dem Datenschutz und sind nur für internen Gebrauch bestimmt.
          <br><span class="req">*</span> Erforderliche Daten.</p>
      </div>
      <!-- Thema -->
      <div>
        <label for="thema">Um welches Thema geht es dir? <span class="req">*</span></label>
        <br>Was steht im Vordergrund (Energie, Ängste, Schlaflosigkeit)? 
      </div>
      <div>
        <!-- <input type="textarea" id="thema" name="thema" title="Erforderlich" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="off" rows="4" placeholder="Thema" > -->
        <textarea autofocus rows="2" cols="53" id="thema" v-model="formular.subject" title="Thema erforderlich" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="off" placeholder="Thema"></textarea>
      </div>
      
      <!-- Vorname -->
      <div>
        <label for="vorname">Dein Vorname: <span class="req">*</span></label>
      </div>
      <div>
        <input type="text" id="vorname" v-model="formular.firstname" title="Vorname erforderlich" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="given-name" size="32" placeholder="Vorname">
      </div>
      
      <!-- Nachname -->
      <div>
        <label for="nachname">Dein Nachname: <span class="req">*</span></label>
      </div>
      <div>
        <input type="text" id="nachname" v-model="formular.lastname" title="Nachname erforderlich" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="family-name" size="32" placeholder="Nachname">
      </div>
      
      <!-- Telefonnummer -->
      <div>
        <label for="telefon">Deine Telefonnummer: <span class="req">*</span></label>
      </div>
      <div>
        <input type="tel" id="telefon" v-model="formular.phone" title="Telefon erforderlich" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="tel" size="32" placeholder="Telefonnummer">
      </div>
      
      <!-- E-Mail -->
      <div>
        <label for="email">Deine E-Mail-Adresse: <span class="req">*</span></label>
      </div>
      <div>
        <input type="email" id="email" v-model="formular.email" title="Format xx@yy.zz erforderlich" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="email" size="32" placeholder="E-Mail">
      </div>
      
      <!-- Strasse und Hausnummer -->
      <div>
        <label for="strasse">Deine Strasse mit Hausnummer: <span class="req">*</span></label>
      </div>
      <div>
        <input type="text" id="strasse" v-model="formular.street" title="Strasse und Nummer erforderlich" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="street-address" size="32" placeholder="Strasse Nr.">
      </div>
      
      <!-- PLZ und Ort -->
      <div>
        <label for="plz">Deine PLZ mit Ort: <span class="req">*</span></label>
      </div>
      <div>
        <input type="text" id="plz" v-model="formular.city" title="PLZ und Ort erforderlich" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="postal-code address-level2" size="32" placeholder="PLZ Ort">
      </div>
      
      <!-- Geburtsdatum -->
      <div>
        <label for="geburtsdatum">Dein Geburtsdatum: <span class="req">*</span></label>
      </div>
      <div>
        <input type="date" id="geburtsdatum" v-model="formular.birthdate" title="Geburtsdatum erforderlich" required oninvalid="this.setCustomValidity('Bitte dieses Feld ausfüllen')" onchange="this.setCustomValidity('')" autocomplete="bday" >
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

input, textarea {
  /* width: 100%; */
  padding: 4px 0 4px 8px;
  margin: 8px 0;
  display: inline-block;
  border: 2px solid var(--color-border);
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