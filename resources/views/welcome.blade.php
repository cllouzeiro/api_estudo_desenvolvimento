<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        {{-- jquery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    </head>
    <body>
            {{-- <div>
                <span>Total: {{$data->count}}</span>
            </div>
            <div>
                <table>
                @foreach($data->results as $value)
                    <tr>
                        <td>{{$value->name}}</td>
                        <td><a href="{{$value->url}}">Detalhes</a></td>
                    </tr>
                @endforeach
                </table>
            </div>
            <a href="{{route('index.next.page', $page['next'])}}">Proximo</a>
            @if($page['prev']>0)
                <a href="{{route('index.prev.page', $page['prev'])}}">Anterior</a>
            @endif
            <button id="buton-teste" value="{{$data->next}}">Teste</button> --}}
            <div class="content">
                <table id="poke-table"></table>
                <div id="button"></div>
            </div>
    </body>
    <script>
            $(document).ready(function() {
                var url = "https://pokeapi.co/api/v2/pokemon";
                var im;
                $.getJSON(url, function(data){
                    $.each(data.results, function(index, value){

                        $("#poke-table").append(
                            "<tr>"
                            +"<td id='img-"+value.name+"'></td>"
                            +"<td>"+value.name+"</td>"
                            +"<td>"+value.url+"</td>"
                            +"</tr>"
                        );

                        $.getJSON(value.url, function(data){
                            $("#img-"+data.name).append("<img src='"+data.sprites.front_default+"'>");
                        });
                    })

                    if(data.previous != null){
                        $("#button").append("<button class='poke-button' class='page' value="+data.previous+">Previous</button>");
                    }

                    $("#button").append("<button class='poke-button' class='page' value="+data.next+">Next</button>");
                });
            })

            $(document).on('click', '.poke-button',function(){
                var url = $(this).val();
                $('tr').remove();
                $('.poke-button').remove();
                $.getJSON(url, function(data){
                    $.each(data.results, function(index, value){
                        $("#poke-table").append(
                            "<tr>"
                            +"<td id='img-"+value.name+"'></td>"
                            +"<td>"+value.name+"</td>"
                            +"<td>"+value.url+"</td>"
                            +"</tr>"
                        );

                        $.getJSON(value.url, function(data){
                            $("#img-"+data.name).append("<img src='"+data.sprites.front_default+"'>");
                        });
                    })

                    if(data.previous != null){
                        $("#button").append("<button class='poke-button' class='page' value="+data.previous+">Previous</button>");
                    }
                    $("#button").append("<button class='poke-button' class='page' value="+data.next+">Next</button>");
                });
            });
    </script>
</html>
