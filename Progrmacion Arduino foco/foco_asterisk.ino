#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>

const char* ssid = "LEON-RED";
const char* password = "76697978";

ESP8266WebServer server(80);

const int focoPin = 4; // Pin digital donde está conectado el LED

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);

  Serial.print("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("\nWiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  pinMode(focoPin, OUTPUT);
  digitalWrite(focoPin, LOW); // Apaga el FOCO al inicio

  server.on("/encender", []() {
    Serial.println("Received request to /encender");
    digitalWrite(focoPin, HIGH); // HIGH enciende el FOCO
    server.send(200, "text/plain", "FOCO Encendido");
  });

  server.on("/apagar", []() {
    Serial.println("Received request to /apagar");
    digitalWrite(focoPin, LOW); // LOW apaga el FOCO
    server.send(200, "text/plain", "FOCO Apagado");
  });

  server.onNotFound([]() {
    Serial.println("Received request to unknown path");
    server.send(404, "text/plain", "Not Found");
  });

  server.begin();
  Serial.println("HTTP server started");
}

void loop() {
  server.handleClient();
}
