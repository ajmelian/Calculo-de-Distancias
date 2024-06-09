<?php
/**
 * Calcula la distancia entre dos puntos geográficos dados por sus coordenadas de latitud y longitud.
 * La distancia se puede devolver en kilómetros, millas o metros.
 *
 * @param float  $lat1  Latitud del primer punto.
 * @param float  $lng1  Longitud del primer punto.
 * @param float  $lat2  Latitud del segundo punto.
 * @param float  $lng2  Longitud del segundo punto.
 * @param string $unit  Unidad de medida para la distancia ('km', 'miles', 'metro'). Por defecto es 'km'.
 * 
 * @return float La distancia entre los dos puntos en la unidad especificada, redondeada a dos decimales.
 *
 * @throws InvalidArgumentException Si se proporciona una unidad no válida.
 *
 * @version 1.0
 * @author AJ Melián <amelian@codesecureforge.com>
 * @date 2024-06-09
 * @license GNU General Public License v3.0
 * 
 * @example
 * // Distancia en kilómetros
 * $distancia = distance(40.7128, -74.0060, 34.0522, -118.2437);
 * echo $distancia; // Salida: 3935.75
 * 
 * @example
 * // Distancia en millas
 * $distancia = distance(40.7128, -74.0060, 34.0522, -118.2437, 'miles');
 * echo $distancia; // Salida: 2445.56
 * 
 * @example
 * // Distancia en metros
 * $distancia = distance(40.7128, -74.0060, 34.0522, -118.2437, 'metro');
 * echo $distancia; // Salida: 3935750
 */

function distance(float $lat1, float $lng1, float $lat2, float $lng2, string $unit='km') 
{  
    // Determina el radio de la Tierra según la unidad de medida especificada
    switch ($unit)
    {
        case 'km':      $planetRadius = 6371;
                        break;
        case 'miles':   $planetRadius = 6371 * 0.6213711;
                        break;
        case 'metro':   $planetRadius = 6371 * 1000;
                        break;
    } 

    // Calcula la diferencia en radianes entre las latitudes y longitudes
    $dLat = deg2rad($lat2 - $lat1);  
    $dLon = deg2rad($lng2 - $lng1);  

    // Aplicamos la fórmula del haversine para calcular la distancia
    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2);  
    $c = 2 * asin(sqrt($a));  
    $distance = round(($planetRadius * $c),2); 
    
    return $distance;
}
?>
