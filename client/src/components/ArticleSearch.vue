<template>
    <form id="req" >
        Here are the articles of
        <select name="site">
            <option value="www.bbc.com">www.bbc.com</option>
            <option value="www.yourstory.com">www.yourstory.com</option>
        </select>
        sorted by popularity from
        <input type="date" name="fromDate" value=2018-04-28 > to
        <input type="date" name="toDate" value="2018-04-29" >
    </form>
</template>

<script>
export default {
  name: 'ArticleSearch',
};
</script>
