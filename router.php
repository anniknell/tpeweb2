<?php
require_once './app/controllers/items.controller.php';
require_once './app/controllers/admin.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controller = new ProductosController();
        if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
            $categoriaID = $_GET['categoria'];
            $controller->productosPorCategoria($categoriaID);
        } else {
            $controller->getProductos();
        }
        break;
    case 'verProducto':
        if (isset($params[1])) {
                $productoID = $params[1];
                $controller = new ProductosController();
                $controller->verProducto($productoID);
        } else {
        echo "404 Page Not Found";
        }
        break;
    case 'agregar':
        $controller = new AdminController();
        $controller->showAgregar();
        break;
    case 'categorias':
         $controller = new productosController();
         $controller->getCategorias();
         break;
    case 'agregado':
        $controller = new AdminController();
        $controller->AgregarProducto();
        break;
    case 'editar':
        $controller = new AdminController();
        $controller->showEditar($params[1]);
        break; 
    case 'editado':
        $controller = new AdminController();
        $controller->editProducto($params[1]);
        break;
    case 'borrar':
        $controller = new AdminController();
        $controller->deleteProducto($params[1]);
        break;
    case 'agregarcat':
        $controller = new AdminController();
        $controller->showAgregarCat();
        break;
    case 'agregadocat':
        $controller = new AdminController();
        $controller->AgregarCategoria();
        break;
    case 'editarcat':
        $controller = new AdminController();
        $controller->showEditarCat($params[1]);
        break; 
    case 'editadocat':
        $controller = new AdminController();
        $controller->editCategoria($params[1]);
        break;
    case 'borrarcat':
        $controller = new AdminController();
        $controller->deleteCategoria($params[1]);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
        case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;             

    default: 
        echo "404 Page Not Found";
        break;
}
