@extends('layout')

@section('content')

    <body>
        {{-- ヘッダー --}}
        <header>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container d-flex justify-content-between">
                    <a href="{{ route('customers.index') }}" class="navbar-brand d-flex align-items-center">
                        <strong>顧客管理（詳細）</strong>
                    </a>
                </div>
            </div>
        </header>

        <main role="main">
            <div class="container-fluid" style="margin-top: 50px; padding-left: 100px;padding-right: 100px;">
                <div class="col-md-8 order-md-1">
                    <div class="row">
                        {{--姓--}}
                        <div class="col-md-3 mb-3">
                            <label for="lastName">苗字</label>
                            <input type="text" class="form-control" name="last_name" placeholder="" value="{{ $customers->last_name }}" readonly>
                        </div>
                        {{--名--}}
                        <div class="col-md-3 mb-3">
                            <label for="firstName">名前</label>
                            <input type="text" class="form-control" name="first_name" placeholder="" value="{{ $customers->first_name }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--姓かな--}}
                        <div class="col-md-3 mb-3">
                            <label for="lastKana">みょうじ</label>
                            <input type="text" class="form-control" name="last_kana" placeholder="" value="{{ $customers->last_kana }}" readonly>
                        </div>
                        {{--名かな--}}
                        <div class="col-md-3 mb-3">
                            <label for="firstKana">なまえ</label>
                            <input type="text" class="form-control" name="first_kana" placeholder="" value="{{ $customers->first_kana }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--性別--}}
                        <div class="col-md-3 mb-3">
                            <label for="gender">性別</label>
                            <input type="text" class="form-control" name="gender" value="{{ $customers->gender }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--生年月日--}}
                        <div class="col-md-3 mb-3">
                            <label for="birthday">生年月日</label>
                            <input type="date" class="form-control" name="birthday" placeholder="" value="{{ $customers->birthday }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--郵便番号--}}
                        <div class="col-md-2 mb-3">
                            <label for="post_code">郵便番号</label>
                            <input type="text" class="form-control" name="post_code" placeholder="" value="{{ $customers->post_code }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--都道府県--}}
                        <div class="col-md-2 mb-3">
                            <label for="pref_id">都道府県</label>
                            <input type="text" class="form-control" name="pref_id" value="{{ $customers->pref->name }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--住所--}}
                        <div class="col-md-5 mb-3">
                            <label for="address">住所</label>
                            <input type="text" class="form-control" name="address" placeholder="" value="{{ $customers->address }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--建物名--}}
                        <div class="col-md-5 mb-3">
                            <label for="building">建物名
                            </label>
                            <input type="text" class="form-control" name="building" placeholder="" value="{{ $customers->building }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--電話番号--}}
                        <div class="col-md-3 mb-3">
                            <label for="tel">電話番号</label>
                            <input type="tel" class="form-control" name="tel" placeholder="" value="{{ $customers->tel }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--携帯番号--}}
                        <div class="col-md-3 mb-3">
                            <label for="mobile">携帯番号</label>
                            <input type="tel" class="form-control" name="mobile" placeholder="" value="{{ $customers->mobile }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--メールアドレス--}}
                        <div class="col-md-3 mb-3">
                            <label for="email">メールアドレス</label>
                            <input type="email" class="form-control" name="email" placeholder="" value="{{ $customers->email }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--備考--}}
                        <div class="col-md-8 mb-3">
                            <label for="remarks">備考</label>
                            <textarea class="form-control" aria-label="With textarea" name="remarks" readonly> {{ $customers->remarks }} </textarea>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">

                {{--戻る、削除ボタン--}}
                <div class="form-group">
                    <a  class="btn btn-secondary" href="{{ route('customers.index') }}" style="width:150px">戻る</a>
                    <button id="complete" type="button" class="btn btn-danger" style="width:150px"><i class="fas fa-database pr-1"></i> 削除</button>
                </div>
            </div>
        </main>

        <div id="complete-confirm" title="確認" style="display: none;">
            <p><span class="ui-icon ui-icon-info" style="float:left; margin:12px 12px 20px 0;"></span>削除しますか？</p>
        </div>

        <script>
            $("#complete").click(function() {
                completeConfirm(function(result){
                    if (result) {
                        location.replace("{{ route('customers.index') }}");
                    }
                });
            });

            function completeConfirm(response){
                notScreenRelease = true;
                var buttons = {};
                buttons['キャンセル'] = function(){$(this).dialog('close');response(false)};
                buttons['削除'] = function(){$(this).dialog('close');response(true)};

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
