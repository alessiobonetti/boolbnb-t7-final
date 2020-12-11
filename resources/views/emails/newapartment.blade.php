<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="height:50px; background: rgb(1,34,37);
    background: linear-gradient(7deg, rgba(1,34,37,1) 51%, rgba(2,102,112,1) 100%);"></div>

    <h1 style="text-align:center; color:#0454A8; margin-top:65px">Grazie, il tuo appartamento ({{$apartment->title}}) è stato creato correttamente!</h1>
    <div style="display:flex; justify-content:center; margin-top:200px" >
        <a href="{{url('')}}"> <img src="http://localhost:8000/images/logo.png" alt="img_logo"> </a>
    </div>

    <h6 style="text-align:center; color:#0454A8; mt-30px">Team@7</h6>
</body>
</html>