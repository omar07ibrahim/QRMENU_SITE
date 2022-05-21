document.querySelectorAll('.dots circle').forEach((item, i) => {
  item.addEventListener('click', event => {
    alert(`Карточка блюда #${i+1}`);
  });
});
