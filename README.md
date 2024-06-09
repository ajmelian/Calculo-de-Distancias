# Algoritmo para Cálculo de Distancias entre dos puntos, teniendo en cuenta la curvatura del planeta

Este repositorio contiene un algoritmo en PHP para calcular la distancia entre dos puntos geográficos dados por sus coordenadas de latitud y longitud. La distancia se puede devolver en kilómetros, millas o metros.

## Tabla de Contenidos

- [Instalación](#instalación)
- [Uso](#uso)
- [Parámetros](#parámetros)
- [Retorno](#retorno)
- [Ejemplos](#ejemplos)
- [Detalles de Implementación](#detalles-de-implementación)
- [Manejo de Errores](#manejo-de-errores)
- [Contribuciones](#contribuciones)
- [Licencia](#licencia)
- [Autor](#autor)

## Instalación

Para utilizar esta función, simplemente descarga el archivo `distance.php` e inclúyelo en tu proyecto PHP.

```php
include 'distance.php';
```

## Uso

```php
distance(float $lat1, float $lng1, float $lat2, float $lng2, string $unit = 'km') : float
```

## Parámetros

- **$lat1** (float): Latitud del primer punto.
- **$lng1** (float): Longitud del primer punto.
- **$lat2** (float): Latitud del segundo punto.
- **$lng2** (float): Longitud del segundo punto.
- **$unit** (string): Unidad de medida para la distancia. Puede ser 'km' para kilómetros (por defecto), 'miles' para millas, o 'metro' para metros.

## Retorno

- **float**: La distancia entre los dos puntos en la unidad especificada, redondeada a dos decimales.

## Ejemplos

### Ejemplo 1: Distancia en kilómetros (por defecto)

```php
$distancia = distance(40.7128, -74.0060, 34.0522, -118.2437);
echo $distancia; // Salida: 3935.75
```

### Ejemplo 2: Distancia en millas

```php
$distancia = distance(40.7128, -74.0060, 34.0522, -118.2437, 'miles');
echo $distancia; // Salida: 2445.56
```

### Ejemplo 3: Distancia en metros

```php
$distancia = distance(40.7128, -74.0060, 34.0522, -118.2437, 'metro');
echo $distancia; // Salida: 3935750
```

## Detalles de Implementación

1. **Unidad de medida:** La función admite tres unidades de medida: kilómetros, millas y metros. El radio de la Tierra se ajusta según la unidad seleccionada.
   - Kilómetros: 6371 km
   - Millas: 6371 km * 0.6213711
   - Metros: 6371 km * 1000

2. **Cálculo de la distancia:**
   - Se utilizan las diferencias de latitud y longitud entre los dos puntos, convertidas a radianes.
   - Se aplica la fórmula del haversine para calcular la distancia en línea recta sobre la superficie de una esfera.
   - La distancia resultante se redondea a dos decimales.

## Manejo de Errores

La función lanza una excepción `InvalidArgumentException` si se proporciona una unidad no válida. Esto garantiza que el usuario debe especificar una unidad de medida correcta ('km', 'miles', 'metro').

```php
throw new InvalidArgumentException("Unidad no válida. Utilice 'km', 'miles' o 'metro'.");
```

## Contribuciones

Las contribuciones son bienvenidas. Por favor, crea un fork del repositorio y envía un pull request con tus mejoras o correcciones.

## Licencia

Este proyecto está licenciado bajo la Licencia GNU General Public License v3.0. Consulta el archivo [LICENSE](LICENSE) para más detalles.

## Autor

- **AJ Melián <amelian@codesecureforge.com>**
- **Fecha:** 2024-06-09
- **Versión:** 1.0
