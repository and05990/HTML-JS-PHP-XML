<script>
  let mazzo = [1 ,2, 3, 4, 5, 6, 7, 8, 9, 10];
  let mazziere = 0;
  let giocatore = 0;
  let pescataM = 0;
  let pescata = 0;
  let inizio = true;
  let indice = 0;
  let risultato = "";

  function pescaMazziere(){
      indice = Math.floor(Math.random() * mazzo.length);
      pescataM = mazzo[indice];
      mazziere += pescataM;
  }
  function pesca () {
    if (inizio) {
      pescaMazziere();
      inizio = false;
    }

    indice = Math.floor(Math.random() * mazzo.length);
    pescata = mazzo[indice];
    giocatore += pescata;
    
    if (mazziere > 21 || giocatore > 21) {
      controllaVincitore();
    }
  }

  function controllaVincitore() {
    pescaMazziere();

    if (mazziere < 17) {
      pescaMazziere();      
    }

    if (mazziere > 21 || giocatore > 21) {
      if (mazziere > 21) {
        risultato = "Il giocatore vince, il mazziere ha superato 21";
      } else {
        risultato = "Il mazziere vince, il giocatore ha superato 21";
      }
    } else if (mazziere === 21 || giocatore === 21) {
      if (mazziere === 21) {
        risultato = "Il mazziere vince con un punteggio di 21";
      } else {
        risultato = "Il giocatore vince con un punteggio di 21";
      }
    } else if (mazziere === giocatore) {
      risultato = "Pareggio";
    } else {
      if (mazziere > giocatore) {
        risultato = "Il mazziere vince con un punteggio più alto";
      } else {
        risultato = "Il giocatore vince con un punteggio più alto";
      }
    }

    mazziere = 0;
    giocatore = 0;
    pescataM = 0;
    pescata = 0;
    inizio = true;
  }
</script>

<main>
  <h1>Scometti ora con il BlackJack migliore al mondo</h1>
  <h2>{risultato}</h2>
  <p>Il mazziere pesca: {pescataM}</p>
  <p>Il giocatore pesca: {pescata}</p>

  <p>Mazziere: {mazziere}</p>
  <p>Giocatore: {giocatore}</p>
  <button on:click={pesca}>Pesca</button>
  <button on:click={controllaVincitore}>Fermati</button>
</main>

<style>
</style>