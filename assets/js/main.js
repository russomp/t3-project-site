(() => {
  const toNextSectionElems = document.querySelectorAll(
    '.to-next-section__icon'
  );
  toNextSectionElems.forEach((elem, i) => {
    elem.addEventListener('click', evt => {
      console.log(i);
      window.location.href = `#section-${i + 2}`;
    });
  });
})();
