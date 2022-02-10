<template>
  <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light">
          <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <router-link
                    class="nav-link"
                    :to="{name: 'home'}"
                    >
                        Home
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link
                    class="nav-link"
                    :to="{name: 'blog'}"
                    >
                        Blog
                    </router-link>
                </li>
            </ul>
          </div>
      </nav>
  </header>
</template>

<script>
export default {
    name: 'Header',

}
</script>

<style lang="scss" scoped>

</style>