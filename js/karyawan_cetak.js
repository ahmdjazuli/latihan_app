var cetak = document.getElementById('cetak');

cetak.addEventListener('click', function(){
  document.getElementById('cetak').style.display = 'none';
  window.print();
  setTimeout(nonggol, 50);
});

function nonggol(){
  document.getElementById('cetak').style.display = '';
}