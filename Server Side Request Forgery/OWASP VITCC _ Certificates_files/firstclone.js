var input=document.querySelector('.search-form');var search=document.querySelector('input')
var button=document.querySelector('.button');button.addEventListener('click',function(e){e.preventDefault();input.classList.toggle('active');})
search.addEventListener('focus',function(){input.classList.add('focus');})
search.addEventListener('blur',function(){search.value.length!=0?input.classList.add('focus'):input.classList.remove('focus');})
document.addEventListener('DOMContentLoaded',function(){particleground(document.getElementById('particles'),{dotColor:'#fff',lineColor:'#000',directionX:'right',density:'7000',particleRadius:'12',lineWidth:'0.5',});var intro=document.getElementById('intro');intro.style.marginTop=-intro.offsetHeight/2+'px';},false);