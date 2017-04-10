<?php
include dirname(dirname(__FILE__)) . '/anandniwas.com/fpdf/fpdf.php';
include dirname(dirname(__FILE__)) . '/anandniwas.com/config/config.php';
$postParams = Functions::getPostParams();

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
$pdf = new FPDF( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->SetTextColor( 0, 0, 0 );
$pdf->SetFont( 'Arial', '', 14 );
$pdf->Cell( 0, 15, 'S.S.D.N.', 0, 0, 'C' );
$pdf->Ln( 7 );
$pdf->Cell( 0, 15, 'Anand Niwas, Shri Anandpur', 0, 0, 'C' );
$pdf->Ln( 7 );
$pdf->Cell( 0, 15, 'Room Allotment Reciept', 0, 0, 'C' );
$pdf->Ln( 7 );
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont( 'Arial', '', 12 );
$pdf->Cell( 30, 12, " Name : ", 0, 0, 'R', false );
$pdf->Cell( 30, 12, $postParams['name'], 0, 0, 'L', false );
$pdf->Cell( 30, 12, " City : ", 0, 0, 'R', false );
$pdf->Cell( 30, 12, $postParams['city'], 0, 0, 'L', false );
$pdf->Cell( 30, 12, " Mobile Number : ", 0, 0, 'R', false );
$pdf->Cell( 30, 12, $postParams['phoneNumber'], 0, 0, 'L', false );
$pdf->Ln( 7 );
$pdf->Cell( 30, 12, " No. Of People : ", 0, 0, 'R', false );
$pdf->Cell( 30, 12, $postParams['numberOfPeople'], 0, 0, 'L', false );
$pdf->Cell( 30, 12, " Arrival Date : ", 0, 0, 'R', false );
$pdf->Cell( 30, 12, $postParams['dateOfArrival'], 0, 0, 'L', false );
$pdf->Cell( 30, 12, " Departure Date : ", 0, 0, 'R', false );
$pdf->Cell( 30, 12, $postParams['dateOfDeparture'], 0, 0, 'L', false );
$pdf->Ln( 7 );
$pdf->Cell( 30, 12, " Room Number : ", 0, 0, 'R', false );
$pdf->Cell( 30, 12, $postParams['roomNumberAllotted'], 0, 0, 'L', false );
$pdf->Cell( 30, 12, " Floor : ", 0, 0, 'R', false );
$pdf->Cell( 30, 12, "1", 0, 0, 'L', false );
$pdf->Cell( 30, 12, " Bhagat ID : ", 0, 0, 'R', false );
$pdf->Cell( 30, 12, $postParams['id'], 0, 0, 'L', false );
$pdf->Ln( 7 );
$pdf->Cell( 0, 15, 'Inventory Allotment Reciept', 0, 0, 'C' );
$pdf->Ln( 12 );
$pdf->Cell( 30, 8, " S. No. : ", "TRLB", 0, 'C', false );
$pdf->Cell( 50, 8, "Item", "TRLB", 0, 'C', false );
$pdf->Cell( 30, 8, " Quantity", "TRLB", 0, 'C', false );
$pdf->Cell( 30, 8, " Price", "TRLB", 0, 'C', false );
$pdf->Cell( 30, 8, "amount", "TRLB", 0, 'C', false );
$pdf->Ln( 8 );
$pdf->Cell( 30, 8, " 1 ", "BLR", 0, 'C', false );
$pdf->Cell( 50, 8, "Mattress", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['mattress'], "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, "100", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['mattress']*100, "BLR", 0, 'C', false );
$pdf->Ln( 8 );
$pdf->Cell( 30, 8, " 2 ", "BLR", 0, 'C', false );
$pdf->Cell( 50, 8, "Bedsheet", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['bedsheet'], "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, "100", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['bedsheet']*100, "BLR", 0, 'C', false );
$pdf->Ln( 8 );
$pdf->Cell( 30, 8, " 3 ", "BLR", 0, 'C', false );
$pdf->Cell( 50, 8, "Pillow", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['pillow'], "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, "50", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['pillow']*50, "BLR", 0, 'C', false );
$pdf->Ln( 8 );
$pdf->Cell( 30, 8, " 4 ", "BLR", 0, 'C', false );
$pdf->Cell( 50, 8, "Blanket", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['quilt'], "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, "100", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['quilt']*100, "BLR", 0, 'C', false );
$pdf->Ln( 8 );
$pdf->Cell( 30, 8, " 5 ", "BLR", 0, 'C', false );
$pdf->Cell( 50, 8, "Lock", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['lockNkey'], "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, "100", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['lockNkey']*100, "BLR", 0, 'C', false );
$pdf->Ln( 8 );
$pdf->Cell( 30, 8, " 6 ", "BLR", 0, 'C', false );
$pdf->Cell( 50, 8, "Resident Cards", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['dasCards'], "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, "50", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['dasCards']*50, "BLR", 0, 'C', false );
$pdf->Ln( 8 );
$pdf->Cell( 30, 8, "  ", "BLR", 0, 'C', false );
$pdf->Cell( 50, 8, "Total", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['totalItemCount'], "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, "", "BLR", 0, 'C', false );
$pdf->Cell( 30, 8, $postParams['totalAmount'], "BLR", 0, 'C', false );

$pdf->Ln( 10 );

$pdf->Output();
?>