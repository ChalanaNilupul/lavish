
        function h3(){
            var text=document.getElementById('h3');

           // console.log(text)

           text.style.top="-20px"
        }
        function h4(){
            var text=document.getElementById('h4');

           // console.log(text)

           text.style.top="-20px"
        }
        function h5(){
            var text=document.getElementById('h5');

           // console.log(text)

           text.style.top="-20px"
        }
        function h6(){
            var text=document.getElementById('h6');

           // console.log(text)

           text.style.top="-20px"
        }

        function onout(){
            var h3=document.getElementById('h3');
            var h4=document.getElementById('h4');
            var h5=document.getElementById('h5');
            var h6=document.getElementById('h6');
            // console.log(text)

            var h3text=h3.value;
            var h4text=h3.innerText;
            var h5text=h3.innerText;
            var h6text=h3.innerText;


            if(h3text == null){
                h3.style.top="5px"
               alert(h3text)
            }
            else{
                h3.style.top="-20px"
                console.log('not empty')
            }

            
            // h4.style.top="5px"
            // h5.style.top="5px"
            // h6.style.top="5px"
        }

  