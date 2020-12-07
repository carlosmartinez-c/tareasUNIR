//Alumno: Carlos Ignacio Martinez Colmenares
//Grupo: 7
//Docente: Octavio Aguirre Lozano
//Asignatura: Computación en el Servidor Web

<?php
    //Declaramos un arreglo bi-dimensional con un cliente
    $clientes = [['Ezequiel', 10, "Carajillo"]];
    //Declaramos la variable contadorDeBebidas, que apunta al segundo espacio delprimer elemento 
    //en el arreglo clientes.
    $contadorDeBebidas = $clientes[0][1];
    $respuestaIngresada = "No";
    $nombreIngresado = "EZEQUIEL";       
    //Declaramos funciones
    function validarCliente($respuestaIngresada){
    //Le damos la bienvenida al cliente, y verificamos si es cliente nuevo.
    echo "Hola, bienvenido es la primera vez que nos visita? <br>";
    echo "Respuesta ingresada: " . $respuestaIngresada ."<br><br>";
    }
    //Mandamos a llamar la funcion de bienvenida
    validarCliente($respuestaIngresada);
    if($respuestaIngresada != "No"){
        echo "Primera vez que nos visitas! <br>";
        echo "Te invitamos a conocer nuestro menu <br>";
        echo "Tenemos las mejores bebidas de la ciudad! <br>";
    }else{
        //Como el nombre ingresado fue todo en mayusculas, cambiamos la cadena a minusculas y el primer caracter 
        //a mayusculas
        echo "Como te llamas? " . ucfirst(strtolower($nombreIngresado)) ."<br><br>";
       //Convierto un arreglo bi-dimensional a uni-dimensional para comparar el nombre.
        foreach($clientes as $cliente){
            //Hacemos comparaciones del cliente, para saber si existe o no en nuestro arreglo/bd.
            switch($cliente)
            {
                //Validamos si el nombre existe en el arreglo/bd. Asi como utilizamos la funcion de cadena
                //para poner toda la cadena en minusculas, y el primer caracter en mayusculas.
                case($cliente[0] == ucfirst(strtolower($nombreIngresado))):   
                    echo $cliente[0];
                    echo " es un cliente existente <br>";
                    $bebida = 0;
                    
                    //Si el cliente ha consumido anteriormente, le imprime en pantalla su ultima bebida.
                    while($bebida < $contadorDeBebidas)
                    {   
                        //Le asignamos el valor de contadorDeBebidas a la variable bebida.
                        $bebida = $contadorDeBebidas;
                        echo "Tu ultima bebida adquirida fue: " . $clientes[0][2] . "<br><br>";
                    }
                    //Realizamos una validacion y de acuerdo a la cantidad bebidas compradas se imprime un mensaje diferente.
                    switch($contadorDeBebidas)
                    {   
                            case ($contadorDeBebidas <1 && $contadorDeBebidas >10):
                                echo "Conoce nuestro menu";
                            break;

                            case ($contadorDeBebidas >=1 && $contadorDeBebidas<=3):
                                echo "Te invitamos a conocer el resto de nuestro menu, esta delicioso!";
                            break;

                            case ($contadorDeBebidas == 5):
                                echo "Te recordamos que al comprar 9 bebidas, la 10a es completamente gratis!";
                            break;

                            case ($contadorDeBebidas >=6 &&  $contadorDeBebidas <=9):
                                echo "Recuerda que en la compra de 9 bebidas, la 10a es GRATIS!<br><br>";
                                echo "Tu has comprado: <h1>". $contadorDeBebidas ."</h1> bebidas";
                            break;

                            case ($contadorDeBebidas == 10):
                                echo "Felicidades, llegaste a las 10 bebidas, tu bebida del dia de hoy es GRATIS!<br><br>";
                                echo "Llegaste a la : <h1>". $contadorDeBebidas ."</h1> bebida";
                            break;    
                    }               
                break;
                default:
                    echo $nombreIngresado . " no existe";
                break;           
            }
        }
    }
?>