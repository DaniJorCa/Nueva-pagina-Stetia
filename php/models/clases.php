<?php
 // Clases genericas

 function len_values($lista, $tipoObjeto){
    $bandera = true;
    $diccionario = array(
        "usuarios" => ["id" => 9,
        "email" => 80,
        "passwd" => 255,
        "nombre" => 30,
        "p_apellido" => 30,
        "s_apellido" => 30,
        "dni" => 9,
        "telefono" => 9,
        "direccion" => 100,
        "provincia" => 50,
        "localidad" => 50,
        "cod_postal" => 5,
        "perfil" => 1,
        "consulta" => 255]
    );

    foreach ($lista as $clave => $valor) {
        foreach  ($diccionario[$tipoObjeto] as $clave_usu => $valor_usu){
           if($clave == $clave_usu){
                if(strlen($valor) > $valor_usu){
                    $bandera = false;
                }
           } 
        }
    }
    return $bandera;    
 }



function insert_object_in_BBDD($con, $tabla, $objeto) {
    try{
        // Preparar la declaración SQL
        $sql = "INSERT INTO $tabla (";
        $valores = "VALUES (";
        
        // Obtener los valores del objeto como un array
        $atributos = $objeto->toArray();

        foreach ($atributos as $campo => $valor) {
            $sql .= "$campo, ";
            $valores .= ":$campo, ";
        }

        // Eliminar la coma y el espacio extra al final de $sql y $valores
        $sql = rtrim($sql, ', ') . ")";
        $valores = rtrim($valores, ', ') . ")";

        // Unir $sql y $valores para formar la consulta completa
        $sqlCompleta = $sql . " " . $valores;

        // Preparar la declaración
        $statement = $con->prepare($sqlCompleta);

        // Vincular los valores a los marcadores de posición y ejecutar la consulta
        foreach ($atributos as $campo => $valor) {
            $statement->bindValue(":$campo", $valor, PDO::PARAM_STR);
        }

        // Ejecutar la consulta
        $statement->execute();

        // Devolver el ID del último registro insertado
        return true;
    } catch (PDOException $e) {
        // En caso de error, devolver false y manejar la excepción
        return false;
    }
}


function update_field_in_BBDD($con, $tabla, $campo, $nuevoValor, $whereCampo, $isvalue) {
    try {
        // Preparar la declaración SQL para actualizar el campo específico
        $sql = "UPDATE $tabla SET $campo = :valor WHERE $whereCampo = :condicionValor";

        // Preparar la declaración
        $statement = $con->prepare($sql);

        // Vincular los valores a los marcadores de posición
        $statement->bindValue(':valor', $nuevoValor, PDO::PARAM_STR);
        $statement->bindValue(':condicionValor', $isvalue, PDO::PARAM_STR);

        // Ejecutar la consulta
        $resultado = $statement->execute();

        // Devolver true si la actualización fue exitosa, false si no
        return $resultado;
    } catch (PDOException $e) {
        // En caso de error, devolver false y manejar la excepción
        return false;
    }
}





function exist_object_in_BBDD($con, $tabla, $key, $value) {
    try {
        // Preparar la consulta SQL para verificar la existencia del dato
        $sql = "SELECT COUNT(*) FROM $tabla WHERE $key = :value";

        // Preparar la declaración
        $statement = $con->prepare($sql);

        // Vincular el valor del parámetro
        $statement->bindValue(':value', $value, PDO::PARAM_STR);

        // Ejecutar la consulta
        $statement->execute();

        // Obtener el resultado de la consulta
        $count = $statement->fetchColumn();

        // Si el conteo es mayor que 0, el dato existe
        if($count > 0){
            return true;
        }else{
            return false;
        }
    } catch (PDOException $e) {
        // En caso de error, devolver false y manejar la excepción
        return false;
    }
}







function get_max_value_of_field($tabla, $field) {
    try{
        $con = Conexion::conectar_db();
        $sql = $con->prepare("SELECT MAX($field) AS max_field FROM $tabla");
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
        die('Error de conexión: ' . $e->getMessage());
    }
}

class Conexion {
    public static function conectar_db() {
        if (!defined('USER_DB')) {
            define ("USER_DB","root");
        }
        
        if(!defined('PASSWORD')){
          define ("PASSWORD","");  
        }
        try {
            $dsn = "mysql:host=localhost;dbname=stetia";
            $con = new PDO($dsn, USER_DB, PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }
}


class Usuario {
    private int $id;
    private ?string $passwd;
    private string $nombre;
    private string $p_apellido;
    private string $s_apellido;
    private string $email;
    private ?string $dni;
    private ?string $telefono;
    private ?string $direccion;
    private ?string $provincia;
    private ?string $localidad;
    private ?string $cod_postal;
    private ?int $perfil;
    private ?string $consultas;


    public function __construct(int $id, string $email, string $nombre,   string $p_apellido, string $s_apellido, 
                            $consultas = null, string $passwd = null, string $dni = null, int $telefono = null, string $direccion = null, 
                            string $provincia = null, string $localidad = null, int $cod_postal = null, int $perfil = 0, 
                            ) {
        $this->id = $id;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->passwd = $passwd;
        $this->p_apellido = $p_apellido;
        $this->s_apellido = $s_apellido;
        $this->dni = $dni;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->provincia = $provincia;
        $this->localidad = $localidad;
        $this->cod_postal = $cod_postal;
        $this->perfil = $perfil;
        $this->consultas = $consultas;
    }

    public static function get_all_users() {

        try{
            $con = Conexion::conectar_db();
            $sql = $con->prepare("SELECT * FROM usuarios");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);  
        }catch (PDOException $e){
            die('Error de conexión: ' . $e->getMessage());  
        }
    }

    // Función para obtener un objeto Usuario por su ID
public static function get_object_user_by_value($con, $row, $value) {
    // Preparar la consulta SQL
    $sql = "SELECT * FROM usuarios WHERE $row = :column";

    // Preparar la declaración
    $statement = $con->prepare($sql);

    // Vincular el valor del ID al marcador de posición en la consulta SQL
    $statement->bindValue(':column', $value, PDO::PARAM_INT);

    // Ejecutar la consulta
    $statement->execute();

    // Obtener los valores del usuario como un array asociativo
    $user_data = $statement->fetch(PDO::FETCH_ASSOC);

    // Construir un objeto Usuario con los valores obtenidos
    $user = new Usuario(
        $user_data['id'],
        $user_data['email'],
        $user_data['nombre'],
        $user_data['p_apellido'],
        $user_data['s_apellido'],
        $user_data['consultas'],
        $user_data['passwd'],
        $user_data['dni'],
        $user_data['telefono'],
        $user_data['direccion'],
        $user_data['provincia'],
        $user_data['localidad'],
        $user_data['cod_postal'],
        $user_data['perfil'],
        
    );

    // Devolver el usuario
    return $user;
}




    public static function boolean_check_email($cadena) {
        $dominio = "";
        $correo = "";
        $afterDot = "";
    
        $posArroba = strpos($cadena, "@");
    
        if($posArroba !== false){
            $correo = substr($cadena, 0, $posArroba);
            $dominio = substr($cadena, $posArroba, strlen($cadena));
            $punto = strpos($dominio, ".");
            if($punto == strlen($dominio) - 1){
               $afterDot = "error";
            }
            
            $espacios = strpos($cadena, " ");
    
            if($dominio !== " " && $correo !== " " && $espacios === false && $punto != false && $afterDot != "error"){
                return true;
            }else{
                return false;
            }
        }
    }

    public function toArray(): array {
        $valores = [];
        foreach (get_object_vars($this) as $atributo => $valor) {
            $valores[$atributo] = $valor;
        }
        return $valores;
    }

    //SETTERS y GETTERS

    public function setId(int $id) {
        $this->id = $id;
    }
    public function getId(): int {
        return $this->id;
    }

    public function setPasswd(?string $nombre) {
        $this->passwd = $passwd;
    }
    public function getPasswd(): ?string {
        return $this->passwd;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre(): string {
        return $this->nombre;
    }

    public function setP_apellido(string $p_apellido) {
        $this->p_apellido = $p_apellido;
    }
    public function getP_apellido(): string {
        return $this->p_apellido;
    }

    public function setS_apellido(string $s_apellido) {
        $this->s_apellido = $s_apellido;
    }
    public function getS_apellido(): string {
        return $this->s_apellido;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }
    public function getEmail(): string {
        return $this->email;
    }

    public function setDni(?string $dni) {
        $this->dni = $dni;
    }
    public function getDni(): ?string {
        return $this->dni;
    }

    public function setTelefono(?string $telefono) {
        $this->telefono = $telefono;
    }
    public function getTelefono(): ?string {
        return $this->telefono;
    }

    public function setDireccion(?string $direccion) {
        $this->direccion = $direccion;
    }
    public function getDireccion(): ?string {
        return $this->direccion;
    }

    public function setProvincia(?string $provincia) {
        $this->provincia = $provincia;
    }
    public function getProvincia(): ?string {
        return $this->provincia;
    }

    public function setLocalidad(?string $localidad) {
        $this->localidad = $localidad;
    }
    public function getLocalidad(): ?string {
        return $this->localidad;
    }

    public function setCodPostal(?int $cod_postal) {
        $this->cod_postal = $cod_postal;
    }
    public function getCodPostal(): ?int {
        return $this->cod_postal;
    }

    public function setPerfil(?int $perfil) {
        $this->perfil = $perfil;
    }
    public function getPerfil(): ?int {
        return $this->perfil;
    }

    public function setConsultas(?string $consulta) {
        $this->consulta = $consulta;
    }
    public function getConsultas(): ?string {
        return $this->consulta;
    }

    public function get_array_usuario(): array {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'p_apellido' => $this->p_apellido,
            's_apellido' => $this->s_apellido,
            'email' => $this->email,
            'dni' => $this->dni,
            'direccion' => $this->direccion,
            'provincia' => $this->provincia,
            'localidad' => $this->localidad,
            'perfil' => $this->perfil
        ];
    }
}




class Tratamiento {
    protected string $id;
    protected string $nombre;
    protected ?string $descrip;
    protected float $precio;
    protected string $zona_corp;
    


    public function __construct(string $id, string $nombre, string $descrip = null, float $precio, string $zona_corp) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descrip = $descrip;
        $this->precio = $precio;
        $this->zona_corp = $zona_corp;
    }

    public static function get_all_treatments() {
        try{
            $con = Conexion::conectar_db();
            $sql = $con->prepare("SELECT * FROM tratamientos");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);  
        }catch (PDOException $e){
            die('Error de conexión: ' . $e->getMessage());  
        }
    }



    //SETTERS y GETTERS

    public function setId(string $id) {
        $this->id = $id;
    }
    public function getId(): string {
        return $this->id;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre(): string {
        return $this->nombre;
    }

    public function setDescrip(?string $descrip) {
        $this->descrip = $descrip;
    }
    public function getDescrip(): ?string {
        return $this->descrip;
    }

    public function setPrecio(float $precio) {
        $this->precio = $precio;
    }
    public function getPrecio(): float {
        return $this->precio;
    }

    public function setZonaCorp(string $zona_corp) {
        $this->zona_corp = $zona_corp;
    }
    public function getZonaCorp(): string {
        return $this->zona_corp;
    }

    public function get_array_tratamiento(): array {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descrip,
            'precio' => $this->precio,
            'Zona corporal' => $this->zona_corp
        ];
    }
}


class Articulo {
    protected int $id;
    protected string $nombre;
    protected float $precio;
    protected int $iva;
    protected int $dto;
    


    public function __construct(string $id, string $nombre, float $precio, string $iva, string $dto) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->iva = $iva;
        $this->dto = $dto;
    }

    //SETTERS Y GETTERS

    public function setId(int $id) {
        $this->id = $id;
    }
    public function getId(): int {
        return $this->id;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }
    public function getNombre(): string {
        return $this->nombre;
    }

    public function setPrecio(float $precio) {
        $this->precio = $precio;
    }
    public function getPrecio(): float {
        return $this->precio;
    }

    public function setIva(int $iva) {
        $this->iva = $iva;
    }
    public function getIva(): int {
        return $this->iva;
    }

    public function setDto(int $dto) {
        $this->dto = $dto;
    }
    public function getDto(): int {
        return $this->dto;
    }

    public function get_array_articulo(): array {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'Iva' => $this->iva,
            'Descuento' => $this->dto
        ];
    }
}

?>