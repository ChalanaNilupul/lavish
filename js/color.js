function color(){

    var color1=document.getElementById('color1');
    var color2=document.getElementById('color2');
    var color3=document.getElementById('color3');
    var c1=document.getElementById('c1');
    var c2=document.getElementById('c2');
    var c3=document.getElementById('c3');
 
   

    if(color1.checked){
        c1.style.border='3px solid rgb(83, 61, 54)';
    }
    if(color2.checked){
        c2.style.border='3px solid rgb(83, 61, 54)';
    }
    if(color3.checked){
        c3.style.border='3px solid rgb(83, 61, 54)';
    }
    if(!color1.checked){
        c1.style.border='0px ';
    }
    if(!color2.checked){
        c2.style.border='0px';
    }
    if(!color3.checked){
        c3.style.border='0px ';
    }
    
    
}