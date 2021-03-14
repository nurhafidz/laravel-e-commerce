@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Wishlists</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('wishlists.wishlist.create') }}" class="btn btn-success" title="Create New Wishlist">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($wishlists) == 0)
            <div class="panel-body text-center">
                <h4>No Wishlists Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Product</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($wishlists as $wishlist)
                        <tr>
                            <td>{{ optional($wishlist->user)->first_name }}</td>
                            <td>{{ optional($wishlist->product)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('wishlists.wishlist.destroy', $wishlist->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('wishlists.wishlist.show', $wishlist->id ) }}" class="btn btn-info" title="Show Wishlist">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('wishlists.wishlist.edit', $wishlist->id ) }}" class="btn btn-primary" title="Edit Wishlist">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Wishlist" onclick="return confirm(&quot;Click Ok to delete Wishlist.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $wishlists->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection