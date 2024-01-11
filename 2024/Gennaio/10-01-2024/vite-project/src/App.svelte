<script>
  let importo = 1;
  let importoD = 1;
  let saldo = 10000;
    function preleva() {
      if (importo <= 0) {
        alert("Inserisci un importo valido!");
        return;
      }
      if (importo > saldo) {
        alert("Non hai abbastanza soldi!");
        return;
      }
      if (saldo <= 0) {
        alert("Non hai abbastanza soldi!");
        saldo = 0;
        return;
      }

      saldo = saldo - importo;
      importo = 0;
    }

    function deposita() {
      saldo = saldo + importoD; 
      importoD = 1;
    }
</script>

<main>
  <h1>Benvenuto sul tuo ATM!</h1>
  <div class="atm">
    <div class="prelievo">
      <h2>Preleva</h2>
      <hr>
      <h3>Saldo: {saldo}€</h3>
      <p>Selezionarel'importo da prelevare:
        <input type="range" name="importo" bind:value={importo} min="0" max="{saldo}"> €
        <output for="importo">{importo}</output>
      </p>
      <hr>
      <button class="preleva" on:click={preleva}>Preleva</button>
    </div>
    <div class="deposita">
      <h2>Deposita</h2>
      <hr>
      <h3>Saldo: {saldo}€</h3>
      <p>Selezionarel'importo da depositare:
        <input type="range" name="importoD" bind:value={importoD} min="1" max="100000"> €
        <output for="importoD">{importoD}</output> 
      </p>
      <hr>
      <button class="deposito" on:click={deposita}>Deposita</button>
    </div>
  </div>

  <footer> <p><a href="https://github.com/and05990">GitHub</a></p> </footer>
</main>

<style>
  .preleva{
    background-color: rgb(245, 75, 75);
  }

  .deposito{
    background-color: rgb(245, 75, 75);
  }

  .prelievo{
    border: 1px solid black;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    margin: 0 auto;
    margin-right: 20px;
    box-shadow: 5px 5px 5px grey;
  }

  .deposita{
    border: 1px solid black;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    margin: 0 auto;
    box-shadow: 5px 5px 5px grey;
  }

  .atm{
    display: flex;
    flex-direction: row;
  }
</style>
