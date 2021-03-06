<?php
$dom = new DomDocument('1.0', 'UTF-8');
$dom->loadXML(file_get_contents(dirname(__FILE__).'/test/with-data.xml'));
// $dom->loadXML(file_get_contents(dirname(__FILE__).'/test/without-data.xml'));

$dataset_main = $dom->getElementsByTagName('dataset_main');

if ($dataset_main->length >= 1) {
    $forwards = $dataset_main->item(0)->getElementsByTagName('Forward');

    for($i=0; $i<$forwards->length; $i++) {
        $forward = $forwards->item($i);

        $fromport      = $forward->getElementsByTagName('FROMPORT')->item(0)->nodeValue;
        $toport        = $forward->getElementsByTagName('TOPORT')->item(0)->nodeValue;
        $fportcode     = $forward->getElementsByTagName('FPORTCODE')->item(0)->nodeValue;
        $tportcode     = $forward->getElementsByTagName('TPORTCODE')->item(0)->nodeValue;
        $ship          = $forward->getElementsByTagName('SHIP')->item(0)->nodeValue;
        $shipcode      = $forward->getElementsByTagName('SHIPCODE')->item(0)->nodeValue;
        $setofftime    = $forward->getElementsByTagName('SETOFFTIME')->item(0)->nodeValue;
        $setofftime1   = $forward->getElementsByTagName('SETOFFTIME1')->item(0)->nodeValue;
        $sellstatus    = $forward->getElementsByTagName('SELLSTATUS')->item(0)->nodeValue;
        $status        = $forward->getElementsByTagName('STATUS')->item(0)->nodeValue;
        $linecode      = $forward->getElementsByTagName('LINECODE')->item(0)->nodeValue;
        $voyagerouteid = $forward->getElementsByTagName('VOYAGEROUTEID')->item(0)->nodeValue;
        $ticketnum     = $forward->getElementsByTagName('TICKETNUM')->item(0)->nodeValue;

        if ($i === 0) {
            printf("===========================================\n");
        }

        printf("%-20s: %s\n", "From port",       $fromport);
        printf("%-20s: %s\n", "From port code",  $fportcode);

        printf("%-20s: %s\n", "To port",         $toport);
        printf("%-20s: %s\n", "To port code",    $tportcode);

        printf("%-20s: %s\n", "Ship Name",       $ship);
        printf("%-20s: %s\n", "Ship Code",       $shipcode);
        printf("%-20s: %s\n", "Set of Clock",    $setofftime);
        printf("%-20s: %s\n", "Set of Time",     $setofftime1);

        printf("%-20s: %s\n", "Sell status",     $sellstatus);
        printf("%-20s: %s\n", "Normal status",   $status);

        printf("%-20s: %s\n", "Line Code",       $linecode);
        printf("%-20s: %s\n", "Voyage Route ID", $voyagerouteid);

        printf("%-20s: %s\n", "Ticket Number",   $ticketnum);

        printf("............................................\n");

        $seatranks   = $forward->getElementsByTagName('SEATRANK');
        $seatprice1s = $forward->getElementsByTagName('PRICE1');
        $seatprice2s = $forward->getElementsByTagName('PRICE2');

        for($j=0; $j<$seatranks->length; $j++) {
            $name   = $seatranks->item($j)->nodeValue;
            $price1 = $seatprice1s->item($j)->nodeValue;
            $price2 = $seatprice2s->item($j)->nodeValue;

            printf("%-20s: %s\n", "Seat Name",  $name);
            printf("%-20s: %s\n", "Seat Price", $price1);
            printf("%-20s: %s\n", "Seat Price", $price2);
        }

        printf("===========================================\n");
    }
}else{
    echo "Not found data";
}
