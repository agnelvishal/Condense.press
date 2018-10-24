<template>
  <div class="home">
    <the-header />
    <article-search />
    <news-chart />
    <article-grid />
  </div>
</template>

<script>
// @ is an alias to /src
import TheHeader from '@/components/TheHeader.vue';
import ArticleSearch from '@/components/ArticleSearch.vue';
import NewsChart from '@/components/NewsChart.vue';
import ArticleGrid from '@/components/ArticleGrid.vue';

export default {
  name: 'home',
  components: {
    TheHeader,
    ArticleSearch,
    NewsChart,
    ArticleGrid,
  },
};
</script>
