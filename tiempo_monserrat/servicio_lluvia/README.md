### Paso 1: Crear el script

Primero, asegúrate de tener tu script en un archivo ejecutable. Guarda el siguiente script en, por ejemplo, `/home/usuario/lluvia_notificacion.sh`:

```bash
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

