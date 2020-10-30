@extends('layout')

@section('content')

{{-- ヘッダー --}}
<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{ route('customers.index') }}" class="navbar-brand d-flex align-items-center">
                <strong>顧客管理</strong>
            </a>
        </div>
    </div>
</header>

<main role="main">
    <div class="container-fluid" style="padding-left: 50px;padding-right: 50px;">
        <div class="py-5 text-center">

            {{--登録完了メッセージ--}}
            @if(session('signup_message'))
            <div class="alert alert-success" role="alert">
                {{ session('signup_message') }}
            </div>
            @endif

            <div style="margin-bottom:20px;">

                {{--検索項目フォーム--}}
                <form id="form" method="get" action="{{ route('customers.serch') }}">

                    <div class="row">
                        <div class="col-md-6">

                            {{--姓かな--}}
                            <div class="form-group row">
                                <label for="lastKana" class="col-sm-2 col-form-label">姓かな</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="last_kana" placeholder="姓かな" value="{{ $serch['last_kana'] }}">
                                </div>
                            </div>

                            {{--名かな--}}
                            <div class="form-group row">
                                <label for="firstKana" class="col-sm-2 col-form-label">名かな</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="first_kana" placeholder="名かな" value="{{ $serch['first_kana'] }}">
                                </div>
                            </div>

                            {{--性別--}}
                            <div class="form-group row">
                                <label for="firstName" class="col-sm-2 col-form-label">性別</label>
                                <div class="col-sm-10 text-left">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="gender1" value="1" {{ $serch['gender1'] == 1 ? 'checked' : ''}} >
                                        <label class="form-check-label" for="inlineCheckbox1">男</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="gender2" value="2" {{ $serch['gender2'] == 2 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="inlineCheckbox2">女</label>
                                    </div>
                                </div>
                            </div>

                            {{--都道府県--}}
                            <div class="form-group row">
                                <label for="prefId" class="col-sm-2 col-form-label">都道府県</label>
                                <div class="col-sm-3">
                                    <select class="custom-select d-block" name="pref_id">
                                        <option value=""></option>
                                        @foreach($prefs as $pref)
                                            <option value="{{ $pref->id }}" {{ ($pref->id == $serch['pref_id']) ? "selected" : ''}}> {{ $pref->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                {{--検索ボタン--}}
                <div class="form-group">
                    <button type="button" id="search" class="btn btn-primary" style="width:150px"><i class="fas fa-search pr-1"></i> 検索</button>
                </div>

                {{--検索エラーメッセージ--}}
                @if ( $customers->isEmpty() )
                <div class="alert alert-warning" role="alert">
                    該当データが見つかりません。
                </div>
                @endif

                {{--新規登録ボタン--}}
                <div class="form-group row">
                    <a  class="btn btn-success" href="{{ route('customers.create') }}" style="width:150px"><i class="fas fa-chalkboard-teacher pr-1"></i> 新規登録</a>
                </div>

            </div>

            <div class="row">
                <table class="table table-bordered table-hover">
                    {{--テーブルの各カラム項目--}}
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">名前</th>
                            <th scope="col">かな</th>
                            <th scope="col">性別</th>
                            <th scope="col">生年月日</th>
                            <th scope="col">郵便番号</th>
                            <th scope="col">都道府県</th>
                            <th scope="col">電話番号</th>
                            <th scope="col">携帯番号</th>
                            <th scope="col">メールアドレス</th>
                            <th scope="col">作成日時</th>
                            <th scope="col">更新日時</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="content">
                        @foreach($customers as $customer)
                        <tr>
                            {{--ID--}}
                            <td scope="col">{{ $customer->id}}</td>
                            {{--姓 名--}}
                            <td scope="col"><a href="{{ route('customers.detail',['id'=>$customer->id]) }} ">{{$customer->last_name}} {{$customer->first_name}}</a></td>
                            {{--せい めい--}}
                            <td scope="col">{{$customer->last_kana}} {{$customer->first_kana}}</td>
                            {{--性別--}}
                            <td scope="col">{{ ($customer->gender) == 1 ? '男':'女'}}</td>
                            {{--生年月日--}}
                            <td scope="col">{{$customer->birthday->format('yy-m-d')}}</td>
                            {{--郵便番号--}}
                            <td scope="col">{{$customer->post_code}}</td>
                            {{--都道府県 モデルでPrefと繋いでる(prefのfunction)--}}
                            <td scope="col">{{$customer->pref->name}}</td>
                            {{--電話番号--}}
                            <td scope="col">{{$customer->tel}}</td>
                            {{--携帯番号--}}
                            <td scope="col">{{$customer->mobile}}</td>
                            {{--メールアドレス--}}
                            <td scope="col">{{$customer->email}}</td>
                            {{--作成日時--}}
                            <td scope="col">{{$customer->created_at}}</td>
                            {{--更新日時--}}
                            <td scope="col">{{$customer->update_at}}</td>
                            {{--編集ボタン--}}
                            <td scope="col"><a class="btn btn-info" href="{{ route('customers.edit',['id'=>$customer->id]) }}">編集</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>

<script>
    $("#search").click(function() {
        $("form").submit();
    });
</script>
@endsection
