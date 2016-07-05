<?php  
session_start();
header('Content-type: application/json');
require_once 'directoryservices.php';


$objDatos = json_decode(file_get_contents("php://input"));
$method = $objDatos->method;
switch ($method) {
	//Metodos de Calidad

	/**
	* selectCalidad
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Devuelve el total de las tuplas de la tabla "calidad"
	* Devuelve : Lista de resultados de la consulta
	*/
	case 'selectCalidad':
	require $wscalidad;
		echo ServiciosCalidad::SelectAllcalidad($objDatos);
		break;
    		


	/**
	* insertCalidad
	*
	* Parametros de entrada: $cali_nombre
	* Descripcion: Inserta una nueva tupla en la tabla "Calidad"
	* Devuelve : Estados de la consulta
	*/
	case 'insertCalidad':
	require $wscalidad;
		echo ServiciosCalidad::InsertCalidad($objDatos);
		break;



	/**
	* updateCalidad
	*
	* Parametros de entrada: $cali_nombre, $cali_calidadid
	* Descripcion: Actualiza tupla en la tabla "Calidad"
	* Devuelve : Estados de la consulta
	*/
	case 'updateCalidad':
	require $wscalidad;
		echo ServiciosCalidad::UpdateCalidad($objDatos);
		break;


	/**
	* deleteCalidad
	*
	* Parametros de entrada: $cali_calidadid
	* Descripcion: Elimina tupla en la tabla "Calidad"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteCalidad':
	require $wscalidad;
		echo ServiciosCalidad::DeleteCalidad($objDatos);
		break;
	//Metodos de Calidad
//=========================================================================================

	//Metodos de Categoria


			/**
	* selectCategoria
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene tublas de la tabla "Categoria"
	* Devuelve : Lista de Tuplas
	*/
	case 'selectCategoria':
	require $wscategoria;
		echo ServiciosCategoria::SelectCategoria($objDatos);
		break;


	/**
	* insertCategoria
	*
	* Parametros de entrada: $cate_nombre, $cate_Activo, $cate_fechacreacion, $cate_fechamodificacion, $cate_usuariocreacion, $cate_usuariomodificacion
	* Descripcion: Inserta una nueva tupla en la tabla "Categoria"
	* Devuelve : Estados de la consulta
	*/
	case 'insertCategoria':
	require $wscategoria;
		echo ServiciosCategoria::InsertCategoria($objDatos);
		break;


	/**
	* updateCategoria
	*
	* Parametros de entrada: $cate_nombre, $cate_Activo, $cate_fechacreacion, $cate_fechamodificacion, $cate_usuariocreacion, $cate_usuariomodificacion, $cate_categoriaid
	* Descripcion: Actualiza tupla en la tabla "Categoria"
	* Devuelve : Estados de la consulta
	*/
	case 'updateCategoria':
	require $wscategoria;
		echo ServiciosCategoria::UpdateCategoria($objDatos);
		break;


	/**
	* deleteCategoria
	*
	* Parametros de entrada: $cate_categoriaid
	* Descripcion: Elimina tupla en la tabla "Categoria"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteCategoria':
	require $wscategoria;
		echo ServiciosCategoria::DeleteCategoria($objDatos);
		break;


	/**
	* selectCategoriaSubCategoria
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene detalles de Categoria con SubCategoria 
	* Devuelve : Lista de Tuplas
	*/
	case 'selectCategoriaSubCategoria':
	require $wscategoria;

		echo ServiciosCategoria::CategoriaSubCategoria($objDatos);
		break;
	//Metodos de Categoria		

//===================================================================



	//Metodos Roles
	/**
	* selectRoles
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene tuplas de la tabla "Roles"
	* Devuelve : Lista de Roles
	*/
	case 'selectRoles':
	require $wsroles;
		echo ServiciosRoles::SelectRoles($objDatos);
		break;


	/**
	* insertRoles
	*
	* Parametros de entrada: $rol_nombre
	* Descripcion: Inserta una nueva tupla en la tabla "Roles"
	* Devuelve : Estados de la consulta
	*/
	case 'insertRoles':
	require $wsroles;
		echo ServiciosRoles::InsertRoles($objDatos);
		break;


	/**
	* updateRoles
	*
	* Parametros de entrada: $rol_nombre, $rol_rolid
	* Descripcion: Actualiza tupla en la tabla "Roles"
	* Devuelve : Estados de la consulta
	*/
	case 'updateRoles':
	require $wsroles;
		echo ServiciosRoles::UpdateRoles($objDatos);
		break;


	/**
	* deleteRoles
	*
	* Parametros de entrada: $rol_rolid
	* Descripcion: Elimina tupla en la tabla "Roles"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteRoles':
	require $wsroles;
		echo ServiciosRoles::DeleteRoles($objDatos);
		break;
	//Metodos Roles


	//=============================================================================
	


	//Metodos Permisos
	/**
	* selectPermisos
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtine tuplas de la tabla "Permisos"
	* Devuelve : Lista de Permisos
	*/
	case 'selectPermisos':
	require $wspermisos;
		echo ServiciosPermisos::SelectPermisos($objDatos);
		break;


	/**
	* insertPermisos
	*
	* Parametros de entrada: $perm_nombre
	* Descripcion: Inserta una nueva tupla en la tabla "Permisos"
	* Devuelve : Estados de la consulta
	*/	
	case 'insertPermisos':
	require $wspermisos;
		echo ServiciosPermisos::InsertPermisos($objDatos);
		break;


	/**
	* updatePermisos
	*
	* Parametros de entrada: $perm_nombre,$perm_permisoid
	* Descripcion: Actualiza tupla en la tabla "Permisos"
	* Devuelve : Estados de la consulta
	*/
	case 'updatePermisos':
	require $wspermisos;
		echo ServiciosPermisos::UpdatePermisos($objDatos);
		break;


	/**
	* deletePermisos
	*
	* Parametros de entrada: $perm_permisoid
	* Descripcion: Elimina tupla de la tabla "Permisos"
	* Devuelve : Estados de la consulta
	*/		
	case 'deletePermisos':
	require $wspermisos;
		echo ServiciosPermisos::DeletePermisos($objDatos);
		break;
	//Metodos Permisos


//==========================================================================		
	//Metodos RolPermisos
	/**
	* selectRolPermisos
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene tuplas de la tabla "RolPermisos"
	* Devuelve : Estados de la consulta
	*/
	case 'selectRolPermisos':
	require $wsrolpermiso;
		echo ServiciosRolPermisos::SelectRolPermisos($objDatos);
		break;


	/**
	* insertRolPermisos
	*
	* Parametros de entrada: $Roles_rol_rolid,$Permisos_perm_permisoid
	* Descripcion: Inserta una nueva tupla en la tabla "RolPermisos"
	* Devuelve : Estados de la consulta
	*/
	case 'insertRolPermisos':
	require $wsrolpermiso;
		echo ServiciosRolPermisos::InsertRolPermisos($objDatos);
		break;


	/**
	* updateRolPermisos
	*
	* Parametros de entrada: $Roles_rol_rolid, $Permisos_perm_permisoid
	* Descripcion: Actualiza tupla de la tabla "RolPermisos"
	* Devuelve : Estados de la consulta
	*/
	case 'updateRolPermisos':
	require $wsrolpermiso;
		echo ServiciosRolPermisos::UpdateRolPermisos($objDatos);
		break;


	/**
	* deleteRolPermisos
	*
	* Parametros de entrada: $Permisos_perm_permisoid
	* Descripcion: Inserta una nueva tupla en la tabla "RolPermisos"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteRolPermisos':
	require $wsrolpermiso;
		echo ServiciosRolPermisos::DeleteRolPermisos($objDatos);
		break;
	//Metodos RolPermisos	


//================================================



	//Metodos Usuarios
	/**
	* selectUsuarios
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene tuplas de la tabla "Usuarios"
	* Devuelve : Lista de Usuarios
	*/
	case 'selectUsuarios':
	require $wsusuarios;
		echo ServiciosUsuarios::SelectUsuarios($objDatos);
		break;


	/**
	* insertUsuarios
	*
	* Parametros de entrada: $user_name, $user_password, $Roles_rol_rolid
	* Descripcion: Inserta una nueva tupla en la tabla "Usuarios"
	* Devuelve : Estados de la consulta
	*/
	case 'insertUsuarios':
	require $wsusuarios;
		echo ServiciosUsuarios::InsertUsuarios($objDatos);
		break;


	/**
	* updateUsuarios
	*
	* Parametros de entrada: $user_name, $user_password, $Roles_rol_rolid, $user_usuarioid
	* Descripcion: Actualiza tupla en la tabla "Usuarios"
	* Devuelve : Estados de la consulta
	*/
	case 'updateUsuarios':
	require $wsusuarios;
		echo ServiciosUsuarios::UpdateUsuarios($objDatos);
		break;


	/**
	* deleteUsuarios
	*
	* Parametros de entrada: $user_usuarioid
	* Descripcion: Elimina tupla en la tabla "Usuarios"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteUsuarios':
	require $wsusuarios;
		echo ServiciosUsuarios::DeleteUsuarios($objDatos);
		break;


	/**
	* loginUsuarios
	*
	* Parametros de entrada: $user_name,$user_password
	* Descripcion: Verifica que el usuario y la contraseña sean validos
	* Devuelve : Estados de la consulta
	*/
	case 'loginUsuarios':
	require $wsusuarios;

		echo ServiciosUsuarios::LoginUsuarios($objDatos);
		break;


	//Metodos Usuarios

//=================================================================================

    //Metodo Marcas

	/**
	* selectMarcas
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene tuplas de la tabla "Marcas"
	* Devuelve : Lista de marcas
	*/
	case 'selectMarcas':
	require $wsmarcas;
		echo ServiciosMarcas::SelectAllMarcas($objDatos);
		break;


	/**
	* insertMarcas
	*
	* Parametros de entrada: $marc_nombre, $marc_activo
	* Descripcion: Inserta una nueva tupla en la tabla "Marcas"
	* Devuelve : Estados de la consulta
	*/
	case 'insertMarcas':
	require $wsmarcas;
		echo ServiciosMarcas::InsertMarcas($objDatos);
		break;


	/**
	* updateMarcas
	*
	* Parametros de entrada: $marc_nombre, $marc_activo, $marc_marcaid
	* Descripcion: Actualiza tupla de la tabla "Marcas"
	* Devuelve : Estados de la consulta
	*/
	case 'updateMarcas':
	require $wsmarcas;
		echo ServiciosMarcas::UpdateMarcas($objDatos);
		break;


	/**
	* deleteMarcas
	*
	* Parametros de entrada: $marc_marcaid
	* Descripcion: Inserta una nueva tupla en la tabla "Marcas"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteMarcas':
	require $wsmarcas;
		echo ServiciosMarcas::DeleteMarcas($objDatos);
		break;
	//Metodos Marcas

//=================================================================================

    //Metodo Medida	

	/**
	* selectMedida
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene tuplas de la tabla "Medida"
	* Devuelve : Lista de medidas
	*/
	case 'selectMedida':
	require $wsmedidas;
		echo ServiciosMedida::SelectAllMedida($objDatos);
		break;


	/**
	* insertMedida
	*
	* Parametros de entrada: $medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion
	* Descripcion: Inserta una nueva tupla en la tabla "Medida"
	* Devuelve : Estados de la consulta
	*/
	case 'insertMedida':
	require $wsmedidas;
		echo ServiciosMedida::InsertMedida($objDatos);
		break;


	/**
	* updateMedida
	*
	* Parametros de entrada: $medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion, $medi_medidaid
	* Descripcion: Actualiza tupla de la tabla "Medida"
	* Devuelve : Estados de la consulta
	*/
	case 'updateMedida':
	require $wsmedidas;
		echo ServiciosMedida::UpdateMedida($objDatos);
		break;


	/**
	* deleteMedida
	*
	* Parametros de entrada: $medi_medidaid
	* Descripcion: Inserta una nueva tupla en la tabla "Medida"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteMedida':
	require $wsmedidas;
		echo ServiciosMedida::DeleteMedida($objDatos);
		break;

	//Metodos Medida


//=================================================================================

    //Metodo Colores	

	/**
	* selectColores
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene tuplas de la tabla "Colores"
	* Devuelve : Lista de Colores
	*/
	case 'selectColores':
	require $wscolores;
		echo ServiciosColores::SelectColores($objDatos);
		break;


	/**
	* insertColores
	*
	* Parametros de entrada: $colo_nombre, $colo_activo
	* Descripcion: Inserta una nueva tupla en la tabla "ColoresColores"
	* Devuelve : Estados de la consulta
	*/
	case 'insertColores':
	require $wscolores;
		echo ServiciosColores::InsertColores($objDatos);
		break;


	/**
	* updateColores
	*
	* Parametros de entrada: $$colo_nombre, $colo_activo, $colo_colorid
	* Descripcion: Actualiza tupla de la tabla "Colores"
	* Devuelve : Estados de la consulta
	*/
	case 'updateColores':
	require $wscolores;
		echo ServiciosColores::UpdateColores($objDatos);
		break;


	/**
	* deleteColores
	*
	* Parametros de entrada: $colo_colorid
	* Descripcion: Inserta una nueva tupla en la tabla "Colores"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteColores':
	require $wscolores;
		echo ServiciosColores::DeleteColores($objDatos);
		break;

//=================================================================================

    //Metodo Moneda	

	/**
	* selectMoneda
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene tuplas de la tabla "Moneda"
	* Devuelve : Lista de Moneda
	*/
	case 'selectMoneda':
	require $wsmoneda;
		echo ServiciosMoneda::SelectMoneda($objDatos);
		break;


	/**
	* insertMoneda
	*
	* Parametros de entrada: $medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion
	* Descripcion: Inserta una nueva tupla en la tabla "Moneda"
	* Devuelve : Estados de la consulta
	*/
	case 'insertMoneda':
	require $wsmoneda;
		echo ServiciosMoneda::InsertMoneda($objDatos);
		break;


	/**
	* updateMoneda
	*
	* Parametros de entrada: $medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion, $medi_medidaid
	* Descripcion: Actualiza tupla de la tabla "Moneda"
	* Devuelve : Estados de la consulta
	*/
	case 'updateMoneda':
	require $wsmoneda;
		echo ServiciosMoneda::UpdateMoneda($objDatos);
		break;


	/**
	* deleteMoneda
	*
	* Parametros de entrada: $medi_medidaid
	* Descripcion: Inserta una nueva tupla en la tabla "Moneda"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteMoneda':
	require $wsmoneda;
		echo ServiciosMoneda::DeleteMoneda($objDatos);
		break;


//=================================================================================

    //Metodo SubCategoria	

	/**
	* selectSubCategoria
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene tuplas de la tabla "SubCategoria"
	* Devuelve : Lista de SubCategoria
	*/
	case 'selectSubCategoria':
	require $wssubcategoria;
		echo ServiciosSubCategoria::SelectSubCategoria($objDatos);
		break;


	/**
	* insertSubCategoria
	*
	* Parametros de entrada: $subc_nombre, $subc_activo, $subc_fechacreacion, $subc_fechamodificacion, $subc_usuariocreacion, $subc_usuariomodificacion, $Categoria_cate_categoriaid
	* Descripcion: Inserta una nueva tupla en la tabla "SubCategoria"
	* Devuelve : Estados de la consulta
	*/
	case 'insertSubCategoria':
	require $wssubcategoria;
		echo ServiciosSubCategoria::InsertSubCategoria($objDatos);
		break;


	/**
	* updateSubCategoria
	*
	* Parametros de entrada: $subc_nombre, $subc_activo, $subc_fechacreacion, $subc_fechamodificacion, $subc_usuariocreacion, $subc_usuariomodificacion, $Categoria_cate_categoriaid, $subc_subcategoriaid
	* Descripcion: Actualiza tupla de la tabla "SubCategoria"
	* Devuelve : Estados de la consulta
	*/
	case 'updateSubCategoria':
	require $wssubcategoria;
		echo ServiciosSubCategoria::UpdateSubCategoria($objDatos);
		break;


	/**
	* deleteSubCategoria
	*
	* Parametros de entrada: $subc_subcategoriaid
	* Descripcion: Inserta una nueva tupla en la tabla "SubCategoria"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteSubCategoria':
	require $wssubcategoria;
		echo ServiciosSubCategoria::DeleteSubCategoria($objDatos);
		break;

/**
	* SelectCategoriabySubCategoria
	*
	* Parametros de entrada: $cate_categoriaid
	* Descripcion: Inserta una nueva tupla en la tabla "SubCategoria"
	* Devuelve : Estados de la consulta
	*/
	case 'SelectCategoriabySubCategoria':
	require $wssubcategoria;
		echo ServiciosSubCategoria::SelectCategoriabySubCategoria($objDatos);
		break;

//=================================================================================

    //Metodo Productos	

	/**
	* selectProductos
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene tuplas de la tabla "Producto"
	* Devuelve : Lista de Producto
	*/
	case 'selectProductos':
	require $wsproductos;
		echo ServiciosProductos::SelectProductos($objDatos);
		break;


	/**
	* insertProductos
	*
	* Parametros de entrada: $medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion
	* Descripcion: Inserta una nueva tupla en la tabla "Productos"
	* Devuelve : Estados de la consulta
	*/
	case 'insertProductos':
	require $wsproductos;
		echo ServiciosProductos::InsertProductos($objDatos);
		break;


	/**
	* updateProductos
	*
	* Parametros de entrada: $medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion, $medi_medidaid
	* Descripcion: Actualiza tupla de la tabla "Productos"
	* Devuelve : Estados de la consulta
	*/
	case 'updateProductos':
	require $wsproductos;
		echo ServiciosProductos::UpdateProductos($objDatos);
		break;


	/**
	* deleteProductos
	*
	* Parametros de entrada: $medi_medidaid
	* Descripcion: Inserta una nueva tupla en la tabla "Productos"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteProductos':
	require $wsproductos;
		echo ServiciosProductos::DeleteProductos($objDatos);
		break;



	/**
	* SelectAllproductobyCategoria
	*
	* Parametros de entrada: $medi_medidaid
	* Descripcion: Inserta una nueva tupla en la tabla "Productos"
	* Devuelve : Estados de la consulta
	*/
	case 'SelectAllproductobyCategoria':
	require $wsproductos;
		echo ServiciosProductos::SelectAllproductobyCategoria($objDatos);
		break;

//=================================================================================

//=================================================================================
// Metodos Cliente

	/**
	* selectProductos
	*
	* Parametros de entrada: Ninguno
	* Descripcion: Obtiene tuplas de la tabla "Producto"
	* Devuelve : Lista de Producto
	*/
	case 'selectClientes':
	require $wsclientes;
		echo ServiciosClientes::Selectclientes($objDatos);
		break;


	/**
	* insertProductos
	*
	* Parametros de entrada: $medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion
	* Descripcion: Inserta una nueva tupla en la tabla "Productos"
	* Devuelve : Estados de la consulta
	*/
	case 'insertClientes':
	require $wsclientes;
		echo ServiciosClientes::Insertclientes($objDatos);
		break;


	/**
	* updateProductos
	*
	* Parametros de entrada: $medi_nombre, $medi_activo, $medi_fechacreacion, $medi_fechamodificacion, $medi_usuariocreacion, $medi_usuariomodificacion, $medi_medidaid
	* Descripcion: Actualiza tupla de la tabla "Productos"
	* Devuelve : Estados de la consulta
	*/
	case 'updateClientes':
	require $wsclientes;
		echo ServiciosClientes::Updateclientes($objDatos);
		break;


	/**
	* deleteProductos
	*
	* Parametros de entrada: $medi_medidaid
	* Descripcion: Inserta una nueva tupla en la tabla "Productos"
	* Devuelve : Estados de la consulta
	*/
	case 'deleteClientes':
	require $wsclientes;
		echo ServiciosClientes::Deleteclientes($objDatos);
		break;

	 //Metodos de contenidoweb
    /**
    * selectcontenidoweb
    *
    * Parametros de entrada: Ninguno
    * Descripcion: Devuelve el total de las tuplas de la tabla contenidoweb
    * Devuelve : Lista de resultados de la consulta
    */
    case 'selectcontenidoweb':
    require $wscontenidoweb;
    echo Servicioscontenidoweb::selectcontenidoweb($objDatos);
    break;
    /**
    * insertcontenidoweb
    *
    * Parametros de entrada: $contw_descripcion, $contw_descripcioningles, $contw_clave
    * Descripcion: Devuelve el total de las tuplas de la tabla contenidoweb
    * Devuelve : Devuelve estados de la consulta
    */
    case 'insertcontenidoweb':
    require $wscontenidoweb;
    echo Servicioscontenidoweb::insertcontenidoweb($objDatos);
    break;
    /**
    * deletecontenidoweb
    *
    * Parametros de entrada: $contw_contenidowebid
    * Descripcion: Devuelve el total de las tuplas de la tabla contenidoweb
    * Devuelve : Devuelve estados de la consulta
    */
    case 'deletecontenidoweb':
    require $wscontenidoweb;
    echo Servicioscontenidoweb::deletecontenidoweb($objDatos);
    break;
    /**
    * updatecontenidoweb
    *
    * Parametros de entrada: $contw_descripcion, $contw_descripcioningles, $contw_clave$contw_contenidowebid
    * Descripcion: Actualiza la tabla contenidoweb
    * Devuelve : Devuelve estados de la consulta
    */
    case 'updatecontenidoweb':
    require $wscontenidoweb;
    echo Servicioscontenidoweb::updatecontenidoweb($objDatos);



 //Metodos de contenidoweb
    /**
    * selectcontenidoweb
    *
    * Parametros de entrada: Ninguno
    * Descripcion: Devuelve el total de las tuplas de la tabla contenidoweb
    * Devuelve : Lista de resultados de la consulta
    */
    case 'selectcontenidoweb':
    require $wscontenidoweb;
    echo Servicioscontenidoweb::selectcontenidoweb($objDatos);
    break;
    /**
    * insertcontenidoweb
    *
    * Parametros de entrada: $contw_descripcion, $contw_descripcioningles, $contw_clave
    * Descripcion: Devuelve el total de las tuplas de la tabla contenidoweb
    * Devuelve : Devuelve estados de la consulta
    */
    case 'insertcontenidoweb':
    require $wscontenidoweb;
    echo Servicioscontenidoweb::insertcontenidoweb($objDatos);
    break;
    /**
    * deletecontenidoweb
    *
    * Parametros de entrada: $contw_contenidowebid
    * Descripcion: Devuelve el total de las tuplas de la tabla contenidoweb
    * Devuelve : Devuelve estados de la consulta
    */
    case 'deletecontenidoweb':
    require $wscontenidoweb;
    echo Servicioscontenidoweb::deletecontenidoweb($objDatos);
    break;
    /**
    * updatecontenidoweb
    *
    * Parametros de entrada: $contw_descripcion, $contw_descripcioningles, $contw_clave$contw_contenidowebid
    * Descripcion: Actualiza la tabla contenidoweb
    * Devuelve : Devuelve estados de la consulta
    */
    case 'updatecontenidoweb':
    require $wscontenidoweb;
    echo Servicioscontenidoweb::updatecontenidoweb($objDatos);




 //Metodos de rolforma
    /**
    * selectrolforma
    *
    * Parametros de entrada: Ninguno
    * Descripcion: Devuelve el total de las tuplas de la tabla contenidoweb
    * Devuelve : Lista de resultados de la consulta
    */
    case 'selectrolforma':
    require $wsrolforma;
    echo ServiciosRolesForma::SelectRolesForma($objDatos);
    break;
    /**
    * insertrolforma
    *
    * Parametros de entrada: $contw_descripcion, $contw_descripcioningles, $contw_clave
    * Descripcion: Devuelve el total de las tuplas de la tabla contenidoweb
    * Devuelve : Devuelve estados de la consulta
    */
    case 'insertrolforma':
    require $wsrolforma;
    echo ServiciosRolesForma::InsertRolesForma($objDatos);
    break;
    /**
    * deleterolforma
    *
    * Parametros de entrada: $contw_contenidowebid
    * Descripcion: Devuelve el total de las tuplas de la tabla contenidoweb
    * Devuelve : Devuelve estados de la consulta
    */
    case 'deleterolforma':
    require $wsrolforma;
    echo ServiciosRolesForma::DeleteRolesForma($objDatos);
    break;
    /**
    * updaterolforma
    *
    * Parametros de entrada: $contw_descripcion, $contw_descripcioningles, $contw_clave$contw_contenidowebid
    * Descripcion: Actualiza la tabla contenidoweb
    * Devuelve : Devuelve estados de la consulta
    */
    case 'updaterolforma':
    require $wsrolforma;
    echo ServiciosRolesForma::UpdateRolesForma($objDatos);


    //Metodos de formas
    /**
    * selectformas
    *
    * Parametros de entrada: Ninguno
    * Descripcion: Devuelve el total de las tuplas de la tabla formas
    * Devuelve : Lista de resultados de la consulta
    */
    case 'selectformas':
    require $wsformas;
    echo Serviciosformas::selectformas($objDatos);
    break;

    //Metodos de formas
    /**
    * selectformas
    *
    * Parametros de entrada: Ninguno
    * Descripcion: Devuelve el total de las tuplas de la tabla formas
    * Devuelve : Lista de resultados de la consulta
    */
    case 'SelectFormasbyModulo':
    require $wsformas;
    echo Serviciosformas::SelectFormasbyModulo($objDatos);
    break;
    
    /**
    * insertformas
    *
    * Parametros de entrada: $form_nombre, $form_archivo, $TipoForma_tifo_tipoformaid, $Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid
    * Descripcion: Devuelve el total de las tuplas de la tabla formas
    * Devuelve : Devuelve estados de la consulta
    */
    case 'insertformas':
    require $wsformas;
    echo Serviciosformas::insertformas($objDatos);
    break;
    /**
    * deleteformas
    *
    * Parametros de entrada: $form_formaid
    * Descripcion: Devuelve el total de las tuplas de la tabla formas
    * Devuelve : Devuelve estados de la consulta
    */
    case 'deleteformas':
    require $wsformas;
    echo Serviciosformas::deleteformas($objDatos);
    break;
    /**
    * updateformas
    *
    * Parametros de entrada: $form_nombre, $form_archivo, $TipoForma_tifo_tipoformaid, $Modulos_modu_moduloid, $Modulos_TipoModulo_timo_tipomoduloid$form_formaid
    * Descripcion: Actualiza la tabla formas
    * Devuelve : Devuelve estados de la consulta
    */
    case 'updateformas':
    require $wsformas;
    echo Serviciosformas::updateformas($objDatos);
    break;

     //Metodos de modulos
    /**
    * selectmodulos
    *
    * Parametros de entrada: Ninguno
    * Descripcion: Devuelve el total de las tuplas de la tabla modulos
    * Devuelve : Lista de resultados de la consulta
    */
    case 'selectmodulos':
    require $wsmodulos;
    echo Serviciosmodulos::selectmodulos($objDatos);
    break;
    /**
    * insertmodulos
    *
    * Parametros de entrada: $modu_nombre
    * Descripcion: Devuelve el total de las tuplas de la tabla modulos
    * Devuelve : Devuelve estados de la consulta
    */
    case 'insertmodulos':
    require $wsmodulos;
    echo Serviciosmodulos::insertmodulos($objDatos);
    break;
    /**
    * deletemodulos
    *
    * Parametros de entrada: $modu_moduloid,$TipoModulo_timo_tipomoduloid
    * Descripcion: Devuelve el total de las tuplas de la tabla modulos
    * Devuelve : Devuelve estados de la consulta
    */
    case 'deletemodulos':
    require $wsmodulos;
    echo Serviciosmodulos::deletemodulos($objDatos);
    break;
    /**
    * updatemodulos
    *
    * Parametros de entrada: $modu_nombre$modu_moduloid,$TipoModulo_timo_tipomoduloid
    * Descripcion: Actualiza la tabla modulos
    * Devuelve : Devuelve estados de la consulta
    */
    case 'updatemodulos':
    require $wsmodulos;
    echo Serviciosmodulos::updatemodulos($objDatos);
    break;
  case 'SelectModulobyRol':
    require $wsmodulos;
    echo Serviciosmodulos::SelectModulobyRol($objDatos);
    break;


	default:
		# code...
		break;
}

?>