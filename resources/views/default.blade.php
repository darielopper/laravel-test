<!doctype html>
<html>
<head>

</head>
<body>
<button id="btn1" onclick="sendData();">Enviar</button>
<script src="{{ asset('js/broadcaster.js') }}"></script>
<script>
    BroadCaster.subscribe('article.created',function(e){
        console.log("Ahora si "+e);
    });

    /*var ws = new WebSocket('ws://localhost:8080');
    ws.onopen = function(){
        console.log('Connection open');
    };

    ws.onmessage = function(msg){
        console.log(msg.data);
    };*/

    var sendData =function(){
        /*ws.send("Hola Mundo");
        alert("Mensaje enviado");*/
        BroadCaster.publish('article.created', 'Se creo el articulo');
    }

    /*var b = {
        init: function(){
            this.name = "Dariel";
            this.age = 23;
        },
        growUp: function(){
            this.age++;
        }
    };
    b.init();
    b.growUp();
    alert(b.age);*/
</script>
</body>
</html>