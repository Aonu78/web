@extends('layouts.theme')
@section('content')




<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Overview</h1>



            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Cities</h4>
                            <div class="stats-figure">{{ $cities }}</div>
                            <div class="stats-meta text-success">
                               
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Categories</h4>
                            <div class="stats-figure">{{ $categories }}</div>
                            <div class="stats-meta text-success">
                                
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Cards</h4>
                            <div class="stats-figure">{{ $count }}</div>
                            <div class="stats-meta text-success">
                               
                            </div>
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                    
                    <!--//app-card-->
                </div>
                <!--//col-->
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Featured Cities</h4>
                            <div class="stats-figure">{{ $city }}</div>
                            
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                    <!--//app-card-->
                </div>
                <!--//col-->

                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat shadow-sm h-100">
                        <div class="app-card-body p-3 p-lg-4">
                            <h4 class="stats-type mb-1">Total Places</h4>
                            <div class="stats-figure">{{ $places }}</div>
                            
                        </div>
                        <!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div>
                    <!--//app-card-->
                </div>


            </div>
            <!--//row-->



        </div>



@endsection