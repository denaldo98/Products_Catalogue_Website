<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Resources\Product;
use App\Models\Resources\Category;
use App\Models\Resources\SubCategory;
use App\Http\Requests\NewProductRequest;
use App\Http\Requests\NewCategoryRequest;
use App\Http\Requests\NewSubCategoryRequest;

//Controller per le funzionalità dell'utente Staff

class StaffController extends Controller {
    protected $_staffModel;

    public function __construct() {
        //attivazione del middleware
        $this->middleware('can:isStaff');

        //instanziazione del Application Model relativo allo staff
        $this->_staffModel = new Staff;
    }

    //Action per restituire la view con la form per l'inserimento di un nuovo prodotto
    public function addProduct() {
        $subCats = $this->_staffModel->getSubCats()->pluck('name', 'subCatId');
        return view('product.insert')
                        ->with('subCats', $subCats);
    }


    //Action del controller che permette di salvare la nuova categoria inserita
    public function storeCategory(NewCategoryRequest $request) {
        $category = new Category;
        $category->fill($request->validated());
        $category->save();

        return redirect('/');
        //return redirect()->route('catalog1');
    }


    //Action per restituire la view con la form per l'inserimento di una nuova sottocategoria
    public function addSubCategory() {
        $cats = $this->_staffModel->getCats()->pluck('name', 'catId');
        return view('subCat.insertSubCat')
                        ->with('cats', $cats);
    }


     //Action del controller che permette di salvare la nuova sottocategoria inserita
     public function storeSubCategory(NewSubCategoryRequest $request) {
        $subCategory = new SubCategory;
        $subCategory->fill($request->validated());
        $subCategory->save();

        return redirect('/');
    }


    //Action per salvere il prodotto inserito. $request type-hinted per attivere il meccanismo di validazione.
    public function storeProduct(NewProductRequest $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $product = new Product;
        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };

        //response in formato json se la validazione va a buon fine: interazione Ajax
        return response()->json(['redirect' => route('catalog1')]);
    }


    //Action per restituire la view con l'elenco dei prodotti per la modifica
    public function productsToModify() {
        $prods =  $this->_staffModel->getProds();
        return view('product.showlistmodify')
                        ->with('products', $prods);
    }

    //Action che porta alla form di modifica del prodotto selezionato
    public function modifyProduct(Request $request) {
        //La validazione viene effettuata anche lato client, manteniamo comunque la validazione lato server
        $request->validate([
            'prodId' => 'required'
        ]);

        //$product = Product::find($request->get('prodId'));
        $product = $this->_staffModel->getProdById($request->get('prodId'));
         $subCats = $this->_staffModel->getSubCats()->pluck('name', 'subCatId');
        return view('product.modifyproduct')
                        ->with('product', $product)
                        ->with('subCats', $subCats);
    }


    //Action che salva le modifiche eddettuate su un prodotto
    public function storeModifiedProduct(NewProductRequest $request){

        $product = $this->_staffModel->getProdById($request->get('prodId'));
        //$product = Product::find($request->get('prodId'));
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = $product->image;
        }

        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

        //response in formato json se la validazione va a buon fine: interazione Ajax
        return response()->json(['redirect' => route('catalog1')]);
    }


    //Action per restituire la view con l'elenco dei prodotti per l'eliminazione
    public function productsToDelete() {
        $prods =  $this->_staffModel->getProds();
        return view('product.showlistdelete')
                        ->with('products', $prods);
    }


    //Action che elimina il prodotto selezionato
    public function deleteProduct(Request $request) {
        //La validazione viene effettuata anche lato client, manteniamo comunque la validazione lato server
        $request->validate([
            'prodId' => 'required'
        ]);

        //Product::find($request->get('prodId'))->delete();
        $this->_staffModel->getProdById($request->get('prodId'))->delete();
        return redirect('/');
    }


    //Action che gestisce la richiesta Ajax per la ricerca di un prodotto in base al nome
    public function tableSearch(Request $request) {
        if($request->ajax()) {
            $output = "<tr><th></th><th>Nome prodotto</th><th>Descrizione breve</th><th>Prezzo intero (€)</th><th>Sconto (%)</th><tr>";
            $products = Product::where('name','like','%'.$request->search."%")->get();
            $total_rows = $products->count();

            if($total_rows > 0) {
                foreach ($products as $product) {
                    $output .= '
                    <tr>
                    <td><input type="radio" name="prodId" value="'.$product->prodId.'"</td>
                    <td class="column">'.$product->name.'</td>
                    <td class="column">'.$product->descShort.'</td>
                    <td>'.$product->price.'</td>
                    <td>'.$product->discountPerc.'</td>
                    </tr>
                    ';
                    }
            }
            else {
                $output = "<br><h3>Non ci sono prodotti che soddisfano la richiesta!</h3><br><br>";
            }

            echo json_encode($output);
        }
    }


}
