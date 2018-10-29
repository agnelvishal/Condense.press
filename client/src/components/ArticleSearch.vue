<template>
    <form id="req" >
        Here are the articles of
        <select :value="source" @input="setSource($event.target.value); getFeeds();">
          <option v-for="source in sources" :key="source" :value="source">
            {{ source }}
          </option>
        </select>
        sorted by popularity from
        <input  type="date" name="fromDate" :value="startDate"
                @input="setStartDate(new Date($event.target.value)); getFeeds();"> to
        <input  type="date" name="toDate" :value="endDate"
                @input="setEndDate(new Date($event.target.value)); getFeeds();">
    </form>
</template>

<script>
export default {
  name: 'ArticleSearch',
  created() {
    this.initializeData();
  },
  computed: {
    source() {
      return this.$store.getters['feeds/source'];
    },
    sources() {
      return this.$store.getters['feeds/sources'];
    },
    startDate() {
      return this.$store.getters['feeds/startDate'];
    },
    endDate() {
      return this.$store.getters['feeds/endDate'];
    },
  },
  methods: {
    initializeData() {
      const yesterday = new Date();
      yesterday.setDate(yesterday.getDate() - 1);
      this.setStartDate(yesterday);
      const today = new Date();
      this.setEndDate(today);
      if (this.sources.length > 0) {
        this.setSource(this.sources[0]);
      }
      this.getFeeds();
    },
    setSource(source) {
      this.$store.dispatch('feeds/setSource', source);
    },
    setStartDate(date) {
      this.$store.dispatch('feeds/setStartDate', date);
    },
    setEndDate(date) {
      this.$store.dispatch('feeds/setEndDate', date);
    },
    async getFeeds() {
      try {
        await this.$store.dispatch('feeds/getFeedsBetween');
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
