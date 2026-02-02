# Proyecto Final: ASTERISK

## Descripción
Este proyecto final se enfoca en la implementación y configuración de Asterisk, una plataforma de comunicaciones de código abierto. Se realizan diversas configuraciones y pruebas para establecer comunicaciones entre centralitas, teléfonos IP y dispositivos físicos, además de la integración con un servidor Flask para el control y monitoreo de datos.

## Docente
- Ing. Santiago Manzano

## Contenido del Proyecto
1. **Instalación de Asterisk**: 
    - Actualización del sistema e instalación de dependencias
    - Configuración de SELinux
    - Compilación e instalación de Asterisk
    - Inicialización del servicio

2. **Comunicación Entre Centralitas**:
    - Configuración de archivos `iax.conf`, `sip.conf` y `extensions.conf`
    - Verificación de comunicación

3. **Comunicación Teléfono IP**:
    - Configuración de Asterisk y teléfonos IP (Zoiper y MicroSIP)
    - Pruebas de llamada

4. **Control de Dispositivo Físico ON/OFF con un foco utilizando Asterisk**:
    - Configuración de la ESP8266 y Asterisk
    - Verificación de encendido y apagado del foco

5. **Consulta de Últimos Datos**:
    - Configuración de Asterisk para consultas de datos
    - Verificación de resultados

6. **Encuesta de Satisfacción**:
    - Creación de script en PHP y configuración en Asterisk
    - Verificación de resultados de la encuesta

7. **Sistema de Alarmas para Niveles de Temperatura, Humedad y Luminosidad**:
    - Configuración de la ESP8266 y Asterisk
    - Integración con servidor Flask y script PHP para llamadas de alerta
    - Verificación de resultados y prevención de incendios

## Requisitos
### Hardware
- Servidor para Asterisk
- Teléfonos IP
- Dispositivos ESP8266
- Sensores de temperatura, humedad y luminosidad
- Foco eléctrico

### Software
- Asterisk
- Softphones (Zoiper, MicroSIP)
- Servidor Flask
- Scripts en PHP para diversas configuraciones

## Instalación y Configuración
1. **Instalar Asterisk**:
    - Siga las instrucciones detalladas en la sección 8.1 del informe para actualizar el sistema, instalar dependencias, y configurar SELinux.
    - Compile e instale Asterisk utilizando `make`.

2. **Configurar Comunicación Entre Centralitas**:
    - Edite los archivos `iax.conf`, `sip.conf` y `extensions.conf` según las indicaciones en la sección 8.2.

3. **Configurar Teléfonos IP**:
    - Configure los teléfonos IP y softphones como se describe en la sección 8.3.

4. **Controlar Dispositivo Físico**:
    - Siga los pasos en la sección 8.4 para configurar la ESP8266 y verificar el control del foco.

5. **Realizar Consultas de Datos**:
    - Configure Asterisk para consultas de datos como se detalla en la sección 8.5.

6. **Encuesta de Satisfacción**:
    - Cree y configure el script PHP y verifique los resultados según la sección 8.6.

7. **Sistema de Alarmas**:
    - Configure la ESP8266, Asterisk y el servidor Flask para el sistema de alarmas como se describe en la sección 8.7.

## Conclusiones y Recomendaciones
Las conclusiones y recomendaciones del proyecto se encuentran en las secciones 10 y 9 del informe, respectivamente.

## Bibliografía
La bibliografía utilizada para este proyecto se encuentra en la sección 11 del informe.

## Anexos
Los anexos adicionales están disponibles en la sección 12 del informe.

## Contacto
Para cualquier consulta sobre el proyecto, por favor contacte a los integrantes a través de los canales proporcionados por la universidad.

---

Facultad de Ingeniería en Sistemas, Electrónica e Industrial  
Carrera de Telecomunicaciones  
Universidad Técnica de Ambato  
Ambato, Ecuador  
2024

