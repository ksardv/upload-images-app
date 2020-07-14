<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Images</div>

                    <div class="card-body">
                        <div v-if="photos.length"></div>
                        <div v-else>You have not uploaded any photos yet.</div>
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
                photos: {}
            }
        },
        methods: {
            uploadImage: function () {
                axios
                    .post('/photos')
                    .then((response) => {
                        console.log(response.data);
                        this.photos = response.data
                    })
                    .catch(error => console.log(error))
            }
        },
        mounted() {
            axios
                .get('/photos')
                .then((response) => {
                    this.photos = response.data
                })
                .catch(error => console.log(error))
        }
    }
</script>
