<?php

use Illuminate\Support\Facades\DB;

// All routes will be controle by VUE
$router->get('/', function () {
    return view('app');
});

$router->get('/selledtracks', function() {
    // get best selledtracks from DB

    return DB::select(' SELECT invoice_items.TrackId, count(invoice_items.TrackId) AS total,  tracks.Name track, artists.Name artist
                        FROM invoice_items 
                        JOIN tracks ON tracks.TrackId = invoice_items.TrackId 
                        JOIN albums ON tracks.AlbumId = albums.AlbumId
                        JOIN artists ON artists.ArtistId = albums.ArtistId 
                        GROUP BY invoice_items.TrackId 
                        ORDER BY total DESC LIMIT 5');

});


$router->get('/bestcostumer', function() {
    // get best selledtracks from DB

    return DB::select(' SELECT invoices.CustomerId, sum(invoices.Total) AS euros, customers.FirstName, customers.LastName, customers.Email
                        FROM invoices 
                        JOIN customers
                        ON customers.CustomerId = invoices.CustomerId
                        GROUP BY invoices.CustomerId
                        ORDER BY total DESC');

});

