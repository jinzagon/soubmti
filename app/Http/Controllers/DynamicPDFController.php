<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class DynamicPDFController extends Controller
{
    function index()
    {
     $customer_data = $this->get_customer_data();
     return view('dashboard.dynamic_pdf')->with('customer_data', $customer_data);
    }

    function get_customer_data()
    {
     $customer_data = DB::table('users')
         ->limit(10)
         ->get();
     return $customer_data;
    }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
     $customer_data = $this->get_customer_data();
     $output = '
     
     <style>
     @page {
        margin: 20px 20px 20px 20px !important;
        padding: 0px 0px 0px 0px !important;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        margin:50px;
        padding:10px;
      }

      @page{
        font-family: Helvetica;
        font-weight: bold;
        }
        
    img{
        padding-top: 85px;
    display: block;
    margin-left: 30%;
    }


     </style>



     <p style="background-color: darkcyan;
     height: 250px;
     margin-left: 0px;
     margin-top: 0px;">

     <img src="https://i.imgur.com/rPvAPli.png"></p> 
     
     <br><h1><center>Document de résultats<center></h1><br></br>


     <p style="margin-left:50px;text-align:left; display:block; "> Nom & prénom : '.auth()->user()->name .'</p>

     <p style="margin-left:50px;text-align:left; display:block; ">Date de naissance : '.auth()->user()->dob .'</p>
     
     <p style="margin-left:50px;text-align:left; display:block; ">Année : '.auth()->user()->annee .'</p>
     
     <p style="margin-left:50px;text-align:left; display:block; ">Fillière : '.auth()->user()->filliere .'</p>
	  
      <table style="width: 100%;">
 <thead>
  <tr class="border_bottom" style="height: 60px;">
    <th></th>
    <th>CONTROLE 1</th>
    <th>CONTROLE 2</th>
    <th>EXAMEN FINAL</th>
  </tr>
 </thead>
 <tbody>
 <tr style="height: 60px;">
    <td> '.auth()->user()->m1.'  </td>
    <td>'.auth()->user()->m1c1 .'</td>
    <td>'.auth()->user()->m1c2 .'</td>
    <td>'.auth()->user()->m1ef .'</td>
  </tr>
  <tr style="height: 60px;">
    <td>'.auth()->user()->m2 .'</td>
    <td>'. auth()->user()->m2c1 .'</td>
    <td>'. auth()->user()->m2c2 .'</td>
    <td>'.auth()->user()->m2ef .'</td>
  </tr>
  <tr style="height: 60px;">
    <td>'.auth()->user()->m3 .'</td>
    <td>'. auth()->user()->m3c1 .'</td>
    <td>'.auth()->user()->m3c2 .'</td>
    <td>'.auth()->user()->m3ef .'</td>
  </tr>
 </tbody>
 </table>
    <br>
    <center><h5> Application créée par <b>BENMADANI Youssef & TALBI Yazid</b>.

    <h4><a href="#">SUPMTI</a>, 35, Rue Bader Al Kobra, 50000 Meknès, Maroc

    <h4><a href="www.supmti.co.ma">www.supmti.co.ma</a> | 0645-627070

         </center>
</body>
';  
     
     return $output;
    }
}