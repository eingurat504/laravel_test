@extends('layouts.app')

@section('title', 'Open Ticket')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">Product</div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('includes.flash')

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/products') }}">
                                {!! csrf_field() !!}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                    <label for="quantity" class="col-md-4 control-label">Quantity</label>

                                    <div class="col-md-6">
                                        <input id="quantity" type="text" class="form-control" name="quantity" value="{{ old('quantity') }}">

                                        @if ($errors->has('quantity'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="price" class="col-md-4 control-label">Price</label>

                                    <div class="col-md-6">
                                        <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}">

                                        @if ($errors->has('price'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-buy"></i> Buy
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if ($products->isEmpty())
                    <p>You have not created any tickets.</p>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>quantity</th>
                            <th>price</th>
                            <th>Last Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>{{ $product->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $products->render() }}
                @endif
            </div>
        </div>
    </div>
@endsection
