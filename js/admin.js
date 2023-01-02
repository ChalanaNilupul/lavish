

function add(){
    var add=document.getElementById('addBlogSec');
    var users=document.getElementById('usersSec');
    var test=document.getElementById('testSec');
    var dash=document.getElementById('dashboard');
    var menu1=document.getElementById('menu1');
                var menu2=document.getElementById('menu2');
                var menu3=document.getElementById('menu3');
                var menu4=document.getElementById('menu4');

                menu1.style.backgroundColor="transparent";
                menu2.style.backgroundColor="pink";
                menu3.style.backgroundColor="transparent";
                menu4.style.backgroundColor="transparent";

    dash.style.display="none";
    add.style.display="flex";
   
    users.style.display="none";
    test.style.display="none";
}
function users(){
    var add=document.getElementById('addBlogSec');
    var users=document.getElementById('usersSec');
    var test=document.getElementById('testSec');
    var dash=document.getElementById('dashboard');
    var menu1=document.getElementById('menu1');
    var menu2=document.getElementById('menu2');
    var menu3=document.getElementById('menu3');
    var menu4=document.getElementById('menu4');

    menu1.style.backgroundColor="transparent";
    menu2.style.backgroundColor="transparent";
    menu3.style.backgroundColor="pink";
    menu4.style.backgroundColor="transparent";

    dash.style.display="none";
    add.style.display="none";
    users.style.display="flex";
    
    test.style.display="none";
}
function test(){
    var add=document.getElementById('addBlogSec');
    var users=document.getElementById('usersSec');
    var test=document.getElementById('testSec');
    var dash=document.getElementById('dashboard');
    var menu1=document.getElementById('menu1');
    var menu2=document.getElementById('menu2');
    var menu3=document.getElementById('menu3');
    var menu4=document.getElementById('menu4');

    menu1.style.backgroundColor="transparent";
    menu2.style.backgroundColor="transparent";
    menu3.style.backgroundColor="transparent";
    menu4.style.backgroundColor="pink";

    dash.style.display="none";
    add.style.display="none";
    users.style.display="none";
    test.style.display="flex";
   
}
