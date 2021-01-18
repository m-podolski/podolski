
function fetchData() {

  const base = 'https://localhost:3000';
  // CSRF-Token in gallery.php
  const token = csrf;

  fetch(base + '/api/pages/portfolio', {
    method: 'GET',
    credentials: 'same-origin',
    // mode: 'no-cors',
    // auth: {
    //   email: 'podolski.malte@gmail.com',
    //   password: 'vp3RBfr2zX3n5jxZ'
    // },
    headers: {
      // 'Authorization': token,
      'Content-Type': 'application/json',
      'X-CSRF': token
    }
  })
  .then(response => response.json())
  .then(response => {
    const page = response.data;
    console.dir(page);
  })
  .catch(error => {
    console.log('Fetch error!');
  });
}



function init() {

  fetchData();
}

export { init };
