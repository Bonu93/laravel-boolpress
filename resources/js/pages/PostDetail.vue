<template>
  <div>
      <div v-if="post" class="container">
        <h1> {{post.title}}</h1>
        <div class="tags mb-4">
            <span 
                class="badge badge-success mr-2"
                v-for="tag in post.tags"
                :key="`tag-${tag.id}`"
            >
                {{tag.name}}
            </span>
        </div>
        <h5 v-if="post.category">Category: {{post.category.name}}</h5>

        <p>{{post.content}}</p>

      </div>

  </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'PostDetail',
    data() {
        return {
            post: null,
        }
    }, 
    created() {
        this.getPost();
    },
    methods: {
        getPost() {
            axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
            .then(res => {
                this.post = res.data;
            })
            .catch(err => log.error(err));
        }
    }

}
</script>

<style lang="scss" scoped>

</style>