<?php
namespace App\Controllers;
class Page extends BaseController
{
public function home()
{
return view('home',[ 'title' => '', 'content' => '']);
}
public function about()
{
return view('about', [ 'title' => 'Website Wargaku', 'content' => '' ]);
}
public function contact()
{
    return view('contact', ['title' => 'Halaman Kontak', 'content' => '']);
// echo "Ini halaman Contact";
}
public function artikel()
{
    return view('artikel', ['title' => ' Halaman Artikel', 'content' => 'Ini adalah halaman artikel']);
}
public function faqs()
{
echo "Ini halaman FAQ";
}
public function tos()
{
echo "ini halaman Term of Services";
}
}
