@extends('layouts.admin')

@section('content')
    <main>
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <table class="table table-striped table-hover">
                    <caption>个人信息</caption>

                </table>
            </div>


        </div>
    </main>

@endsection

@section('script')
    <script>
        window.onload=function(){
            active_item("个人信息");
        }
    </script>
@endsection