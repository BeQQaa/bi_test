<script setup>

</script>

<template>
    <div class="footerContainer">
        <div class="footerBlock">
            <div>About</div>
            <div>Contacts</div>
            <div>Help</div>
            <div>Companies</div>
        </div>
        <div class="footerBlock1">
            by Oleh Butskyi
        </div>
    </div>
</template>

<style scoped>
.footerContainer {
    display: flex;
    padding: 0 50px;
    justify-content: space-between;
    align-items: center;
    background: #474747;
    height: 200px;
    width: 100%;
    color: #FFF;
    font-size: 20px;
}

.footerBlock {
    display: flex;
    gap: 70px;
    align-items: center;
}
.footerBlock1 {
    height: 100%;
    padding: 20px;
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
}
</style>