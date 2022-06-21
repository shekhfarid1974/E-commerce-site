<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function categoryPdf(){

       $categories = Category::all(); 

       $fileName = 'category.pdf';
       $html = view('backend.categories.categoryPdf', compact('categories'))->render();
       $mpdf = new \Mpdf\Mpdf();
    //    $mpdf->addPage("L");
       $mpdf->WriteHTML($html);
       $mpdf->Output($fileName,'I');

    }
    public function productPdf(){

      $products = Product::all(); 

      $fileName = 'product.pdf';
      $html = view('backend.products.productPdf', compact('products'))->render();
      $mpdf = new \Mpdf\Mpdf();
   //    $mpdf->addPage("L");
      $mpdf->WriteHTML($html);
      $mpdf->Output($fileName,'I');

   }
}
