### Paso 1: Crear el script

Primero, asegúrate de tener tu script en un archivo ejecutable. Guarda el siguiente script en, por ejemplo, `/home/usuario/lluvia_notificacion.sh`:

```bash
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
```

Luego, asegúrate de que sea ejecutable:

```bash
chmod +x /home/usuario/lluvia_notificacion.sh
```

### Paso 2: Crear el archivo de servicio de systemd

Ahora vamos a crear un servicio de `systemd` que ejecute este script cada 5 minutos.

1. **Crea un archivo de servicio en `/etc/systemd/system/`**:

   Vamos a crear un archivo de unidad de `systemd` para tu servicio. Abre un terminal y escribe:

   ```bash
   sudo nano /etc/systemd/system/lluvia_notificacion.service
   ```

2. **Contenido del archivo de servicio**:

   Pega lo siguiente en el archivo:

   ```ini
   [Unit]
   Description=Servicio de notificación de lluvia
   After=network.target

   [Service]
   Type=simple
   ExecStart=/bin/bash /home/usuario/lluvia_notificacion.sh
   Restart=always
   RestartSec=300   # Esperar 5 minutos (300 segundos) antes de reiniciar el servicio

   [Install]
   WantedBy=multi-user.target
   ```

   - **`ExecStart`**: Define el comando que se ejecutará cuando inicie el servicio. En este caso, ejecutará el script `/home/usuario/lluvia_notificacion.sh`.
   - **`Restart=always`**: Esto hará que el servicio se reinicie si alguna vez falla.
   - **`RestartSec=300`**: Esto asegura que el servicio se reinicie cada 5 minutos.
   - **`WantedBy=multi-user.target`**: Esto hace que el servicio se inicie cuando el sistema se encuentre en modo multiusuario (arranque normal).

3. **Guardar y cerrar el archivo**.

### Paso 3: Crear un temporizador de systemd

Aunque `systemd` no usa cron directamente, puedes configurar un temporizador que active el servicio cada 5 minutos.

1. **Crea el archivo de temporizador**:

   ```bash
   sudo nano /etc/systemd/system/lluvia_notificacion.timer
   ```

2. **Contenido del archivo de temporizador**:

   Pega lo siguiente en el archivo:

   ```ini
   [Unit]
   Description=Temporizador para el servicio de notificación de lluvia

   [Timer]
   OnBootSec=5min
   OnUnitActiveSec=5min
   Unit=lluvia_notificacion.service

   [Install]
   WantedBy=timers.target
   ```

   - **`OnBootSec=5min`**: Esto hace que el temporizador se ejecute 5 minutos después de que el sistema arranque.
   - **`OnUnitActiveSec=5min`**: Esto hace que el servicio se ejecute cada 5 minutos después de su última ejecución.

3. **Guardar y cerrar el archivo**.

### Paso 4: Habilitar y arrancar el servicio

Ahora, habilitamos el servicio y el temporizador para que se inicien automáticamente en el arranque del sistema:

1. **Recargar systemd**:

   ```bash
   sudo systemctl daemon-reload
   ```

2. **Habilitar el servicio**:

   ```bash
   sudo systemctl enable lluvia_notificacion.service
   ```

3. **Habilitar el temporizador**:

   ```bash
   sudo systemctl enable lluvia_notificacion.timer
   ```

4. **Iniciar el servicio y el temporizador**:

   ```bash
   sudo systemctl start lluvia_notificacion.timer
   ```

### Paso 5: Verificar el servicio

Para verificar que el servicio y el temporizador estén funcionando correctamente, puedes usar los siguientes comandos:

- **Verificar el estado del servicio**:

  ```bash
  sudo systemctl status lluvia_notificacion.service
  ```

- **Verificar el estado del temporizador**:

  ```bash
  sudo systemctl status lluvia_notificacion.timer
  ```

Si todo está bien configurado, el temporizador se activará cada 5 minutos y ejecutará tu script para comprobar la lluvia y mostrar las notificaciones.

### Conclusión

Con este enfoque, has creado un servicio de `systemd` que ejecutará tu script automáticamente cada 5 minutos sin depender de `cron`. Además, si el sistema se reinicia o el servicio falla por alguna razón, `systemd` se encargará de reiniciarlo de manera automática.

