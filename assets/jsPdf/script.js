const options = {
    margin: 0.3,
    filename: 'filename.pdf',
    image: { 
      type: 'jpeg', 
      quality: 0.98 
    },
    html2canvas: { 
      scale: 2 
    },
    jsPDF: { 
      unit: 'in', 
      format: 'a4', 
      orientation: 'portrait' 
    }
  }
  
  var objstr = document.getElementById('block1').innerHTML;
  var objstr1 = document.getElementById('block2').innerHTML;
  
  var strr = '<html><head><title>Testing</title>';   
  strr += '</head><body>';
  strr += '<div style="border:0.1rem solid #ccc!important;padding:0.5rem 1.5rem 0.5rem 1.5rem;margin-top:1.5rem">'+objstr+'</div>';
  strr += '<div style="border:0.1rem solid #ccc!important;padding:0.5rem 1.5rem 0.5rem 1.5rem;margin-top:1.5rem">'+objstr1+'</div>';
  strr += '</body></html>';
  
  $('.btn-download').click(function(e){
    e.preventDefault();
    var element = document.getElementById('demo');
    //html2pdf().from(element).set(options).save();
    //html2pdf(element);
    html2pdf().from(strr).set(options).save();
  });