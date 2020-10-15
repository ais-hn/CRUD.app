<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Customer
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer query()
 */
	class Customer extends \Eloquent {}
}

namespace App{
/**
 * App\Pref
 *
 * @property int $id ID
 * @property string $name 都道府県名
 * @property \Illuminate\Support\Carbon $created_at 作成日時
 * @property \Illuminate\Support\Carbon $updated_at 更新日時
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Pref whereUpdatedAt($value)
 */
	class Pref extends \Eloquent {}
}

