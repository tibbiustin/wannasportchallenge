<?php
include('simple_html_dom.php');

$request = array(
'http' => array(
    'method' => 'POST',
    'content' => http_build_query(array(
        'date' => '20160913',
        'days' => '7',
        'activity' => 'Activity2520714441261358577',
        'view' => ''
    )),
)
);

$context = stream_context_create($request);

$html = file_get_html("http://www.kerteminde-tennisklub.dk/Activity/BookingSheet", false, $context);

$i=0;
foreach($html->find('div.slot') as $e)
{
	$value = $e->getAttribute('data-bookings');
	if(strpos($value, 'Bane') !== false) {
		$i++;
	}
}
echo "There are ".$i." available slots for this week.";

?>