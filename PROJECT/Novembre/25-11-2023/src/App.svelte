<script>
    import AddForm from "./lib/AddForm.svelte";
    import ListaToDo from "./lib/ListaToDo.svelte";
    import TODOcounter from "./lib/TODOcounter.svelte";

    import { todos } from "./lib/store";

</script>

<main>
  <h1>TODO LIST</h1>
  <TODOcounter />
  <AddForm />
  <ListaToDo todolist = {$todos} />
</main>

<style>
</style>
