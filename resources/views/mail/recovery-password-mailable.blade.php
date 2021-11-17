<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<style>
    body{
       background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='1440' preserveAspectRatio='none' viewBox='0 0 1440 1440'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1015%26quot%3b)' fill='none'%3e%3crect width='1440' height='1440' x='0' y='0' fill='rgba(0%2c 0%2c 0%2c 1)'%3e%3c/rect%3e%3cpath d='M841.8911369743596 326.1313670384152L865.8910375252285-17.083200933840487 522.6764695529728-41.0831014847094 498.6765690021039 302.1314664875463z' fill='rgba(255%2c 0%2c 0%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M233.1480377833047 468.61061611919865L421.38156267512124 701.0596607726726 653.8306073285952 512.826135880856 465.5970824367786 280.37709122738204z' fill='rgba(255%2c 0%2c 0%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M719.459398822065 557.4905907844067L707.9401974564687 218.35757657829356 453.68161170889016 371.13154780365574z' fill='rgba(255%2c 0%2c 0%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1082.679%2c1323.611C1213.68%2c1332.901%2c1364.222%2c1326.984%2c1434.109%2c1215.793C1506.832%2c1100.09%2c1463.008%2c950.94%2c1389.207%2c835.921C1321.783%2c730.84%2c1207.422%2c662.87%2c1082.679%2c668.089C965.89%2c672.975%2c873.547%2c757.218%2c817.572%2c859.835C764.244%2c957.599%2c752.87%2c1074.721%2c808.136%2c1171.403C863.793%2c1268.768%2c970.81%2c1315.678%2c1082.679%2c1323.611' fill='rgba(255%2c 0%2c 0%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M375.68236987131723 293.82359663879345L209.53869188528324-62.47267060116803-146.75757535467818 103.67100738486596 19.386102631355755 459.96727462482744z' fill='rgba(255%2c 0%2c 0%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M941.503%2c964.793C1024.251%2c964.315%2c1084.8%2c896.395%2c1125.822%2c824.53C1166.401%2c753.44%2c1190.074%2c669.068%2c1151.525%2c596.857C1111.027%2c520.994%2c1027.498%2c479.75%2c941.503%2c479.258C854.609%2c478.761%2c768.641%2c518.012%2c727.279%2c594.431C687.533%2c667.865%2c711.65%2c754.401%2c753.458%2c826.681C795.193%2c898.835%2c858.149%2c965.275%2c941.503%2c964.793' fill='rgba(255%2c 0%2c 0%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1015'%3e%3crect width='1440' height='1440' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e");  z-index: 1000; width: 100%; height: 100%; position: absolute;  overflow-y: scroll; margin-top: 1rem;     background-position: center;
    background-repeat: no-repeat;
    background-size: cover; 
    color: #fff;
    width: 100%;
    height: 100%;
  
    }
    .container{
        width: 100%;
        height: 100%;
    }
    .content{
        display: flex;
        justify-content: space-around;
        flex-direction: column;
        align-content: center
        width: 10%;
        height: 90%;
    }
    title{
        display: flex;
        font-size: 2rem;
        width: 100%;
    }
    .body{
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-content: center;

        width: 100%;
        padding: 2rem;
    }
    .body-title{
        font-size: 1rem;
        align-self: flex-start;
        display: flex;
        justify-content: start;
        align-items: start;
        margin: 2rem;
        width: 100%;
    }
    .body-credentials-contianer{
        display: flex;
        justify-content: space-around;
        align-items: center;
        align-self: center;
        display: flex;
        width: 100%;

    }
    .body-credentials-contianer-2{
        display: flex;
        justify-content: space-around;
        align-items: center;
        align-self: center;
        display: flex;
        width: 40%;
        min-height: 10rem;
        padding: 1rem;
        border-radius: 5px;
        background-color: rgb(255, 255, 255);
        color: #000;
    }
    .cred-container{ 
        margin: 1%;
    }
    .cred-container>div{ 
        margin: 1rem;
        padding: 1rem;
    }
    .gotoapp{
        font-size: 1rem;
        align-self: center;
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin: 2rem;
        width: 100%;
        color: #fff;
        text-decoration: none;
    }
</style>
<body>

    <div class="container">
        <div class="content">
            <div class="title">
                <h1>Hello, Dear {{$name}}</h1>
            </div>
            <div class="body">

                <h4 class="body-title">Below you have your credentials:</h4>
                <div class="body-credentials-contianer">
                    <div class="body-credentials-contianer-2">
                        <div class="cred-container">
                            <div class="a"><strong>Username: </strong></div>
                            <div class="a"><strong>Password: </strong></div>
                        </div>
                        <div class="cred-container">
                            <div class="a">{{$username}}</div>
                            <div class="a">{{$password}}</div>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="{{$hostname}}" class="gotoapp"><h4>PRESS GO TO APP</h4></a>
                </div>
            </div>
            <div class="title">
                <a href="http://travelerscr.com" style="color: #fff; text-decoration:none;"><h2 style="color: #fff; text-decoration:none;"><strong>TRAVELERS</strong> <em style="color: #f33f3f; text-decoration:none;">CR</em></h2></a>
                <h3 style="margin-left: 2rem;">More information: <a href="mailto:operaciones@travelerscr.com" style="color: #f33f3f; text-decoration:none;">operaciones@travelerscr.com</a></h3>
            </div>
        </div>
    </div>
    
</body>
</html>