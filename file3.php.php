<?php
// Get form data
$loanID = $_POST['loan_id'];
$loan_amount = $_POST['loan_amount'];
$interest = $_POST['interes']; // Author is now a single value
$service_fee= $_POST['service_fee'];
// Load existing XML file or create a new one
$xml = file_exists('library.xml') ? simplexml_load_file('library.xml') : new SimpleXMLElement('<loan></loan>');

// Check if loan ID already exists
$loaExists = false;
foreach ($xml->loan as $loanId) {
    if ((string)$loan->loan_id === $loaId) {
        $loanExists = true;
        break;
    }
}

// If loan ID already exists, display warning message and redirect
if ($loankExists) {
    echo "<script>alert('Loan ID already exists. Data was not saved.'); window.location.href = 'form.html';</script>";
    exit();
}

// Add new loan to XML
$loan = $xml->addChild('loan');
$loan->addChild('loan_id', $loanId); // Add loan ID
$loan->addChild('loan_amount', $loan_amount);
$loan->addChild('interest', $interest);
$loan->addChild('service_fee', $service_fee);

// Save XML to file
$xml->asXML('library.xml');

// Display success message and redirect
echo "<script>alert('loan successfully saved.'); window.location.href = 'save_to_db.php';</script>";
exit();
?>
