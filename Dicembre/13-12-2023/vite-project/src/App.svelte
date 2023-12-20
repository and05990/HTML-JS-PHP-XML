<script>
  let name = "";
  let date = "";
  let haveAnimals = true;
  let cat = true;
  let enjoyCoding = true;
  let hobby = "";

  $: years = date ? Math.floor((new Date().getTime() - new Date(date).getTime()) / 1000 / 60 / 60 / 24 / 365.25) : 0;
</script>

<main>
  <h1>Hello {name}!</h1>
  <hr />
  <p> You are {years} years old and you {enjoyCoding ? "" : "don't"} enjoy coding. </p> 
  <p> You {haveAnimals ? "really like" : "don't have"} animals
  {#if haveAnimals}
    indeed you {cat ? "" : "don't"} have a cat.
  {/if}
  </p>
  <p> Your hobby is {hobby}. </p>
  <hr /> 
  <input type="text" bind:value={name} />
  <input type="date" bind:value={date}>
  <label>
    <p> Do you enjoy coding? <input type="checkbox" bind:checked={enjoyCoding} /> </p> 
    <p> Do you have animals? <input type="checkbox" bind:checked={haveAnimals} /> </p>
    {#if haveAnimals}
      <label>
        <input type="checkbox" value="cat" bind:checked={cat} /> Cat
      </label>
    {/if}
  </label>

  <p>What hobbies do you have? <input type="text" bind:value={hobby} /> </p>
</main>

<style>
</style>
