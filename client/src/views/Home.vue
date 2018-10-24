<template>
  <div class="home">
    <the-header />
  </div>
</template>

<script>
// @ is an alias to /src
import TheHeader from '@/components/TheHeader.vue';

export default {
  name: 'home',
  components: {
    TheHeader,
  },
};
</script>
