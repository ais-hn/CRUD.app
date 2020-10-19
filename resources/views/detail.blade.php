@extends('layout')

@section('content')

    <body>
        {{-- ヘッダー --}}
        <header>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container d-flex justify-content-between">
                    <a href="index.html" class="navbar-brand d-flex align-items-center">
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
                            <label for="lastName">{{ $customers->last_name }}</label>
                            <input type="text" class="form-control" name="last_name" placeholder="姓" value="苗字" readonly>
                        </div>
                        {{--名--}}
                        <div class="col-md-3 mb-3">
                            <label for="firstName">{{ $cutomers->first_name }}</label>
                            <input type="text" class="form-control" name="first_name" placeholder="名" value="名前" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--姓かな--}}
                        <div class="col-md-3 mb-3">
                            <label for="lastKana">{{ $cutomers->last_kana }}</label>
                            <input type="text" class="form-control" name="last_kana" placeholder="姓かな" value="みょうじ" readonly>
                        </div>
                        {{--名かな--}}
                        <div class="col-md-3 mb-3">
                            <label for="firstKana">{{ $cutomers->first_kana }}</label>
                            <input type="text" class="form-control" name="first_kana" placeholder="名かな" value="なまえ" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--性別--}}
                        <div class="col-md-3 mb-3">
                            <label for="gender">性{{ $cutomers->gender }}/label>
                            <input type="text" class="form-control" name="gender" value="男" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--生年月日--}}
                        <div class="col-md-3 mb-3">
                            <label for="birthday">{{ $cutomers->birthday }}</label>
                            <input type="date" class="form-control" name="birthday" placeholder="生年月日" value="1973-01-24" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--郵便番号--}}
                        <div class="col-md-2 mb-3">
                            <label for="post_code">{{ $cutomers->post_code }}</label>
                            <input type="text" class="form-control" name="post_code" placeholder="郵便番号" value="123-4567" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--都道府県--}}
                        <div class="col-md-2 mb-3">
                            <label for="pref_id">{{ $cutomers->pref_id }}</label>
                            <input type="text" class="form-control" name="pref_id" value="青森県" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--住所--}}
                        <div class="col-md-5 mb-3">
                            <label for="address">{{ $cutomers->address }}</label>
                            <input type="text" class="form-control" name="address" placeholder="渋谷区道玄坂2丁目11-1" value="青森市長島一丁目1-1" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--建物名--}}
                        <div class="col-md-5 mb-3">
                            <label for="building">{{ $cutomers->building }}</label>
                            <input type="text" class="form-control" name="building" placeholder="Ｇスクエア渋谷道玄坂 4F" value="" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--電話番号--}}
                        <div class="col-md-3 mb-3">
                            <label for="tel">{{ $cutomers->tel }}</label>
                            <input type="tel" class="form-control" name="tel" placeholder="03-1234-5678" value="03-1234-5678" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--携帯番号--}}
                        <div class="col-md-3 mb-3">
                            <label for="mobile">{{ $cutomers->mobile }}</label>
                            <input type="tel" class="form-control" name="mobile" placeholder="080-1234-5678" value="080-1234-5678" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--メールアドレス--}}
                        <div class="col-md-3 mb-3">
                            <label for="email">{{ $cutomers->email }}</label>
                            <input type="email" class="form-control" name="email" placeholder="you@example.com" value="bobtabo.buhibuhi@gmail.com" readonly>
                        </div>
                    </div>

                    <div class="row">
                        {{--備考--}}
                        <div class="col-md-8 mb-3">
                            <label for="remarks">{{ $cutomers->remarks }}</label>
                            <textarea class="form-control" aria-label="With textarea" name="remarks" readonly></textarea>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">

                {{--戻る、削除ボタン--}}
                <div class="form-group">
                    <a  class="btn btn-secondary" href="index.html" style="width:150px">戻る</a>
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
                        location.replace("index.html");
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
