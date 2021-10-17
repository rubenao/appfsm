<template>

    <input 
        type="submit" 
        class="btn btn-danger d-block w-100 mb-2" 
        value="Eliminar ×"
        @click="eliminar"
        
    >
    
</template>

<script>
export default {

    props: ['rutinaSlug'],
    methods: {

        eliminar(){

          this.$swal({
                        title: '¿Deseas eliminar esta rutina?',
                        text: "Una vez eliminada, no se puede recuperar",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.value) {
                            const params = {
                                slug: this.rutinaSlug
                            }

                            // Enviar la petición al servidor
                            axios.post(`/usuarios/rutinas/${this.rutinaSlug}`, {params, _method: 'delete'})
                                .then(respuesta => {
                                    this.$swal({
                                        title: 'Receta Eliminada',
                                        text: 'Se eliminó la receta',
                                        icon: 'success'
                                    });

                                    // Eliminar receta del DOM
                                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);

                                })
                                .catch(error => {
                                    console.log(error)
                                })
                        }
                    })

        }


    }
    
    
}
</script>