<template>
    <div class="row">
      <div class="column"
            v-if="feeds && feeds.length > 0"
            v-for="(feed, index) in feeds" :key="index">
        <feed-article
          :title="feed.item_title"
          :description="feed.item_title"
          :date="feed.item_date"
          :image="feed.image"
          :source="feed.item_url"
          :popularity="feed.total"
          :searchPopularity="feed.pa"
          :fbShares="feed.pa"
          :fbLikes="feed.likes" />
      </div>
    </div>
</template>

<script>
import Article from '@/components/Article.vue';

export default {
  name: 'ArticleGrid',
  components: {
    feedArticle: Article,
  },
  computed: {
    feeds() {
      return this.$store.getters['feeds/feeds'];
    },
  },
};
</script>
