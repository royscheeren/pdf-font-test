<?php
    
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
    
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = [
            'title' => 'PDF Title',
        ]; 
              
        $pdf = Pdf::loadView('myPDF', $data);
       
        return $pdf->stream();
    }
}