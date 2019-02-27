<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
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
        <div class="col-md-3 border border-success primeraTarjetaRepos">
            <div>
                <label><p class="font-weight-bold subtituloLinkSitio">Link del Sitio:</p></label>
            </div>

            <div>
                <a id="{{''.$i.$j}}" href="" class="font-italic linkSitio"> https://api.github.com/users/mojombo</a>
            </div>
            
            <div>
                <label><p class="font-weight-bold subtituloRepositorio">Nombre del repositorio: </p></label>
            </div>

            <div>
                <p id="{{''.$i.$j}}" class="font-italic  nombreRepositorio" >Macriiiiiigatooo :v</p>
            </div>

            <div>
                <label><p class="font-weight-bold subtituloDescripcion">Descripción:</p></label>
            </div>

            <div>
                <p class="font-italic descripcion"> Simple, but flexible HTTP client library, with support for multiple backends.</p>
            </div>

            <div>
                <label><p class="font-weight-bold subtituloCantidadIssues">Cantidad Issues:</p></label>
                <p    class="font-italic  issues">34</p>
            </div>

            <div>
                <label><p class="font-weight-bold subtituloCantidadIssuesAbiertos">Cantidad Issues abiertos:</p></label>
                <p    class="font-italic  issuesAbiertos">45</p>
            </div>

            <div>
                <label><p class="font-weight-bold subtituloCantidadForks">Cantidad Forks:</p></label>
                <p class="font-italic  forks">23</p>
            </div>
      
        </div>
    @endfor
    </div>
    @endfor
    

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
                       
                        //var cadena="foto"+z+""+j;
                        document.getElementById("foto"+z+""+j).src=result[i].avatar_url;

                        //var cadena2="nombre"+z+""+j;
                        document.getElementById("nombre"+z+""+j).innerHTML=result[i].login;
                        
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

<!--
<script>

     function paginaInterna() {
                $.ajax({
                url: "https://api.github.com/users/blackmiaool/repos",
                jsonp: true,
                method: "GET",
                dataType: "json",
                success: function(res) {
                    console.log(res)
                }
                });
    }
</script>
-->