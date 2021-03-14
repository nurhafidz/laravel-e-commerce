@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Wishlist' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('wishlists.wishlist.destroy', $wishlist->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('wishlists.wishlist.index') }}" class="btn btn-primary" title="Show All Wishlist">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('wishlists.wishlist.create') }}" class="btn btn-success" title="Create New Wishlist">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('wishlists.wishlist.edit', $wishlist->id ) }}" class="btn btn-primary" title="Edit Wishlist">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Wishlist" onclick="return confirm(&quot;Click Ok to delete Wishlist.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>User</dt>
            <dd>{{ optional($wishlist->user)->first_name }}</dd>
            <dt>Product</dt>
            <dd>{{ optional($wishlist->product)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $wishlist->created_at }}</dd>

        </dl>

    </div>
</div>

@endsection