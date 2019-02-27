<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
   
    
</head>
<body>

<div class="col-md-12">
@for ($i = 0; $i < 3; $i++)
    <div class="row altoFila" >
    @for ($j = 0; $j < 4; $j++)
        <div class="col-md-3 border border-success primeraTarjeta">
            <div>
                <img id="{{'foto'.$i.$j}}"  class="primerFoto" src="" alt="">
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
                <a href=""  class="font-italic linkPagina"></a>
            </div>
      
        </div>
    @endfor
    </div>
    @endfor
    <!--
        <div class="col-md-3 border border-success segundaTarjeta">
            <div>
                <img class="primerFoto" src="https://avatars0.githubusercontent.com/u/1?v=4" alt="mojombo">
            </div>

            <div>
                <label><p class="font-weight-bold subtituloNombre">Nombre de Usuario:</p></label>
            </div>

            <div>
                <p class="font-weight-normal nombreUsuario">mojombo</p>
            </div>
            
            <div>
                <label><p class="font-weight-bold subtituloLink">Link de página:</p></label>
            </div>

            <div>
                <a href="" target="_blank" class="font-italic linkUsuario" >https://api.github.com/users/mojombo</a>
            </div>

            <div>
                <label><p class="font-weight-bold subtituloPaginaInterna">Link de página interna:</p></label>
            </div>

            <div>
                <a href="" target="_blank" class="font-italic linkPagina">https://github.com/mojombo</a>
            </div>
            
            
        </div>
        <div class="col-md-3 border border-success terceraTarjeta">
            <div>
                <img class="primerFoto" src="https://avatars0.githubusercontent.com/u/1?v=4" alt="mojombo">
            </div>

            <div>
                <label><p class="font-weight-bold subtituloNombre">Nombre de Usuario:</p></label>
            </div>

            <div>
                <p class="font-weight-normal nombreUsuario">mojombo</p>
            </div>
            
            <div>
                <label><p class="font-weight-bold subtituloLink">Link de página:</p></label>
            </div>

            <div>
                <a href="" target="_blank" class="font-italic linkUsuario" >https://api.github.com/users/mojombo</a>
            </div>

            <div>
                <label><p class="font-weight-bold subtituloPaginaInterna">Link de página interna:</p></label>
            </div>

            <div>
                <a href="" target="_blank" class="font-italic linkPagina">https://github.com/mojombo</a>
            </div>
            
            
        </div>
        <div class="col-md-3 border border-success cuartaTarjeta">
            <div>
                <img class="primerFoto" src="https://avatars0.githubusercontent.com/u/1?v=4" alt="mojombo">
            </div>

            <div>
                <label><p class="font-weight-bold subtituloNombre">Nombre de Usuario:</p></label>
            </div>

            <div>
                <p class="font-weight-normal nombreUsuario">mojombo</p>
            </div>
            
            <div>
                <label><p class="font-weight-bold subtituloLink">Link de página:</p></label>
            </div>

            <div>
                <a href="" target="_blank" class="font-italic linkUsuario" >https://api.github.com/users/mojombo</a>
            </div>

            <div>
                <label><p class="font-weight-bold subtituloPaginaInterna">Link de página interna:</p></label>
            </div>

            <div>
                <a href="" target="_blank" class="font-italic linkPagina">https://github.com/mojombo</a>
            </div>
            
            
        </div>
        
    </div>
    <div class="row altoFila">
        <div class="col-md-3">col</div>
        <div class="col-md-3">col</div>
        <div class="col-md-3">col</div>
        <div class="col-md-3">col</div>
    </div>
    <div class="row altoFila">
        <div class="col-md-3">col</div>
        <div class="col-md-3">col</div>
        <div class="col-md-3">col</div>
        <div class="col-md-3">col</div>
    </div>
    -->

</div>


</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
         conceder();
         function conceder(){
                
                $.ajax({
                url: "https://api.github.com/users?page=1&per_page=12",
                type: 'get',
                success: function(result){
                    
                    console.log(result);
                    var j=0;
                    var z=0;
                    for(var i=0; i<result.length;i++){
                        j++;
                        if(j==4){
                            j=0;
                        }
                        z++;
                        if(z==3){
                            z=0;
                        }
                       
                        var cadena="foto"+z+""+j;
                        document.getElementById(cadena).src=result[i].avatar_url;

                        var cadena2="nombre"+z+""+j;
                        document.getElementById(cadena2).innerHTML=result[i].login;
                        
                        document.getElementById("linkUsuario"+z+""+j).innerHTML=result[i].html_url;

                        document.getElementById("linkUsuario"+z+""+j).href=result[i].html_url

                    }
                   /* if(result.valido == 'si'){
                        console.log('todo ok');
                        document.getElementById("botonRegistrar").click();
                    }else{
                        console.log('todo mal');
                        var message = "Los Nombres " + nombre + " " + apellidoP + " " + apellidoM;
                        message = message + " ya estan registrados en la base, ¿desea registrar el un usuario con los mismos nombre?";
                        $("#contenido-modal").empty();
                        $("#contenido-modal").append(message);
                        $('#create').modal('show');
                    }*/
                },
                beforeSend:function (){
                    
                },
                failure: function(result){
                    console.log('NOOOOOOOOO');
                }
            });
            }
</script>