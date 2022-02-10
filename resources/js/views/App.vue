<template>
  <div>
      <Header />

      <main>
          <router-view></router-view>
          
      </main>

      <footer>

      </footer>
  </div>
</template>

<script>
import Header from '../components/Header';


export default {
    name: 'App',
    components: {
        Header,
        
    }

}
</script>

<style>

</style>