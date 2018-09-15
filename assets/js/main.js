(() => {
  /* Event listeners for navigating between section */
  const c2aBtnElem = document.getElementById('c2a-btn');
  c2aBtnElem.addEventListener('click', evt => {
    window.location.href = '#section-2';
  });

  const toNextSectionElems = document.querySelectorAll(
    '.to-next-section__icon'
  );
  toNextSectionElems.forEach((elem, i) => {
    elem.addEventListener('click', evt => {
      window.location.href = `#section-${i + 2}`;
    });
  });
})();
