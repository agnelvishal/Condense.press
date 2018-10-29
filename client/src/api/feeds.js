import axios from 'axios';

// http://condense.press.test/rest-api/public/feeds
const getFeeds = () => {
  const url = '/rest-api/public/feeds';
  return new Promise((resolve, reject) => {
    axios.get(url)
      .then((response) => {
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
  });
};

// http://condense.press.test/rest-api/public/feeds/between?startDate=2018-04-28&endDate=2018-04-29
const getFeedsBetween = (startDate, endDate) => {
  const url = '/rest-api/public/feeds/between';
  const params = {
    startDate,
    endDate,
  };
  return new Promise((resolve, reject) => {
    axios.get(url, { params })
      .then((response) => {
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
  });
};


export { getFeeds, getFeedsBetween };
