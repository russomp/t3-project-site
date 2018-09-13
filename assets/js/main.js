(() => {
  const learnMoreTextEl = document.getElementsByClassName(
    'learn-more__text'
  )[0];
  const learnMoreArrowEl = document.getElementsByClassName(
    'learn-more__icon'
  )[0];
  let learnMoreClickHandler = evt => {
    window.location.href = '#project-details';
  };
  learnMoreTextEl.addEventListener('click', learnMoreClickHandler);
  learnMoreArrowEl.addEventListener('click', learnMoreClickHandler);
})();
