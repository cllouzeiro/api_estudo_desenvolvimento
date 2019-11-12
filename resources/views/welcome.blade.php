<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{-- Bootstrap --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">

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
        <main class="container-fluid">
            <div class="row justify-content-center" id="poke-table"></div>
            <div id="button"></div>
        </main>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>

    <script>
            $(document).ready(function() {
                var url = "https://pokeapi.co/api/v2/pokemon";
                var im;
                $.getJSON(url, function(data){
                    $.each(data.results, function(index, value){
                        $("#poke-table").append(
                            "<div class='card border-success ml-3 col-md-3 col-sm-6 col-xs-6 mb-3 poke-card'>"
                                +"<div class='row no-gutters'>"
                                    +"<div class='col-md-4 col-sm-6 col-xs-6' id='img-"+value.name+"'></div>"
                                    +"<div class='col-md-8 col-sm-6 col-xs-6'>"
                                        +"<div class='card-body bg-dark text-white'>"
                                            +"<h5 class='card-title  font-weight-bold'>"+value.name+"</h5>"
                                            +"<p class='card-text'>"+value.url+"</td>"
                                        +"</div>"
                                    +"</div>"
                                +"</div>"
                            +"</div>"
                        );

                        $.getJSON(value.url, function(data){
                            $("#img-"+data.name).append("<img class='card-img' src='"+data.sprites.front_default+"'>");
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
                $('div .poke-card').remove();
                $('.poke-button').remove();
                $.getJSON(url, function(data){
                    $.each(data.results, function(index, value){
                        $("#poke-table").append(
                            "<div class='card border-success ml-3 col-md-3 col-sm-6 col-xs-6 mb-3 poke-card'>"
                                +"<div class='row no-gutters'>"
                                    +"<div class='col-md-4 col-sm-6 col-xs-6' id='img-"+value.name+"'></div>"
                                    +"<div class='col-md-8 col-sm-6 col-xs-6'>"
                                        +"<div class='card-body bg-dark text-white'>"
                                            +"<h5 class='card-title  font-weight-bold'>"+value.name+"</h5>"
                                            +"<p class='card-text'>"+value.url+"</td>"
                                        +"</div>"
                                    +"</div>"
                                +"</div>"
                            +"</div>"
                        );

                        $.getJSON(value.url, function(data){
                            $("#img-"+data.name).append("<img  class='card-img' src='"+data.sprites.front_default+"'>");
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
