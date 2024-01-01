<?php

namespace App\Controllers;

use App\Models\BookModel;

class Book extends BaseController {
    //dispaly data

    public function index() {
        $session = \Config\Services::session();
        $data[ 'session' ] = $session;

        $model = new BookModel();
        $booksArray = $model->getRecords();
        $data[ 'books' ] = $booksArray;
        return view( 'books/list', $data );
    }

    // create/ send data

    public function create() {
        $session = \Config\Services::session();
        helper( 'form' );

        $data = [];
        if ( $this->request->getMethod() === 'post' ) {
            $input = $this->validate( [
                'name' => 'required|min_length[5]',
                'author' => 'required|min_length[5]'
            ] );
            if ( $input == true ) {
                // Form Validated Successfully

                $model = new BookModel();
                $model->save( [
                    'title'=>$this->request->getPost( 'name' ),
                    'author'=>$this->request->getPost( 'author' ),
                    'isbn_no'=>$this->request->getPost( 'isbn_no' )
                ] );
                $session->setFlashdata( 'success', 'Winner  Winner Chicken Dinner, record added successsfully' );

                return redirect()->to( '/books' );
            } else {
                // Form Not Validated

                $data[ 'validation' ] = $this->validator;
            }
        }
        return view( 'books/create', $data );
    }
    //  edit the data

    public function edit( $id ) {

        $session = \Config\Services::session();
        helper( 'form' );

        $model = new BookModel();
        $book = $model->getRow( $id );

        if ( empty( $book ) ) {
            $session->setFlashdata( 'error', 'Records Not Found' );
            return redirect()->to( '/books' );
        }

        $data = [];
        $data[ 'book' ] = $book;
        if ( $this->request->getMethod() === 'post' ) {
            $input = $this->validate( [
                'name' => 'required|min_length[5]',
                'author' => 'required|min_length[5]'
            ] );
            if ( $input == true ) {
                // Form Validated Successfully

                $model = new BookModel();
                $model->update( $id, [
                    'title'=>$this->request->getPost( 'name' ),
                    'author'=>$this->request->getPost( 'author' ),
                    'isbn_no'=>$this->request->getPost( 'isbn_no' )
                ] );
                $session->setFlashdata( 'success', ' Record Updated successsfully' );

                return redirect()->to( '/books' );
            } else {
                // Form Not Validated

                $data[ 'validation' ] = $this->validator;
            }
        }
        return view( 'books/edit', $data );

    }
    // delete the data

    public function delete( $id ) {

        $session = \Config\Services::session();
        helper( 'form' );

        $model = new BookModel();
        $book = $model->getRow( $id );

        if ( empty( $book ) ) {
            $session->setFlashdata( 'error', 'Records Not Found' );
            return redirect()->to( '/books' );
        }
        $model = new BookModel();
        $model->delete( $id );

        $session->setFlashdata( 'success', 'Records Deleted Successfully' );
        return redirect()->to( '/books' );
    }
}
