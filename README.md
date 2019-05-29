# Visor de tesis en formato XML

Proyecto para la creación de un lector de archivos XML con formato propio.


## Instalación, configuración

No requiere alguna configuración especial, solo debe clonarse el proyecto, porsteriormente debe crearse en raíz una carpeta llamada 'asset' (ver abajo más detalles sobre esta carpeta).

A través de la url se solicita el XML que se desea consultar desde 'asset', para ello se llama a una url como la siguiente:  

http://[dominio]/[ruta/]?code=[carpeta-en-asset]

## Carpeta asset

En ella se colocan las carpetas que contienen los archivos XML, las carpetas y los XML que contienen deben tener el mismo nombre.  

En la carpeta 'ejemplosXML', hay un par de carpetas con XML e imagenes que pueden usarse para ver ejemplos, para ello habrá que copiar dichas carpetas a 'asset'.

## Versión
0.1 - Sólo interpretación parcial del inicio.

0.5 - Interpretación completa del documento.

0.9 - Versión con estilos usando bootstrap.
