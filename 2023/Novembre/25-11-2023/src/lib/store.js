import { writable } from "svelte/store";

export const todos = writable ([
    {
        title: "cosa fare",
        done: false
    }
])