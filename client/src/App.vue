<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<style>

body {
    background-color: #5e387f;
    margin: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

header:after,
#timeline  {
    content: '';
    display: block;
    width: 100%;
    clear: both;
}

#aviframe {
    margin: 0 auto;
        background-color: #9e939f;

}

.headerContainer {
    max-width: 1100px;
    margin: 0 auto;
}


header {
    background: #2b2e48;

}

header .logo {
    color: #ee4d4d;
    float: left;
    font-size: 22px;
    font-weight: 500;
}

header .logo>span {
    color: #f7aaaa;
    font-weight: 300;
}


/*
     Form
*/
#req {
    font-size: xx-large;
    color: #303632;
    margin: 0.5em;
    padding: 20px;
    line-height: 2;
    text-align: center;
    border-radius: 20px;
    box-shadow: 1px 1px 6px 6px #2b2e99;
background-color: lightyellow;

}

/*
     Form - Inputs
*/

input, select{
  text-align: center;
  border-radius: 10px;
  font-family: Roberto;
  font-size: inherit;
  border: 0px solid #aaa;
  border-bottom-width: 1px;
  background-color: rgba(100, 10, 10, 0.09);
  margin: 10px;

}

/*
     Iframes
*/

.iframe-container {
  overflow: hidden;
  padding-top: 120%;
  position: relative;
}

.iframe-container iframe {
  border: 0;
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
}

/* CARD */

.column {
    float: left;
    width: 32%;
    margin-bottom: 16px;
    padding: 0 8px;
}

/* Display the columns below each other instead of side by side on small screens */
@media screen and (max-width: 1000px) {
    .column {
        width: 100%;
        display: block;
    }
}

/* Add some shadows to create a card effect */
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
 position: relative;
    background: lightyellow;
    border-radius: 5px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 10px;

}

.card:hover
{
        background: #2b2e48;

}


/* Some left and right padding inside the container */
.container {
    padding: 0 16px;
}

/* Clear floats */
.container::after, .row::after {
    content: "";
    clear: both;
    display: table;
}

/*
Overlay on hover

*/
.card
{
position: relative;

}

.container {
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  background-color: #2b2e48;
  overflow: hidden;
  height:0;
  transition: 1s ease;
    color: pink;

}

.card:hover .container {
  /* bottom: 0; */
  height: 100%;
}


/* Card by adin234  */

.center-image {
    height: 400px;
    width: 100%;
    background-size: cover;
    background-position: center;
}
/* styles for '...' */
.block-with-text {
    display: block; /* Fallback for non-webkit */
    text-align: center;
    display: -webkit-box;
    max-width: 400px;
    height: 62; /* Fallback for non-webkit */
    margin: 10px auto 0 auto;
    font-size: 24;
    line-height: 1.3;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
.meta {

    display: grid;
    grid-template-columns: 45% 55%;
    grid-template-rows: 50% 50%;
}

p.description {
color:lightblue;
}
.date {
    position: absolute;
    right: 0px;
    color: whitesmoke;
    font-style: italic;
    left:0px;
    bottom: 0px;
}
.card .container a {
    position: absolute;
    bottom: 0px;
    right: 0px;
    color: lightblue;
    font-style: italic;
    font-size: 16px;
}
.card .container a:hover {
    color: white;
}
</style>
