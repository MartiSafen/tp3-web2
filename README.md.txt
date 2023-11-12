ALUMNOS:
Martina Safenriter y Francisco Camio Moreno
DESCRIPCION:
Este proyecto implementa una API para gestionar productos con categorias en un E-commerce de ropa.

ENDPOINTS:
1. Obtener un elemento por ID
Endpoint: http://localhost/TP3_web2/api/productos/id

Método: GET

Descripción: Retorna un producto específicado por un ID en formato JSON.

Ejemplo de respuesta para ID = 1:

 {
        "id": 8,
        "id_categoria": 8,
        "nombre": "remera",
        "talle": "m",
        "precio": 5000,
        "vendedor": "martina"
    }
2. Insertar una nueva categoría
Endpoint: http://localhost/TP3_web2/api/categoria

Método: POST

Descripción: Agrega una nueva categoría.

material y color son VARCHAR.

Formato JSON de solicitud:

{
    "material": "algodon",
    "color": "blanco"
}
3. Obtener productos ordenadas
Endpoint: http://localhost/TP3_web2/api/productos

Método: GET

Descripción: Retorna todos los productos ordenados según el precio puede ser de manera descendete o ascendente.

Parámetros de consulta:

sort: tiene que ser "precio"
order: Puede ser "asc" (ascendente) o "desc" (descendente).
Ejemplos de uso:

Ordenar por ID de manera descendente: http://localhost/TP3_web2/api/productos?sort=precio&order=desc
Ordenar por ID de manera ascendente: http://localhost/TP3_web2/api/productos?sort=precio&order=asc
4. Obtener todos los productos
Endpoint: http://localhost/TP3_web2/api/productos
Método: GET
Descripción: Retorna todos los productos.
5. Modificar un producto
Endpoint: http://localhost/TP3_web2/api/productos/:id

Método: PUT

Descripción: Modifica un producto existente.

id_categoria, precio son INT.
nombre, talle y vendedor son VARCHAR
Formato JSON de solicitud:

    {
        "id_categoria": 1,
        "nombre": "remera",
        "talle": "m",
        "precio": 5500,
        "vendedor": "martina"
    },
