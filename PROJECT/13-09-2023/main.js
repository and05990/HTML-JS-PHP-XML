const surname     = document.getElementById("surname");
const name        = document.getElementById("name");
const date        = document.getElementById("date");
const sex         = document.getElementById("sex");
const city        = document.getElementById("city");

const btnGenerate = document.getElementById("generate");

btnGenerate.function(event => onclick)
{
    calculateCodiceFiscale(surname, name, date, sex, city);
}

function calculateCodiceFiscale(surname, name, date, sex, city) {
    // Prendi le prime tre consonanti del cognome
    let consonantsSurname = "";
    for (let i = 0; i < surname.length && consonantsSurname.length < 3; i++) {
      const char = surname[i];
      if (!isVowel(char)) {
        consonantsSurname += char;
      }
    }
  
    // Prendi la prima, terza e quarta consonante del nome
    let consonantsName = "";
    let consonantCount = 0;
    for (let i = 0; i < name.length && consonantCount < 4; i++) {
      const char = name[i];
      if (!isVowel(char)) {
        if (consonantCount === 0 || consonantCount === 2 || consonantCount === 3) {
          consonantsName += char;
        }
        consonantCount++;
      }
    }
  
    // Estrai l'ultima due cifre dell'anno di nascita
    const yearDigits = date.substring(2, 4);
  
    // Estrai il mese di nascita in lettere
    const month = getMonthLetter(date);
  
    // Estrai il giorno di nascita (senza zero iniziale se presente)
    const day = parseInt(date.split("-")[2], 10);
  
    // Genera le due lettere finali basate sul comune di nascita (da implementare)
  
    // Componi il codice fiscale
    const codiceFiscale =
      consonantsSurname +
      consonantsName +
      yearDigits +
      month +
      (sex === "M" ? formatDay(day) : (day + 40)) +
      "Z"; // "Z" è una costante

    return codiceFiscale;
}
  
  function isVowel(char) {
    return "AEIOU".indexOf(char.toUpperCase()) !== -1;
  }
  
  function getMonthLetter(date) {
    const months = [
      "A", "B", "C", "D", "E", "H", "L", "M", "P", "R", "S", "T"
    ];
    const monthNumber = parseInt(date.split("-")[1], 10) - 1;
    return months[monthNumber];
  }
  
  function formatDay(day) {
    return day < 10 ? "0" + day : day.toString();
  }
  