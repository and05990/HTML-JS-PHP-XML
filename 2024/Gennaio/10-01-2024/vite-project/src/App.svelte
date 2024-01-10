<script>
  let importo = 0;
  let saldo = 10000;
    function preleva() {
        saldo = saldo - importo;
    }
</script>

<main>
  <h1>Benvenuto su ATM!</h1>
  <div class="atm">
    <h2>Preleva</h2>
    <hr>
    <h3>Saldo: {saldo}€</h3>
    <p>Selezionarel'importo da prelevare:
    <input type="range" name="importo" bind:value={importo} min="1" max="{saldo}"> €
    <output for="importo">{importo}</output> </p>
    <hr>
    <button class="preleva" on:click={preleva}>Preleva</button>
  </div>
</main>

<style>
  .preleva{
    background-color: rgb(245, 75, 75);
  }

  .atm{
    border: 1px solid black;
    padding: 20px;
    border-radius: 10px;
    width: 300px;
    margin: 0 auto;
  }
</style>
