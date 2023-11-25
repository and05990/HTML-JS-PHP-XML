<script>
    import { todos } from "./store";

    export let todo
    export let pos

    function deleteTodo () {
        todos.update (old => {
            old.splice(pos, 1)
            return old
        })
    }
</script>

<div>
    {todo.title}
    <button on:click={deleteTodo}>X</button>
</div>