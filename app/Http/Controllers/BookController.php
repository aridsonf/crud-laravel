<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\ModelBook;
use App\Models\User;


class BookController extends Controller
{

    private $objUser;
    private $objBook;

    public function __construct(){
        $this->objUser = new User();
        $this->objBook = new ModelBook();
           
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Exibir todos os itens
        //$book = $this->objBook->all();
        //Exibir apenas alguns por página
        $book = $this->objBook->paginate(5);
        return view('index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users = $this->objUser->all();
        return view('create_book', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $cad = $this->objBook->create([
            'title'=>$request->title,
            'prices'=>$request->prices,
            'id_user'=>$request->id_user,
            'pages'=>$request->pages
        ]);
        if($cad){
            //return redirect('books');
            $update['success'] = true;
            $update['message'] = 'Cadastro realizado com sucesso!';
            echo json_encode($update);
            return;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->objBook->find($id);
        return view('show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->objBook->find($id);
        $users = $this->objUser->all();
        return view('create_book', compact('book','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $this->objBook->where(['id'=>$id])->update([
            'title'=>$request->title,
            'prices'=>$request->prices,
            'id_user'=>$request->id_user,
            'pages'=>$request->pages
        ]);
        $update['success'] = true;
        $update['message'] = 'Atualização realizada com sucesso!';
        echo json_encode($update);
        return;
        //return redirect('books');
        //return($upd)?"sim":"não";   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objBook->destroy($id);
        return($del)?"sim":"não";
    }
}
