function address(){
    var ad=document.getElementById('addresspannel');
    var his=document.getElementById('purchasehispannel');

    var menu1=document.getElementById('address');
    var menu2=document.getElementById('purchasehis');

    menu1.style.backgroundColor="rgb(158, 103, 86)";
    menu2.style.backgroundColor="transparent";
    menu1.style.color='white';
    menu2.style.color='rgb(83, 61, 54)';
    
    ad.style.display='flex'
    his.style.display='none'

}
function history(){
    var his=document.getElementById('purchasehispannel');
    var ad=document.getElementById('addresspannel');

    var menu1=document.getElementById('address');
    var menu2=document.getElementById('purchasehis');

    menu1.style.backgroundColor="transparent";
    menu2.style.backgroundColor="rgb(158, 103, 86)";
    menu2.style.color='white';
    menu1.style.color='rgb(83, 61, 54)';

    his.style.display='block'
    ad.style.display='none'
}

