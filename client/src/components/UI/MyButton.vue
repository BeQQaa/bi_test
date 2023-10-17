<template>
    <button class="btn">
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: "my-button"
}

</script>

<style>
.btn {
    width: 200px;
    height: 50px;
    background: #5B466C;
    color: #FFF;
    font-size: 20px;
    cursor: pointer;
}
</style>