var cetak = document.getElementById('cetak');
var aksi1 = document.querySelectorAll('#aksi1');

cetak.addEventListener('click', function(){
  document.getElementById('cetak').style.display = 'none';
  aksi1.forEach(function(e){ e.style.display = 'none'; });
  window.print();
  setTimeout(nonggol, 50);
});

function nonggol(){
  document.getElementById('cetak').style.display = '';
  aksi1.forEach(function(e){ e.style.display = ''; });
}