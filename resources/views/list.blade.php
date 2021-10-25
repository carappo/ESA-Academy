<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ESA ACADEMY 生徒管理システム</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <!-- STYLE CSS -->
  <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
  <!-- Optional JavaScript -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>

<body>
<div class="container-fluid">
<div class="row">
@extends('layouts.layout')
@section('nav')
<nav>
  <ul>
    <li><a href="{{ route('sign_up') }}" class="sign-up-btn"><i class="fas fa-plus"></i>新規登録画面</a></li>
    <li><a href="{{ route('list') }}" class="top-page-btn"><i class="fas fa-home"></i>トップページ</a></li>
  </ul>
</nav>
@endsection

  <!-- /.col-sm-2 .sidebar -->

  <div class="r-column col-sm-10">
    <div class="header col-sm-10">
      <!--  -->
      <form action="{{ route('list') }}">
        <input type="text" name="number" class="form-control" placeholder="電話番号">
        <button type="submit" class="btn btn-dark">検索</button>
      </form>
    </div>
    
    <!-- /.header .col-sm-10 -->

    <main class="student-list">
      <div class="container-fluid wrapper">
        <p class="result">15件</p>
        <section class="container-fluid contents-area">
          <table class="table">
            <thead>
              <tr>
                <th>名前</th>
                <th>年齢</th>
                <th>生年月日</th>
                <th>e-mail</th>
                <th>TEL</th>
                
                <th></th>
              </tr>
              @foreach ($user as $value)
                <tr>
                  <td>{{$value->name}}</td>
                  <td>{{$value->age}}</td>
                  <td>{{$value->birthday}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->tel}}</td>
                  <td>
                    <button class="tb-btn tb-btn-edit">編集</button>
                    <button class="tb-btn tb-btn-del">削除</button>
                  </td>
                </tr>
　　　　　　　　@endforeach
            </thead>

          </table>
          
        </section>
        <!-- /.container-fluid .contents-area -->

        <nav class="pager">
          <ul class="pagination justify-content-center">
            <li class="page-item active">
              <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="page-item">
              
            </li>
          </ul>
        </nav>
        <!-- /.pager -->

      </div>
      <!-- /.container-fluid .wrapper-->
    </main>

  </div>
  <!-- /.r-column .col-sm-10 -->


</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->

</body>
</html>