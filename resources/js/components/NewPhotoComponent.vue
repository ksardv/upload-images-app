<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload New Photo</div>

                    <div class="card-body">
                        <div v-if="success != ''" class="alert alert-success" role="alert">
                          {{success}}
                        </div>
                        <form @submit="formSubmit" enctype="multipart/form-data">
                        <strong>Title:</strong>
                        <input type="text" class="form-control" v-model="name">
                        <strong>Photo:</strong>
                        <input type="file" class="form-control" v-on:change="onFileChange">

                        <button class="btn btn-success" :disabled="submitted">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        data() {
            return {
              name: '',
              file: '',
              success: '',
              submitted: false
            };
        },
        methods: {
            onFileChange(e){
                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                this.submitted = true;
                let currentObj = this;

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();
                formData.append('file', this.file);
                formData.append('photo_title', this.name);

                axios.post('/photos', formData, config)
                .then(function (response) {
                    currentObj.submitted = false;
                    currentObj.success = response.data.success;
                    if(response.data.success.length){
                        currentObj.$router.push({ path: 'photos-list' });
                    }

                })
                .catch(function (error) {
                    currentObj.submitted = false;
                    currentObj.output = error;
                });
            }
        }
    }
</script>
