function img1(){
    var img1 = document.getElementById('img1');
    var img2 = document.getElementById('img2');
    var img3 = document.getElementById('img3');
    var mainImg = document.getElementById('mainImg');

    var img=img1.innerHTML;

    mainImg.innerHTML= img;

    img3.style.opacity='1'
    img1.style.opacity='0.5'
    img2.style.opacity='1'

}
function img2(){
    var img1 = document.getElementById('img1');
    var img2 = document.getElementById('img2');
   var img3 = document.getElementById('img3');
    var mainImg = document.getElementById('mainImg');

    var img=img2.innerHTML;

    mainImg.innerHTML= img;
    img3.style.opacity='1'
    img1.style.opacity='1'
    img2.style.opacity='0.5'

}
function img3(){
    var img1 = document.getElementById('img1');
    var img2 = document.getElementById('img2');
    var img3 = document.getElementById('img3');
    var mainImg = document.getElementById('mainImg');

    var img=img3.innerHTML;

    mainImg.innerHTML= img;
    img3.style.opacity='0.5'
    img1.style.opacity='1'
    img2.style.opacity='1'

}