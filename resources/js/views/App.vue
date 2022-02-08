<template>
    <div>
        
        <div class="container">
            <h1>Boolpress Blog</h1>
            <div class="row">
                <div class="col-4"
                v-for="post in posts" :key="`post-${post.id}`"
                >
                    <div class="card text-center p-3 mb-4">
                        <h2>{{post.title}}</h2>
                        <p>{{post.content}}</p>
                    </div>
                
                </div>
            </div>
        </div>
        
        
    </div>
</template>

<script>

import axios from "axios";

export default {
    
    name: 'App',
    components: {},
    data() {
        return {
            posts: null,
        }
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios.get('http://127.0.0.1:8000/api/posts')
            .then(res => {
                this.posts = res.data;
                console.log(this.posts);
            })
        }
    }

}
</script>

<style>

</style>