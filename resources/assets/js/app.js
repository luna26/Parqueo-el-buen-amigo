require('./login');
require('./dashboard');

function imprSelec(historial){
    var ficha=document.getElementById(historial);
    var ventimp=window.open(' ','popimpr');
    ventimp.document.write(ficha.innerHTML);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
  }