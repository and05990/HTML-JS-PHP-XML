<script>
    import {todos} from "./store"

    let nuovoTodo

    function addTodo() {
        todos.update((old) => {
            old.push({
                title:nuovoTodo, 
                done:false})
            return old
        })
    }
</script>

<input type="text" bind:value={nuovoTodo} />
<button on:click={addTodo}>Add</button>