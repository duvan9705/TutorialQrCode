<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EJEMPLO QR CODE</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>

        <!-- Antes de comenzar, les dejo el link de la libreria que se uso 
            para generar codigos QR https://www.simplesoftware.io/#/docs/simple-qrcode 

            1. En la terminal ejecutamos el siguiente comando

            composer require simplesoftwareio/simple-qrcode "~3"

            2. Una vez instalado el paquete, nos vamos a la carpeta config/app.php

            3. Cuando hayamos creado o añadido la clase y el alias. 
            Pasaremos a generar el codigo QR

        --> 

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    {!!QrCode::size(300)->generate("http://pqrsf.jmsolucionesinformaticas.com/") !!}
                </div>
                <div class="col-md-6">
                    <div id="reader"></div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="dato">Identificacion</label>
                        <input type="text" name="dato" id="dato" class="form-control" placeholder="aqui va la identificacion">
                    </div>
                </div>
            </div>
        </div>

        <!-- 
            Una vez generado el codigo pasaremos a lo siguiente y es en leer el codigo QR
            copiamos este script.

            para mas informacion de su uso, adjunto link

            https://github.com/mebjas/html5-qrcode

        -->

        <!-- JQUERY -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!-- Liberia de HTML5QR-CODE
        
            Este archivo se encuentra en la carpeta Public/js

         -->
        <script src="{{asset('js/html5-qrcode.min.js')}}"></script>

        <!-- Script -->
        <script type="text/javascript">

            //Inicializamos el documento
            $(document).ready(function(){

                /**
                *
                * Funcion exito 
                * @param qrMessage
                *
                 */
                function exito(qrMessage) {
                    //Imprimimos en la consola el valor retornado
                    console.log(`QR matched = ${qrMessage}`);
                    //Pasamos el valor al input
                    $("#dato").val(qrMessage);
                }

                /**
                *
                * Funcion fallo
                * @param error
                *
                 */
                function fallo(error) {
                    //Imprimimos el mensaje de error en consola
                    console.warn(`QR error = ${error}`);
                }

                //Creamos una variable y que esta sea igual a una instancea de Html5QrcodeScanner
                /**
                *
                * @param id //del input "reader"
                * @param fps //Cuadro opcional por segundo para escaneo de código qr
                * @param qrbox //Opcional si quieres caja delimitada en la interfaz de usuario
                * @param boolean // Opcionalmente, puede establecer otro argumento en el constructor llamado detallado para imprimir todos los registros en la consola
                *
                 */
                let html5QrcodeScanner = new Html5QrcodeScanner( /* elemento id */  "reader", { fps: 10, qrbox: 250 }, true);

                //Llamamos la variable y ejecutamos la funcion render y le pasamos las dos funciones exito y fallo
                html5QrcodeScanner.render(exito, fallo);
            })
        </script>

    </body>
</html>
