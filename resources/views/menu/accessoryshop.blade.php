@extends('layouts.user')
@section('title', 'list page')

@section('content')
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Accessory Shop</h3>
                    <span class="breadcrumb"><a href="#">Home</a> > Our Shop</span>
                </div>
            </div>
        </div>
    </div>

    <div class="section trending">
        <div class="container">
            <ul class="trending-filter">
                <li>
                    <a class="is_active" href="#!" data-filter="*">Show All</a>
                </li>
                @foreach ($accessorycates as $item)
                    <li>
                        <a href="#!" data-filter=".adv">{{ $item->name }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="row">
                @foreach ($accessories as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <div class="thumb">
                                <a href="{{ route('menu.accessorydetails', $item->id) }}"><img src={{ $item->image }}
                                        alt="image"></a>
                                <span class="price">{{ $item->price }}</span>
                            </div>
                            <div class="down-content">
                                <span class="category">{{ $item->category->name }}</span>
                                <h4>{{ $item->name }}</h4>
                                <a href="{{ route('menu.accessorydetails', $item->id) }}"><i
                                        class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- @endforeach --}}
        </div>
    </div>
@endsection
