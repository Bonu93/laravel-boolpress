<template>
    <div>
        
        <div class="container">
            <h1 class="mb-5">Boolpress Blog</h1>
            <div class="row">
                <div class="col-4"
                v-for="post in posts" :key="`post-${post.id}`"
                >
                    <div class="card text-center p-3 mb-4">
                        <h2>{{post.title}}</h2>
                        <h5>{{formatDate(post.created_at)}}</h5>
                        <p>{{getExcerpt(post.content, 100)}}</p>

                        <router-link :to="{name: 'post-detail', params: {slug: post.Slug}}">
                            Read more
                        </router-link>
                    </div>
                
                </div>
            </div>

            <div class="pagination d-flex justify-content-center">
                <button 
                class="btn btn-primary"
                @click="getPosts(pagination.current - 1)"
                :disabled="pagination.current === 1"
                >
                    Prev
                </button>

                <button
                    class="mx-2 btn"
                    :class="pagination.current === n ? 'btn-primary' : 'btn-secondary'"
                    v-for="n in pagination.last" :key="`page-${n}`"
                    @click="getPosts(n)"
                >
                    {{ n }}
                </button>


                <button 
                    class="btn btn-primary"
                    @click="getPosts(pagination.current + 1)"
                    :disabled="pagination.current === pagination.last"
                >
                    Next
                </button>

            </div>
        </div>
        
        
        
    </div>
</template>

<script>

import axios from "axios";

export default {
    
    name: 'Blog',
    components: {},
    data() {
        return {
            posts: null,
            pagination: 1,
        }
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts(page = 1) {
            axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
            .then(res => {
                this.posts = res.data.data;
                this.pagination = {
                    current: res.data.current_page,
                    last: res.data.last_page
                }
            })
        },

        getExcerpt(text, maxLength) {
            if(text > maxLength) {
                return text.substr(0, maxLength) + ('...');
            }

            return text;
        },

        formatDate(postDate) {
            const date = new Date(postDate);

            const formatted = new Intl.DateTimeFormat('it-IT').format(date);
            return formatted;
        }
    }

}
</script>

<style>

</style>