async function fetchDataAsync() {
  const auth = `Basic ${window.btoa(
    'podolski.malte@gmail.com:p3RBfr2zX3n5jxZ'
  )}`;

  const response = await fetch('https://podolski/api/query', {
    method: 'POST',
    credentials: 'include',
    headers: {
      'Accept': '*/*',
      'Authorization': auth,
      'Content-Type': 'application/json; charset=UTF-8',
    },
    body: JSON.stringify({
      query: "page('portfolio').children",
      select: {
        title: true,
        text: 'page.text.kirbytext',
        slug: true,
        date: "page.date.toDate('d.m.Y')",
      },
    }),
  });

  if (!response.ok) {
    const message = `An error has occured: ${response.status}`;
    throw new Error(message);
  }

  const data = await response.json();

  console.dir(data);
}

function init() {
  fetchDataAsync();
}

export { init };
