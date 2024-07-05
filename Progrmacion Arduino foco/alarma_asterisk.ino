#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>

WiFiClient wifiClient;
#include <DHT.h>
#define DHTTYPE DHT11
#define dht_dpin 5 // PIN D1 PARA DHT11
DHT dht(dht_dpin, DHTTYPE);

const char* ssid = "LEON-RED";
const char* password = "76697978";

const char* serverNameBD = "http://192.168.7.2/Alarma_asterisk/insertar_datos.php";
const char* serverNameFlask = "http://192.168.7.4:80/datos";

//const int potPin = 2;          // Pin D4 conectado al potenciómetro
const int fotoresistorPin = A0; // Pin analógico conectado a la fotoresistencia
//int potValue = 0;               // Variable para almacenar el valor del potenciómetro

const int ledLuzBajo = 14;   // PIN D4 LED para indicar luz baja
const int ledLuzMedio = 12;  // PIN D6 LED para indicar luz media
const int ledLuzAlto = 13;   // PIN D7 LED para indicar luz alta

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);

  pinMode(ledLuzBajo, OUTPUT);
  pinMode(ledLuzMedio, OUTPUT);
  pinMode(ledLuzAlto, OUTPUT);
  
  digitalWrite(ledLuzBajo, LOW);
  digitalWrite(ledLuzMedio, LOW);
  digitalWrite(ledLuzAlto, LOW);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.println("Connecting to WiFi...");
  }

  Serial.println("Connected to WiFi");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void loop() {
  if (WiFi.status() == WL_CONNECTED) {

  // Leer la temperatura y la humedad
  float humidity = dht.readHumidity();
  float temperature = dht.readTemperature();

  // Leer el valor de la fotoresistencia
  int fotoresistorValue = analogRead(fotoresistorPin);
  float luminosity = map(fotoresistorValue, 0, 1023, 0, 100);


    // Mostrar los valores leídos en el monitor serial
    Serial.print("Temperatura: ");
    Serial.print(temperature);
    Serial.println(" °C");
    Serial.print("Humedad: ");
    Serial.print(humidity);
    Serial.println(" %");
    Serial.print("Luminosidad: ");
    Serial.print(luminosity);
    Serial.println(" %");


    // Luz
    if (luminosity < 20) {
      digitalWrite(ledLuzBajo, HIGH);
      digitalWrite(ledLuzMedio, LOW);
      digitalWrite(ledLuzAlto, LOW);
    } else if (luminosity >= 20 && luminosity < 40) {
      digitalWrite(ledLuzBajo, LOW);
      digitalWrite(ledLuzMedio, HIGH);
      digitalWrite(ledLuzAlto, LOW);
    } else if (luminosity >= 50 && luminosity <= 100) {
      digitalWrite(ledLuzBajo, LOW);
      digitalWrite(ledLuzMedio, LOW);
      digitalWrite(ledLuzAlto, HIGH);
    }

    // Enviar datos al servidor de la base de datos
    HTTPClient http;
    String url = String(serverNameBD) + "?temperatura=" + String(temperature) + "&humedad=" + String(humidity) + "&luz=" + String(luminosity);
    Serial.print("URL: ");
    Serial.println(url);
    http.begin(wifiClient, url);
    int httpResponseCode = http.GET();

    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.print("Código de respuesta HTTP BD: ");
      Serial.println(httpResponseCode);
      Serial.println(response);
    } else {
      Serial.print("Error al enviar GET BD: ");
      Serial.println(httpResponseCode);
    }

    http.end();

    // Enviar datos al servidor Flask
    String urlFlask = String(serverNameFlask) + "?temperatura=" + String(temperature) + "&humedad=" + String(humidity) + "&luz=" + String(luminosity);
    Serial.print("URL Flask: ");
    Serial.println(urlFlask);
    http.begin(wifiClient, urlFlask);
    int httpResponseCodeFlask = http.GET();

    if (httpResponseCodeFlask > 0) {
      String response = http.getString();
      Serial.print("Código de respuesta HTTP Flask: ");
      Serial.println(httpResponseCodeFlask);
      Serial.println(response);
    } else {
      Serial.print("Error al enviar GET Flask: ");
      Serial.println(httpResponseCodeFlask);
    }

    http.end();
  }
    

  delay(10000); // Enviar datos cada 10 segundos
}
