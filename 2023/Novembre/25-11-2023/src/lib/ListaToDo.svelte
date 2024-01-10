<script>
    import TodOcomponent from "./TODOcomponent.svelte";

    export let todolist = []
</script>

{#each todolist as todo, pos}
    <TodOcomponent {todo} {pos} />
{/each}