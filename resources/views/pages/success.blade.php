@extends('layouts.success')

@section('title')
    Success Page
@endsection

@section('content')
    <!-- PAGE CONTENT -->
    <div class="page-content page-success">
        <div class="section-success" data-aos="zoom-in">
            <div class="container">
                <div class="row align-items-center row-login justify-content-center">
                    <div class="col-lg-6 text-center">
                        <img src="/images/icon_bag.png" alt="" class="mb-4">
                        <h2>
                            Transaction Processed
                        </h2>
                        <p>
                            Silahkan tunggu konfirmasi email dari kami dan
                            kami akan menginformasikan resi secept mungkin!
                        </p>
                        <div>
                            <a href="/dasboard.html" class="btn btn-success w-50 mt-4">
                                My Dasboard
                            </a>
                            <a href="/index.html" class="btn btn-signUp w-50 mt-4">
                                Go To Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
