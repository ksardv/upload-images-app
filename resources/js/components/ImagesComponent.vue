<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Images</div>

                    <div class="card-body">
                        <!-- <div v-if="photos.length"> -->
                        <div v-if="photos.length">
                            <div class="container">
                                <p>Click on the images to enlarge them.</p>
                                <div class="row">
                                    <div v-for="photo in photos" :key="photo.photo_title">
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <a href="#" target="_blank">
                                                    <div class="caption">
                                                        <p>{{photo.photo_title}}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>You have not uploaded any photos yet.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                photos: {}            }
        },
        methods: {

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
