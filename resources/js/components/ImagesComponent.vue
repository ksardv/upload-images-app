<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Images</div>

                    <div class="card-body">
                        Images
                    </div>
                    <button v-on:click="uploadImage">Upload</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                images: {}
            }
        },
        methods: {
            uploadImage: function () {
                axios
                    .post('/images')
                    .then((response) => {
                        console.log(response.data);
                        //this.images = response.data
                    })
                    .catch(error => console.log(error))
            }
        },
        mounted() {
            axios
                .get('/images')
                .then((response) => {
                    this.images = response.data
                })
                .catch(error => console.log(error))
        }
    }
</script>
