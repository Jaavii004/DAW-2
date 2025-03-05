#!/bin/bash

# URL del script PHP que devuelve los datos en JSON
URL="https://gasolinerascercanas.es/chale/datos_tiempo.php"

# Obtener el JSON devuelto por el script PHP
JSON=$(curl -s "$URL")

# # Depuración: Mostrar el JSON obtenido
# echo "JSON obtenido:"
# echo "$JSON"

# Extraer la tasa de lluvia usando jq
TASA_LLUVIA=$(echo "$JSON" | jq -r '.tasa_de_lluvia')

echo "Tasa de lluvia (original): $TASA_LLUVIA"

# Limpiar la cadena para quedarnos solo con el número (quitamos todo excepto dígitos y punto)
NUM_TASA_LLUVIA=$(echo "$TASA_LLUVIA" | sed 's/[^0-9\.]//g')

# Verificar si NUM_TASA_LLUVIA es un número válido
if [[ -z "$NUM_TASA_LLUVIA" || ! "$NUM_TASA_LLUVIA" =~ ^[0-9]+(\.[0-9]+)?$ ]]; then
    echo "Error: No se pudo obtener un valor numérico de tasa de lluvia válido."
    exit 1
fi

# Realizar notificaciones en función del valor
if (( $(echo "$NUM_TASA_LLUVIA > 0.5" | bc -l) )); then
    notify-send "¡Aviso! Lluvia detectada" "La tasa de lluvia es de $NUM_TASA_LLUVIA mm/hr."
fi

if (( $(echo "$NUM_TASA_LLUVIA > 50" | bc -l) )); then
    notify-send --urgency=critical --icon=weather-storm "¡Alerta de Tormenta!" "Lluvia intensa: $NUM_TASA_LLUVIA mm/hr. ¡Toma precauciones!"
fi
