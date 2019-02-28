<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Repositorios del Usuario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
   
    
</head>
<body>

    <div class="col-md-12 " id="content">
        @for ($i = 0; $i < 2; $i++)
            <div class="row altoFilaRepos" >
            @for ($j = 0; $j < 4; $j++)
                <div class="col-md-3 primeraTarjetaRepos">
                    <div>
                        <label><p class="font-weight-bold subtituloLinkSitio">Link del Sitio:</p></label>
                    </div>

                    <div>
                        <a id="{{'link'.$i.$j}}"  class="font-italic linkSitio"> </a>
                    </div>
                    
                    <div>
                        <label><p class="font-weight-bold subtituloRepositorio">Nombre del repositorio: </p></label>
                    </div>

                    <div>
                        <p id="{{'nombrecito'.$i.$j}}" class="font-italic  nombreRepositorio" ></p>
                    </div>

                    <div>
                        <label><p class="font-weight-bold subtituloDescripcion">Descripción:</p></label>
                    </div>

                    <div>
                        <textarea id="{{'descripcion'.$i.$j}}" class="font-italic descripcion" readonly="readonly">
                        </textarea>
                    </div>

                    <div>
                        <label><p class="font-weight-bold subtituloCantidadIssues">Cantidad Issues:</p></label>
                        <p  id="{{'issues'.$i.$j}}"  class="font-italic  issues"></p>
                    </div>

                    <div>
                        <label><p class="font-weight-bold subtituloCantidadIssuesAbiertos">Cantidad Issues abiertos:</p></label>
                        <p  id="{{'issuesAbiertos'.$i.$j}}"  class="font-italic  issuesAbiertos"></p>
                    </div>

                    <div>
                        <label><p class="font-weight-bold subtituloCantidadForks">Cantidad Forks:</p></label>
                        <p id="{{'forks'.$i.$j}}" class="font-italic  forks"></p>
                    </div>
            
                </div>
            @endfor
            </div>
        @endfor
            

    </div>

    <div class="paginacion">
        <a href="#">&laquo;</a>
        <a class="active" href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
        <a href="#">&raquo;</a>
    </div>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
        var numero = 1;
         conceder();
         function conceder(){
            var identificador= new URLSearchParams(window.location.search);
            
                $.ajax({
                url: "https://api.github.com/users/"+identificador.get('username')+"/repos?page="+numero+"&per_page=8",
                type: 'get',
                success: function(result){
                    
                    console.log(result);
                    var j=0;
                    var z=0;
                    var idenUsername= new URLSearchParams(window.location.search);

                    for(var i=0; i<result.length;i++){
                        j = i % 4;
                        z = parseInt(i / 4);
                        console.log(z+""+j);
                        document.getElementById("link"+z+""+j).innerHTML=result[i].html_url;
                        document.getElementById("link"+z+""+j).href=result[i].html_url;
                        document.getElementById("nombrecito"+z+""+j).innerHTML=result[i].name;
                        document.getElementById("descripcion"+z+""+j).innerHTML=result[i].description;
                        

                        document.getElementById("issuesAbiertos"+z+""+j).innerHTML=result[i].open_issues_count;
                        document.getElementById("forks"+z+""+j).innerHTML=result[i].forks_count;
                        funcion(idenUsername.get('username'),result[i].name,z,j);
                    }

                    
                    
                },
                beforeSend:function (){
                    
                },
                failure: function(result){
                    console.log('NOOOOOOOOO');
                }
            });
        }

        function funcion(name,repositoryname,z,j){
            document.getElementById("issues"+z+""+j).innerHTML="hola";
            $.ajax({
                            url: "https://api.github.com/repos/"+name+"/"+repositoryname+"/issues",
                            type: 'get',
                            success: function(result){ 
                                var res =0;
                                for(var i = 0; i<result.length; i++){
                                    if(result[i].pull_request == undefined){
                                        res++;
                                    }
                                }   
                                console.log("La cantidad de issues es: "+result.length);
                                document.getElementById("issues"+z+""+j).innerHTML=res;
                                //funcion(result2,z,j);
                            },
                            beforeSend:function (){
                               
                            },
                            failure: function(result){
                                console.log('NOOOOOOOOO');
                            }
                        });
        }
      
</script>