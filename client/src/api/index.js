import axios from 'axios';

export const http = (type = 'api') => {
  const token = localStorage.getItem('access_token');
  // const baseURL = process.env.VUE_APP_BASE_URL;
  const baseURL = "http://localhost/api";

  let options;

  if (type === 'login') {
    options = {
      headers: {
        'accept': 'application/json',
        'Content-Type': 'application/json',
        'Access-Control-Allow-Origin': '*'
      },
      // withCredentials: true,
      baseURL
    };
  } else if (type === 'api' || type === 'cors') {
    options = {
      headers: {
        'accept': '*/*',
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`,
        'Access-Control-Allow-Origin': '*'
      },
      // withCredentials: true,
      baseURL
    };
  } else {
    options = {
      headers: {
        // 'accept': '*/*',
        'Access-Control-Allow-Origin': '*'
      },
      // withCredentials: true,
      baseURL
    };
  }

  let instance = axios.create(options);

  instance.interceptors.response.use(
    (response) => response,
    (error) => Promise.reject({ ...error }),
  );

  return instance;
};
