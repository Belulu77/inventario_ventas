<?php 
include('conexio.php'); 
//include("../public/session.php"); 
session_start(); 

if(isset($_SESSION['user_name']))   ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Mostrar clientes</title>
      <script src="https://cdn.tailwindcss.com"></script>
      <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  </head>
  <body>
  <nav class="bg-violet-200">
          <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
              <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:ml-6 sm:block">
                  <div class="flex space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Lista clientes</a>
                    <a href="inicio.php" class="rounded-md px-3 py-2 bg-gray-900 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">volver inicio</a>
                    <a href="añadir.php" class="rounded-md px-3 py-2 bg-gray-900 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Agregar Clientes</a>
                  </div>
                </div>
              </div>
              <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">   
                <!-- Profile dropdown -->
                <div class="relative ml-3">
                  <div>
                    <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                      <span class="absolute -inset-1.5"></span>
                      <img class="h-8 w-8 rounded-full" src="../public/img/userProfile.png" alt="">
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
          <!-- Mobile menu, show/hide based on menu state. -->
          <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="mostrarcliente.html" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Clientes</a>
              <a href="inicio.html" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">volver inicio</a>
            </div>
          </div>
      </nav>
      <?php 
          $datosUser = "SELECT * FROM clientes";
          $resultado =  $conexion->query($datosUser);
          // Validación para mostrar los datos
          if ($resultado->num_rows > 0) {
              // Hay información que mostrar
              while ($row = $resultado->fetch_assoc()) { ?>
                  <ul role="list" class="divide-y divide-gray-100">
                      <li class="flex justify-between gap-x-6 py-5">
                          <div class="flex min-w-0 gap-x-4">
                          <img class="size-12 flex-none rounded-full bg-gray-50" src="../public/img/userProfile.png" alt="">
                          <div class="min-w-0 flex-auto">
                              <p class="text-sm/6 font-semibold text-gray-900"><?php echo $row['nombre'] ." ". $row['apellido']; ?></p>
                              <p class="mt-1 truncate text-xs/5 text-gray-500"><?php echo $row['correo']; ?></p>

                          </div>
                          </div>
                          <div class="hidden shrink-0 sm:flex sm:flex-col ">
                              <div class="flex justify-around">
                                  <a href="edit.php">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                      </svg>
                                  </a>
                                  <a href="deleteUser.php" class="trash">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                      </svg>
                                      <?php $_SESSION["id"]= $row['ID_cliente']; ?>
                                  </a>


                      </li>
                  </ul>
                  <?php
              }
            }
      ?>
  </body>
  </html>
  <?php 