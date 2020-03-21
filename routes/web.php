<?php

use Illuminate\Support\Facades\DB;

// All routes will be controle by VUE
$router->get('/', function () {
    return view('app');
});

$router->get('/selledtracks', function() {
    // get best selledtracks from DB
    return DB::table('invoice_items')
        ->select('invoice_items.TrackId', DB::raw('count(invoice_items.TrackId) AS total'), 'tracks.Name as track', 'artists.Name as artist')
        ->join('tracks', 'tracks.TrackId', '=', 'invoice_items.TrackId')
        ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
        ->join('artists', 'artists.ArtistId', '=', 'albums.ArtistId')
        ->groupBy('invoice_items.TrackId')
        ->orderByDesc('total')
        ->limit(5)
        ->get();

});

$router->get('/bestcostumer', function() {
    // get best selledtracks from DB
    return DB::table('invoices')
            ->select('invoices.CustomerId', DB::raw('SUM(invoices.Total) as euros'), 'customers.FirstName', 'customers.LastName', 'customers.Email')
            ->join('customers', 'customers.CustomerId', '=', 'invoices.CustomerId')
            ->groupBy('invoices.CustomerId')
            ->orderByDesc('euros')
            ->get();

});

$router->get('/averageprice', function() {
    // get best selledtracks from DB
    return DB::table('invoices')
            ->select(DB::raw('avg(invoices.Total) as euros'))
            ->orderByDesc('euros')
            ->get();

});

