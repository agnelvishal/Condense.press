<template>
    <div class="card">
        <div class="center-image" :style="`background-image: url(${image});`"></div>
        <h2 class="block-with-text">{{ title }}</h2>
        <div class="container">
            <span class="date">{{ date }}</span>
            <div class="meta">
                <div class="meta-item">
                  <p class="label">Total Popularity:</p>
                  <p>{{ popularity }}</p>
                </div>
                <div class="meta-item">
                  <p class="label">Search Engine Popularity:</p>
                  <p>{{ searchPopularity }}</p>
                </div>
                <div class="meta-item">
                  <p class="label">Facebook Shares</p>
                  <p>{{ fbShares }}</p>
                </div>
                <div class="meta-item">
                  <p class="label">Facebook Likes:</p>
                  <p>{{ fbLikes }}</p>
                </div>
            </div>
            <p class="description">
              {{ description }}
            </p>
            <a target="_blank" :href="source">Read more</a>
        </div>
    </div>
</template>

<script>
export default {
  name: 'Article',
  props: {
    title: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      required: true,
    },
    date: {
      type: String,
      required: true,
    },
    image: {
      type: String,
      required: true,
    },
    source: {
      type: String,
      required: true,
    },
    popularity: {
      type: Number,
      default: 0,
    },
    searchPopularity: {
      type: Number,
      default: 0,
    },
    fbShares: {
      type: Number,
      default: 0,
    },
    fbLikes: {
      type: Number,
      default: 0,
    },
  },
};
</script>
