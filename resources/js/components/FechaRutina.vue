<template>

    <span v-text="formatearfecha"></span>
    
</template>

<script>
export default {
    props: ['fecha'],

    /**mounted(){
         console.log('la fecha es ', this.fecha);
    },*/
    
    computed: {
        formatearfecha() {

            return moment(this.fecha).locale('es').format('DD [de] MMMM [del] YYYY')

        }
    }
}
</script>