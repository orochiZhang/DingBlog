@extends('layouts.admin')

@section('content')
    <main>
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <h2>添加文章</h2>
            </div>


        </div>
    </main>

@endsection

@section('script')
    <script>
        window.onload=function(){
            active_item("添加文章");
        }
    </script>
@endsection