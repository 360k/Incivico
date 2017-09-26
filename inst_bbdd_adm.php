
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Creador BBDD Incivico</title>
  </head>
  <body>
    <h1>Crear BBDD</h1>
    <?php
    try {
      $val  = new PDO("mysql:host=localhost","root");
    } catch (PDOException $e) {
      echo "<p class='error'>Error:".$e->getMessage();
      echo "</body></html>";
      exit();
    }
     ?>
     <p id="Bien">Conexion Establecida </p>
     <br>
     <?php
     // Borramos la base de datos si existe
     $val->exec("DROP database administration;");
      echo "<p id='Alerta'>La base de datos se borrara</p>";
      echo "<br>";
       echo "<p id='Bien'>Base de datos Borrada</p>";
       echo "<br>";

        // Se crea la base de Datos

        $sqlcontact="create database incivity;";
        $resul=$val->exec($sqlcontact);
        if($resul==false){
          echo "<p id='Alerta'>No se ha podido crear la base de datos</p>";
          echo"<br>";
          echo "<p>".$val->errorInfo()[2]."</p>";
        }else{
          echo "<p id='Bien'>Base de datos Administration creada con exito.</p>";
          echo"<br>";
        }

        // Conectamos con la bases de datos
        $sqlcontact ="use administration;";
        $resul=$val->exec($sqlcontact);
        if(!$resul==false){
          echo "<p id='Alerta'>No se ha podido conectar con la bbdd";
          echo"<br>";
          echo "<p>".$val->errorInfo()[2]."</p>";
        }else{
          echo "<p id='Bien'>Conexion Establecida </p>";
          echo"<br>";
        }

        // Creacion de las tablas

        // Tabla Administradores
        $sqlcontact="create table administrador(id integer primary key auto_increment, nombre varchar(30) unique not null, password varchar(50) not null);";
        $resul=$val->exec($sqlcontact);
        if($resul===false){
          echo "<p id='Alerta'>No se ha podido crear la tabla Contactos</p>";
          echo"<br>";
          echo "<p>".$val->errorInfo()[2]."</p>";
        }else{
          echo "<p id='Bien'>Tabla Administrador Creada con Exito</p>";
          echo"<br>";
        }

        // Tabla Usuarios

        $sqlcontact="create table users(id integer primary key auto_increment, nombre varchar(30) unique not null, password varchar(50) not null, email varcher(30) unique not null);";
        $resul=$val->exec($sqlcontact);
        if($resul===false){
          echo "<p id='Alerta'>No se ha podido crear la tabla Contactos</p>";
          echo"<br>";
          echo "<p>".$val->errorInfo()[2]."</p>";
        }else{
          echo "<p id='Bien'>Tabla Administrador Creada con Exito</p>";
          echo"<br>";
        }

        // Tabla Categoria
        $sqlcontact="create table categoria(id_categoria integer primary key auto_increment, categoria varchar(30) unique not null, descripcion varchar(50) not null, email varcher(30) not null);";
        $resul=$val->exec($sqlcontact);
        if($resul===false){
          echo "<p id='Alerta'>No se ha podido crear la tabla Contactos</p>";
          echo"<br>";
          echo "<p>".$val->errorInfo()[2]."</p>";
        }else{
          echo "<p id='Bien'>Tabla Administrador Creada con Exito</p>";
          echo"<br>";
        }

        // Tabla
        $sqlcontact="create table complaints(id_complaints integer primary key auto_increment, categoria varchar(30) unique not null, descripcion varchar(50) not null, email varcher(30) not null);";
        $resul=$val->exec($sqlcontact);
        if($resul===false){
          echo "<p id='Alerta'>No se ha podido crear la tabla Contactos</p>";
          echo"<br>";
          echo "<p>".$val->errorInfo()[2]."</p>";
        }else{
          echo "<p id='Bien'>Tabla Administrador Creada con Exito</p>";
          echo"<br>";
        }

        // Tabla Id_categoria

        // $sqlcontact="create table  (id_categoria int(8) primary key, id_conocido integer, primary key (id_conocedor, id_conocido), foreign key (id_conocedor) references personas (id) on delete cascade, foreign key (id_conocido) references personas (id) on delete cascade );";
        $sqlcontact="create table  (id_categoria int(8) primary key, id_conocido integer, primary key (id_conocedor, id_conocido), foreign key (id_conocedor) references personas (id) on delete cascade, foreign key (id_conocido) references personas (id) on delete cascade );";
        $resul = $val->exec($sqlcontact);
        if($resul===false){
          echo "<p id='Alerta'>No se ha podido crear la tabla relacion</p>";
          echo"<br>";
          echo "<p>".$val->errorInfo()[2]."</p>";
        }else{
          echo "<p id='Bien'>Tabla Relacion Creada y relacionada con Exito</p>";
          echo "<br>";
        }


        // Insertamos datos en la tabla contactos
        $sqlcontact = "insert into administrador(nombre, password) values ('admin', 'admin'), ('pedro', 'p1552a');";
        $sqluser = "insert into users(nombre, password, email) values ('pedro', 'pedro', '360k.cat@gmail.com');";
        $resul = $val->exec($sqlcontact);
        $resul2 = $val->exec($sqluser);
        if($resul==false){
          echo "<pid='Alerta'>No se ha podido insertar datos en la tabla de Administradores</p>";
          echo"<br>";
          echo "<p>".$val->errorInfo()[2]."</p>";
        }else{
          echo "<p id='Bien'>Datos Insertados en Administradores con Exito</p>";
          echo"<br>";
        }elseif ($resul2==false) {
          echo "<pid='Alerta'>No se ha podido insertar datos en la tabla users</p>";
          echo"<br>";
          echo "<p>".$val->errorInfo()[2]."</p>";
        }else{
          echo "<pid='Alerta'>No se ha podido insertar datos en la tabla users</p>";
          echo"<br>";
          echo "<p>".$val->errorInfo()[2]."</p>";
        }

       ?>

  </body>
</html>
