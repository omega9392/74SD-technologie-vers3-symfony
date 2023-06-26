(() => {
  'use strict'

  document.querySelector('#navbarSideCollapse').addEventListener('click', () => {
    document.querySelector('.offcanvas-collapse').classList.toggle('open')
    // document.querySelector('.offcanvas-collapse').classList.toggle('close')

  })
})();
