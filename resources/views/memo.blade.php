        //条件2
        elseif(!empty($serch['last_kana']) & empty($serch['first_kana']) & empty($serch['gender']) & empty($serch['pref_id']))  {
            $query = $query->where('last_kana','like', '%'.$serch['last_kana'].'%');
            $customers = $query->get();

            return view('index',compact('customers','prefs'));
        }
        //条件3
        elseif(!empty($serch['first_kana'])) {
            $query = $query->where('first_kana','like', '%'.$serch['first_kana'].'%');
            $customers = $query->get();

            return view('index',compact('customers','prefs'));
        }

        //条件4
        elseif(!empty($serch['gender'])) {
            $query = $query->where('gender','like', $serch['gender']);
            $customers = $query->get();

            return view('index',compact('customers','prefs'));
        }

        //条件5
        elseif(!empty($serch['pref_id'])) {
            $query = $query->where('pref_id','like', $serch['pref_id']);
            $customers = $query->get();

            return view('index',compact('customers','prefs'));
        }


        //条件1(全て空欄時)
        if(empty($serch['last_kana']) && empty($serch['first_kana']) && empty($serch['gender']) && empty($serch['pref_id'])) {
            return redirect()->route('customers.index');
        }
        //条件2
        elseif(!empty($serch['last_kana']) && empty($serch['first_kana']) && empty($serch['gender']) && empty($serch['pref_id'])) {
            $customers = $query->where('last_kana','like', '%'.$serch['last_kana'].'%')->get();
            //比較する条件式
            if(){
                return view('index',compact('customers','prefs'));
            } else{
                $no_serch_message = 'データが見つかりません。';
                return view('index',compact('customers','prefs','no_serch_message'));
            }

        }
