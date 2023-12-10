function atualizarValor() {
    const opcoes = document.getElementsByName('delivery');
    var toremove = document.getElementById('toremove');
    var delivery = document.getElementById('delivery');
    let total = "<?php echo $total; ?>";
    const taxa = 6.00;
    let totalAmount = 0;

for (let i = 0; i <opcoes.length; i++) {
    if (opcoes[i].checked) {
      
        if (opcoes[i].value === '0') {
          
            delivery.style.display = 'none';
            toremove.style.display = 'block';
          
        } else if (opcoes[i].value === '1') {

          toremove.style.display = 'none';
          delivery.style.display = 'block';
          totalAmount = parseFloat(total) + parseFloat(taxa);
          
        }
    }
          totalAmount = totalAmount.toFixed(2);
          totalAmount = totalAmount.replace(".",",");
          delivery.innerHTML = 'R$' + "_" + totalAmount;
}
}
