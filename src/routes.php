<?php

$app->get('/', function ($request, $response) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml');
 
});

$app->get('/GetBilling', function ($request, $response) {
    require_once 'BillingUtil.php';
    $billing_util=new BillingUtil();
    $sql = "SELECT customer_to_invoice.zoho_books_contact_id, lines_to_invoice.description, lines_to_invoice.rate FROM lines_to_invoice JOIN customer_to_invoice ON customer_to_invoice.zoho_books_contact_id=lines_to_invoice.zoho_books_contact_id ORDER BY customer_to_invoice.zoho_books_contact_id ASC";
    $json_output=$billing_util->extractJsonFromDb($sql);

    return $this->renderer->render($response, 'output.phtml', array('json_output' => $json_output));
});