from flask import Flask, request
import paramiko

app = Flask(__name__)

# Configura los detalles de la máquina virtual
VM_HOST = '192.168.220.129'
VM_USERNAME = 'jean'
VM_PASSWORD = '1234'
PHP_SCRIPT_PATH1 = '/home/jean/scripts2php/llamada_alto.php'
PHP_SCRIPT_PATH2 = '/home/jean/scripts2php/llamada_bajo.php'


def ejecutar_script_en_vm_alto():
    try:
        ssh = paramiko.SSHClient()
        ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
        ssh.connect(VM_HOST, username=VM_USERNAME, password=VM_PASSWORD)

        stdin, stdout, stderr = ssh.exec_command(f'php {PHP_SCRIPT_PATH1}')
        salida = stdout.read().decode()
        error = stderr.read().decode()

        ssh.close()
        
        if error:
            return f"Error ejecutando el script: {error}"
        return salida
    except Exception as e:
        return f"Error de conexión SSH: {str(e)}"

def ejecutar_script_en_vm_bajo():
    try:
        ssh = paramiko.SSHClient()
        ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
        ssh.connect(VM_HOST, username=VM_USERNAME, password=VM_PASSWORD)

        stdin, stdout, stderr = ssh.exec_command(f'php {PHP_SCRIPT_PATH2}')
        salida = stdout.read().decode()
        error = stderr.read().decode()

        ssh.close()
        
        if error:
            return f"Error ejecutando el script: {error}"
        return salida
    except Exception as e:
        return f"Error de conexión SSH: {str(e)}"


@app.route('/datos', methods=['GET'])
def recibir_datos():
    temperatura = request.args.get('temperatura', type=float)
    humedad = request.args.get('humedad', type=float)
    luz = request.args.get('luz', type=float)

    umbral_temperatura_alto = 38.0
    umbral_humedad_alto = 60.0
    umbral_luz_alto = 70.0

    umbral_temperatura_bajo = 19.0
    umbral_humedad_bajo = 30.0
    umbral_luz_bajo = 15.0

    # alarma_alto = False
    # alarma_bajo = False


    if temperatura >= umbral_temperatura_alto or humedad >= umbral_humedad_alto or luz >= umbral_luz_alto:
        #alarma_alto = True
        resultado = ejecutar_script_en_vm_alto()
        return f"Script de alarma alta ejecutado. Resultado: {resultado}"

    if temperatura <= umbral_temperatura_bajo or humedad <= umbral_humedad_bajo or luz <= umbral_luz_bajo:
        #alarma_bajo = True
        resultado = ejecutar_script_en_vm_bajo()
        return f"Script de alarma baja ejecutado. Resultado: {resultado}"

    return "Datos recibidos correctamente."

# Ruta de verificación
@app.route('/check')
def check():
    return "Esta funcionando la pagina", 200

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80)
