<template>
    <div class="row">
        <div class="column">
          <app-article />
        </div>
    </div>
</template>

<script>
import Article from '@/components/Article.vue';

export default {
  name: 'ArticleGrid',
  components: {
    appArticle: Article,
  },
};
</script>
