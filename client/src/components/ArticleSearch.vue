<template>
    <form id="req" >
        Here are the articles of
        <select name="site">
            <option value="www.bbc.com">www.bbc.com</option>
            <option value="www.yourstory.com">www.yourstory.com</option>
        </select>
        <select >
        </select>

        sorted by popularity from
        <input type="date" name="fromDate" > to
        <input type="date" name="toDate" >
    </form>
</template>

<script>
export default {
  name: 'ArticleSearch',
  created() {
    const today = new Date();
    const yesterday = new Date();
    yesterday.setDate(yesterday.getDate() - 1);
    this.setStartDate(today);
    this.setEndDate(yesterday);
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
    setStartDate(date) {
      this.$store.dispatch('feeds/setStartDate', date);
    },
    setEndDate(date) {
      this.$store.dispatch('feeds/setEndDate', date);
    },
  },
};
</script>
