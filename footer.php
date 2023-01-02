<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>

        /*----------------------------------------------------- Footer-----------------------------------------------------------*/
        @import url('https://fonts.googleapis.com/css2?family=Righteous&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Righteous', cursive;
}
.footer {
    width: 100%;
    min-height: 300px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #fdc9d3;
    position: relative;
    color: rgb(158, 103, 86);
}

.footerIn {
    width: 80%;
    display: block;

}

.footerIn .news {
    text-align: center;
}

.copyright {
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
    position: absolute;
    width: 80%;
    font-size: 15px;
    bottom: 10px;
}

.news input[type='text'] {
    width: 300px;
    height: 30px;
    padding: 5px;
    margin-top: 10px;
    border: 0px;
    color: rgb(158, 103, 86);
   outline-color:rgb(158, 103, 86) ;
}
.news input[type='text']::placeholder{
    color: rgb(158, 103, 86);
}

.news button {
    width: 100px;
    height: 30px;
    cursor: pointer;
    background-color: #E06C88;
    border: none;
    color: white;
    transition: .5s;
}
.news button:hover{
    background-color: #ec5074;
}
.news ul {
    list-style: none;
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.news ul li {
    margin: 0px 20px;
}

.news ul li a {
    text-decoration: none;
    color: rgb(158, 103, 86);
    font-weight: 50;
    text-decoration: underline;
}
@media only screen and (max-width:540px) {
    .news ul {

display: block;
text-align: left;

}

.copyright {
font-size: 10px;
}

}
@media only screen and (max-width:499px) {
    .news input[type='text'] {
        width: 80%;

    }

    .news button {
        width: 80%;
        margin-top: 5px;


    }

}
@media only screen and (max-width:280px) {
    .footer {

height: 400px;

}

.news input[type='text'] {
width: 200px;

}

.news button {
width: 200px;
margin-top: 5px;


}

}
    </style>
</head>
<body>
     <!-------------------------------------------------------Footer----------------------------------------------->
 <div class="footer">
    <div class="footerIn">
        <div class="news">
            <p>Sign up now to receive updates of new arrivals and
                special offers.</p>
            <input type="text" name="news" id="news"
                placeholder="E-Mail"><button>Subscribe</button>


            <ul>
                <li><a href="">Privacy Policy </a></li>
                <li><a href="">Refund and Returns Policy </a></li>
                <li><a href="">Terms and Conditions</a></li>
            </ul>

        </div>

        <div class="copyright">
            <p> ©2022 Lavish. All rights reserved | Developed
                by CFS Devs</p>

        </div>
    </div>
</div>
</body>
</html>