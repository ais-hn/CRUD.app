@extends('layout')

@section('content')

<body>
    {{-- ヘッダー --}}
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="{{ route('customers.index') }}" class="navbar-brand d-flex align-items-center">
                    <strong>顧客管理（新規登録）</strong>
                </a>
            </div>
        </div>
    </header>

    {{--登録フォーム--}}
    <main role="main">
        <div class="container-fluid" style="margin-top: 50px; padding-left: 100px;padding-right: 100px;">
            {{-- エラーメッセージ --}}
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
            {{--POSTのため、@csrf指定--}}
            <form id="form" method="post" action="{{ route('customers.store') }}">
                @csrf
                <div class="col-md-8 order-md-1">
                    <div class="row">
                        {{--姓--}}
                        <div class="col-md-3 mb-3">
                            <label for="last_name">姓 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="last_name" placeholder="姓"
                             value="{{ old('last_name') }}" required>
                        </div>
                        {{--名--}}
                        <div class="col-md-3 mb-3">
                            <label for="first_name">名 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="first_name" placeholder="名"
                             value="{{ old('first_name') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        {{--姓かな--}}
                        <div class="col-md-3 mb-3">
                            <label for="last_kana">姓かな <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="last_kana" placeholder="姓かな"
                             value="{{ old('last_kana') }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                        {{--名かな--}}
                            <label for="first_kana">名かな <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="first_kana" placeholder="名かな"
                             value="{{ old('first_kana') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        {{--性別--}}
                        <div class="col-md-3 mb-3">
                            <label for="gender">性別 <span class="badge badge-danger">必須</span></label>
                            <div class="col-sm-10 text-left">
                                {{--男--}}
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="1">
                                    <label class="form-check-label" for="inlineCheckbox1">男</label>
                                </div>
                                {{--女--}}
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="2">
                                    <label class="form-check-label" for="inlineCheckbox2">女</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{--生年月日--}}
                        <div class="col-md-3 mb-3">
                            <label for="birthday">生年月日 <span class="badge badge-danger">必須</span></label>
                            <input type="date" class="form-control" name="birthday" placeholder="生年月日" value="{{ old('birthday') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        {{--郵便番号--}}
                        <div class="col-md-2 mb-3">
                            <label for="postCode">郵便番号 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="post_code" placeholder="郵便番号" value="{{ old('post_code') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        {{--都道府県--}}
                        <div class="col-md-2 mb-3">
                            <label for="pref_id">都道府県 <span class="badge badge-danger">必須</span></label>
                            <select class="custom-select d-block w-100" name="pref_id" required>
                                @foreach($prefs as $pref)
                                <option value="{{ $pref->id }}"> {{ $pref->name }} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        {{--住所--}}
                        <div class="col-md-5 mb-3">
                            <label for="address">住所 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="address" placeholder="渋谷区道玄坂2丁目11-1"
                             value="{{ old('address') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        {{--建物名--}}
                        <div class="col-md-5 mb-3">
                            <label for="building">建物名</label>
                            <input type="text" class="form-control" name="building" placeholder="Ｇスクエア渋谷道玄坂 4F"
                             value="{{ old('building') }}">
                        </div>
                    </div>

                    <div class="row">
                        {{--電話番号--}}
                        <div class="col-md-3 mb-3">
                            <label for="tel">電話番号 <span class="badge badge-danger">必須</span></label>
                            <input type="tel" class="form-control" name="tel" placeholder="03-1234-5678" value="{{ old('tel') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        {{--携帯番号--}}
                        <div class="col-md-3 mb-3">
                            <label for="mobile">携帯番号 <span class="badge badge-danger">必須</span></label>
                            <input type="tel" class="form-control" name="mobile" placeholder="080-1234-5678" value="{{ old('mobile') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        {{-- メールアドレス --}}
                        <div class="col-md-3 mb-3">
                            <label for="email">メールアドレス <span class="badge badge-danger">必須</span></label>
                            <input type="email" class="form-control" name="email" placeholder="you@example.com"
                             value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        {{--備考--}}
                        <div class="col-md-8 mb-3">
                            <label for="remarks">備考</label>
                            <textarea class="form-control" aria-label="With textarea" name="remarks"></textarea>
                        </div>
                    </div>
                </div>
            </form>

            {{--戻る、登録ボタン--}}
            <hr class="mb-4">
            <div class="form-group">
                <a  class="btn btn-secondary" href="{{ route('customers.index') }}" style="width:150px">戻る</a>
                <button id="complete" type="button" class="btn btn-success" style="width:150px"><i class="fas fa-database pr-1"></i> 登録</button>
            </div>
        </div>
    </main>
    {{--確認メッセージ表示--}}
    <div id="complete-confirm" title="確認" style="display: none;">
        <p><span class="ui-icon ui-icon-info" style="float:left; margin:12px 12px 20px 0;"></span>登録しますか？</p>
    </div>

    <script>
        $("#complete").click(function() {
            completeConfirm(function(result){
                if (result) {
                    $("form").submit();
                }
            });
        });

        function completeConfirm(response){
            notScreenRelease = true;

            var buttons = {};
            buttons['キャンセル'] = function(){
                $(this).dialog('close');
                response(false)
            };
            buttons['登録'] = function(){
                $(this).dialog('close');
                response(true)
            };

            $("#complete-confirm").dialog({
                show: {
                    effect: "drop",
                    duration: 500
                },
                hide: {
                    effect: "drop",
                    duration: 500
                },
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: buttons
            });
        }
    </script>
</body>
@endsection
