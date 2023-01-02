//update qty function 

function addQty(){
   
    console.log("addqty")
    var currentValue = parseInt(document.getElementById("quantity").value)+1;
   var point= document.getElementById("quantity").value =(currentValue)<=20?currentValue:20;

   document.getElementById('quantity').innerHTML=point;

}

//remove qty function
function removeQty(){
   
     console.log("removeqty")
     var currentValue = parseInt(document.getElementById("quantity").value)-1;
     var point=document.getElementById("quantity").value =(currentValue)>0?currentValue:1
 
     document.getElementById('quantity').innerHTML=point;
 }