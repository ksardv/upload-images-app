<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link to="/photos-list">My photos</router-link>
            <router-link to="/new-photo">Upload new photo</router-link>
        </nav>
        <router-view default="{name: 'photos-list'}"></router-view>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
