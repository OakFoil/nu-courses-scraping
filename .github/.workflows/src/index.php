<?php
    header("Content-Type: application/json");
    $curl = curl_init();
    // Define the URL and POST data
    $url = 'https://register.nu.edu.eg/PowerCampusSelfService/Sections/AdvancedSearch';
    $jsonData = '{"endDateKey":0,"eventId":"","keywords":"","registrationtype":"TRAD","startDateKey":0,"period":"","status":""}';

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData); // JSON string
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData), // Optional but good practice
        'Referer: https://register.nu.edu.eg/PowerCampusSelfService/Registration/Courses',
        'Cookie: ${COOKIE}'
    ]);
    $response = curl_exec($curl);
    // Check for cURL errors
    if (curl_errno($curl)) {
        $error = curl_error($curl);
        die("cURL Error: $error");
    }

    // Get HTTP status code (e.g., 200 = OK, 404 = Not Found)
    $httpStatusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($httpStatusCode !== 200) {
        die("HTTP Error: $httpStatusCode");
    }

    // Close the cURL session
    curl_close($curl);

    // Print or process the response
    echo json_decode($response);
?>
