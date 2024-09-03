<template>
    <pre>{{ games }}</pre>
</template>

<script>
export default {
    props: {
        games: {
            type: Array,
            default: [],
        }
    },
    setup() {
        
    },
}
</script>
