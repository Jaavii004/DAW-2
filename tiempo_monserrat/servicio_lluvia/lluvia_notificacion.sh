#!/bin/bash

# URL de la página de meteorología
URL="https://www.meteomontserrat.com/TiempoActual.htm"

# Descargar el contenido HTML de la página
HTML_CONTENT=$(curl -s "$URL")

# Usamos grep y awk para extraer el valor de la lluvia (en mm) de la página HTML.
RAIN_VALUE=$(echo "$HTML_CONTENT" | grep -oP '(?<=Tasa de Lluvia</td><td>)[^<]+' | head -n 1)

# Comprobamos si la lluvia es mayor a 1mm
if [[ $(echo "$RAIN_VALUE > 1" | bc -l) -eq 1 ]]; then
    # Enviar una notificación si la lluvia supera 1mm
    notify-send "¡Aviso! Lluvia detectada" "La lluvia es de $RAIN_VALUE mm."
fi

# Comprobamos si la lluvia es mayor a 50mm para una notificación inmersiva
if [[ $(echo "$RAIN_VALUE > 50" | bc -l) -eq 1 ]]; then
    # Enviar una notificación inmersiva si la lluvia supera 50mm
    notify-send --urgency=critical --icon=weather-storm "¡Alerta de Tormenta!" "Lluvia intensa: $RAIN_VALUE mm. ¡Toma precauciones!"
fi
