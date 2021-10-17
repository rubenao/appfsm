<template>
    <input
        type="submit" 
        class="btn btn-danger d-block w-100 mb-2" 
        value="Eliminar ×"
        @click="eliminarEntrada" 
    >
</template>

<script>
export default {
    props: ['entradaSlug'],

    methods:{

        eliminarEntrada(){

            this.$swal({
                        title: '¿Deseas eliminar esta entrada?',
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
                                slug: this.entradaSlug
                            }

                            // Enviar la petición al servidor
                            axios.post(`/usuarios/blog/${this.entradaSlug}`, {params, _method: 'delete'})
                                .then(respuesta => {
                                    this.$swal({
                                        title: 'Entrada Eliminada',
                                        text: 'Se eliminó la entrada',
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