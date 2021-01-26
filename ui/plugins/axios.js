export default function ({ $axios, redirect, store }) {
  $axios.setHeader('Content-Type', 'application/json');

  $axios.onError(error => {
    const code = parseInt(error.response && error.response.status)
      let err = error.response?.data;
      switch(typeof err) {
        case 'object': alert(Object.values(err).flat().join('\n')); break;
        case 'string': alert(err); break;
        default: alert('Ошибка');
      }
  });
}