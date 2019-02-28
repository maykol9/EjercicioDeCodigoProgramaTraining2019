<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Usuarios Github</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
   
    
</head>
<body>

    <div class="col-md-12 " >
    @for ($i = 0; $i < 3; $i++)
        <div class="row altoFila" >
        @for ($j = 0; $j < 4; $j++)
            <div class="col-md-3 primeraTarjeta">
                <div>
                    <img id="{{'foto'.$i.$j}}"  class="primerFoto" src="/imagenes/fotoUsuario.png" alt="">
                </div>

                <div>
                    <label><p class="font-weight-bold subtituloNombre">Nombre de Usuario:</p></label>
                </div>

                <div>
                    <p id="{{'nombre'.$i.$j}}" class="font-weight-normal nombreUsuario"></p>
                </div>
                
                <div>
                    <label><p class="font-weight-bold subtituloLink">Link de página:</p></label>
                </div>

                <div>
                    <a id="{{'linkUsuario'.$i.$j}}"  target="_blank" class="font-italic linkUsuario" ></a>
                </div>

                <div>
                    <label><p class="font-weight-bold subtituloPaginaInterna">Link de página interna:</p></label>
                </div>

                <div>
                    <a id="{{'id'.$i.$j}}"  href="/repositorios"  class="font-italic linkPagina">Repositorios realizados</a>
                </div>
        
            </div>
        @endfor
        </div>
        @endfor
        <button onclick='contador()' id="botonSiguiente" class="btn botonCargar"><i class="fa fa-sign-in fa-lg"></i> Siguiente Bloque</button>

    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
        var numero= 1; 
         conceder();
         function conceder(){

                  
                $.ajax({
                url: "https://api.github.com/users?page="+numero+"&per_page=12",
                type: 'get',
                success: function(result){
                    
                    console.log(result);
                    var j=0;
                    var z=0;
                    for(var i=0; i<result.length;i++){
                        j = i % 4;
                        z = parseInt(i / 4);
                        console.log(z+""+j);
                       
                        //var cadena="foto"+z+""+j;
                        document.getElementById("foto"+z+""+j).src=result[i].avatar_url;

                        //var cadena2="nombre"+z+""+j;
                        document.getElementById("nombre"+z+""+j).innerHTML=result[i].login;
                        
                        document.getElementById("linkUsuario"+z+""+j).innerHTML=result[i].html_url;

                        document.getElementById("linkUsuario"+z+""+j).href=result[i].html_url

                        //document.getElementById("id"+z+""+j).value=result[i].id;

                        document.getElementById("id"+z+""+j).href='repositorios?username='+result[i].login;

                    }

                    
                    
                   
                },
                beforeSend:function (){
                    
                },
                failure: function(result){
                    console.log('NOOOOOOOOO');
                }
            });
        }

       function contador() {
        console.log("Empieza paginacion con: "+numero);
           if(numero<12){
              numero++;
           }
           
           console.log(numero);
       }

           

           
</script>